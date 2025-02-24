import { useState } from "react";
import { useNavigate } from "react-router-dom";
import axios from "axios";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { toast } from "sonner";

export default function CreateEmployee() {
  const [loading, setLoading] = useState(false);
  const navigate = useNavigate();
  const [employee, setEmployee] = useState({
    name: "",
    email: "",
    salary: "",
    position: "",
  });

  const [errors, setErrors] = useState({
    name: "",
    email: "",
    salary: "",
    position: "",
  });

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    setEmployee({ ...employee, [e.target.name]: e.target.value });
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);
    axios
      .post(`http://127.0.0.1:8000/api/employees`, employee)
      .then((response) => {
        toast.success(response.data.message);
        setLoading(false);
        navigate("/");
      })
      .catch((error) => {
        setLoading(false);
        setErrors(error?.response?.data?.error);
        console.error(error);
        toast.error("Failed to create employee.");
      });
  };

  return (
    <div className="mx-auto mt-10 max-w-7xl">
      <Card>
        <CardHeader>
          <CardTitle>Create Employee</CardTitle>
        </CardHeader>
        <CardContent>
          <form onSubmit={handleSubmit}>
            <div className="mb-4">
              <label>Name</label>
              <Input
                name="name"
                value={employee.name}
                onChange={handleChange}
                required
                placeholder="Employee Full Name"
              />
              {errors?.name && (
                <p className="text-sm text-red-500">{errors?.name}</p>
              )}
            </div>
            <div className="mb-4">
              <label>Email</label>
              <Input
                name="email"
                value={employee.email}
                onChange={handleChange}
                required
                placeholder="Employee Email Address"
              />
              {errors?.email && (
                <p className="text-sm text-red-500">{errors?.email}</p>
              )}
            </div>
            <div className="mb-4">
              <label>Salary</label>
              <Input
                name="salary"
                value={employee.salary}
                onChange={handleChange}
                required
                placeholder="Employee Salary"
              />
              {errors?.salary && (
                <p className="text-sm text-red-500">{errors?.salary}</p>
              )}
            </div>
            <div className="mb-4">
              <label>Position</label>
              <Input
                name="position"
                value={employee.position}
                onChange={handleChange}
                required
                placeholder="Employee Position"
              />
              {errors?.position && (
                <p className="text-sm text-red-500">{errors?.position}</p>
              )}
            </div>
            <Button type="submit" disabled={loading}>
              Create
            </Button>
          </form>
        </CardContent>
      </Card>
    </div>
  );
}
