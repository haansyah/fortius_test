import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from "@/components/ui/table";
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from "@/components/ui/card";
import { useEffect, useState } from "react";
import axios from "axios";
import { Skeleton } from "@/components/ui/skeleton";
import { Button } from "@/components/ui/button";
import {
  AlertDialog,
  AlertDialogAction,
  AlertDialogCancel,
  AlertDialogContent,
  AlertDialogDescription,
  AlertDialogFooter,
  AlertDialogHeader,
  AlertDialogTitle,
  AlertDialogTrigger,
} from "@/components/ui/alert-dialog";
import { toast } from "sonner";
import { Link } from "react-router-dom";

interface EmployeeType {
  id: number;
  name: string;
  email: string;
  salary: number;
  position: string;
}

export default function Home() {
  const [data, setData] = useState([]);
  const [loading, setLoading] = useState(false);
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 10;

  const fetchData = async (page = 1, limit = itemsPerPage) => {
    try {
      setLoading(true);
      const response = await axios.get(
        `http://127.0.0.1:8000/api/employees?page=${page}&limit=${limit}`
      );
      setData(response?.data?.data);
      setLoading(false);
    } catch (error) {
      console.error(error);
      setLoading(false);
    }
  };

  useEffect(() => {
    fetchData(currentPage);
  }, [currentPage]);

  const handleNextPage = () => {
    setCurrentPage((prevPage) => prevPage + 1);
  };

  const handlePreviousPage = () => {
    setCurrentPage((prevPage) => Math.max(prevPage - 1, 1));
  };

  return (
    <div className="mx-auto mt-10 max-w-7xl">
      <Card>
        <CardHeader className="flex flex-row items-center justify-between">
          <div>
            <CardTitle>Employees</CardTitle>
            <CardDescription>A list of your employees.</CardDescription>
          </div>
          <div>
            <Button asChild>
              <Link to="/create-employee">Add Employee</Link>
            </Button>
          </div>
        </CardHeader>
        <CardContent>
          <Table>
            <TableCaption>A list of employees in your company.</TableCaption>
            <TableHeader>
              <TableRow>
                <TableHead>#</TableHead>
                <TableHead>Name</TableHead>
                <TableHead>Email</TableHead>
                <TableHead>Salary</TableHead>
                <TableHead>Position</TableHead>
                <TableHead>Action</TableHead>
              </TableRow>
            </TableHeader>
            <TableBody>
              {loading ? (
                <>
                  {Array.from({ length: itemsPerPage }).map(
                    (_, rowIndex: number) => (
                      <TableRow key={rowIndex}>
                        <TableCell>
                          <Skeleton className="h-4" />
                        </TableCell>
                        <TableCell>
                          <Skeleton className="h-4" />
                        </TableCell>
                        <TableCell>
                          <Skeleton className="h-4" />
                        </TableCell>
                        <TableCell>
                          <Skeleton className="h-4" />
                        </TableCell>
                        <TableCell>
                          <Skeleton className="h-4" />
                        </TableCell>
                        <TableCell>
                          <Skeleton className="h-4" />
                        </TableCell>
                      </TableRow>
                    )
                  )}
                </>
              ) : data.length > 0 ? (
                data.map((employee: EmployeeType, index) => (
                  <TableRow key={employee?.id}>
                    <TableCell>
                      {(currentPage - 1) * itemsPerPage + index + 1}
                    </TableCell>
                    <TableCell>{employee?.name}</TableCell>
                    <TableCell>{employee?.email}</TableCell>
                    <TableCell>{employee?.salary}</TableCell>
                    <TableCell>{employee?.position}</TableCell>
                    <TableCell className="flex flex-row gap-3">
                      <EditBtn id={employee?.id?.toString()} />
                      <DeleteBtn
                        id={employee?.id?.toString()}
                        fetchData={() => fetchData(currentPage)}
                      />
                    </TableCell>
                  </TableRow>
                ))
              ) : (
                <TableRow>
                  <TableCell colSpan={6} className="text-center">
                    No data found
                  </TableCell>
                </TableRow>
              )}
            </TableBody>
          </Table>
          <div className="flex justify-between mt-4">
            <Button onClick={handlePreviousPage} disabled={currentPage === 1}>
              Previous
            </Button>
            <Button
              onClick={handleNextPage}
              disabled={data.length < itemsPerPage}
            >
              Next
            </Button>
          </div>
        </CardContent>
      </Card>
    </div>
  );
}

interface DeleteBtnProps {
  id: string;
  fetchData: () => void;
}

const DeleteBtn: React.FC<DeleteBtnProps> = ({ id, fetchData }) => {
  const handleDelete = () => {
    try {
      axios
        .delete(`http://127.0.0.1:8000/api/employees/${id}`)
        .then((response) => {
          toast.success(response?.data?.message);
        })
        .then(() => {
          fetchData();
        })
        .catch((error) => {
          console.error(error);
          toast.error("Failed to delete employee.");
        });
    } catch (error) {
      console.error(error);
      toast.error("Failed to delete employee.");
    }
  };

  return (
    <AlertDialog>
      <AlertDialogTrigger asChild>
        <Button variant="destructive">Delete</Button>
      </AlertDialogTrigger>
      <AlertDialogContent>
        <AlertDialogHeader>
          <AlertDialogTitle>Are you absolutely sure?</AlertDialogTitle>
          <AlertDialogDescription>
            This action cannot be undone. This will permanently delete the
            employee.
          </AlertDialogDescription>
        </AlertDialogHeader>
        <AlertDialogFooter>
          <AlertDialogCancel>Cancel</AlertDialogCancel>
          <AlertDialogAction onClick={handleDelete}>Delete</AlertDialogAction>
        </AlertDialogFooter>
      </AlertDialogContent>
    </AlertDialog>
  );
};

const EditBtn: React.FC<{ id: string }> = ({ id }) => {
  return (
    <Button variant="outline" asChild>
      <Link to={`/edit-employee/${id}`}>Edit</Link>
    </Button>
  );
};
