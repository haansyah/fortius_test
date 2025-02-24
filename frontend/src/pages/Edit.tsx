import { useEffect, useState } from "react";
import { useParams, useNavigate } from "react-router-dom";
import axios from "axios";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { toast } from "sonner";

export default function EditEmployee() {
  const [loading, setLoading] = useState(false);
  const { id } = useParams();
  const navigate = useNavigate();
  const [employee, setEmployee] = useState({
    name: "",
    email: "",
    salary: "",
    position: "",
  });

  useEffect(() => {
    axios
      .get(`http://127.0.0.1:8000/api/employees/${id}`)
      .then((response) => {
        setEmployee(response.data);
      })
      .catch((error) => {
        console.error(error);
        toast.error("Failed to fetch employee data.");
      });
  }, [id]);

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    setEmployee({ ...employee, [e.target.name]: e.target.value });
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);
    axios
      .put(`http://127.0.0.1:8000/api/employees/${id}`, employee)
      .then((response) => {
        toast.success(response.data.message);
        setLoading(false);
        navigate("/");
      })
      .catch((error) => {
        setLoading(false);
        console.error(error);
        toast.error("Failed to update employee.");
      });
  };

  return (
    <div className="mx-auto mt-10 max-w-7xl">
      <Card>
        <CardHeader>
          <CardTitle>Edit Employee</CardTitle>
        </CardHeader>
        <CardContent>
          <form onSubmit={handleSubmit}>
            <div className="mb-4">
              <label>Name</label>
              <Input
                name="name"
                value={employee?.name}
                onChange={handleChange}
                required
              />
            </div>
            <div className="mb-4">
              <label>Email</label>
              <Input
                name="email"
                value={employee?.email}
                onChange={handleChange}
                required
              />
            </div>
            <div className="mb-4">
              <label>Salary</label>
              <Input
                name="salary"
                value={employee?.salary}
                onChange={handleChange}
                required
              />
            </div>
            <div className="mb-4">
              <label>Position</label>
              <Input
                name="position"
                value={employee?.position}
                onChange={handleChange}
                required
              />
            </div>
            <Button type="submit" disabled={loading}>
              Update
            </Button>
          </form>
        </CardContent>
      </Card>
    </div>
  );
}
