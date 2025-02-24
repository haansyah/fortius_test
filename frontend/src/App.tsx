import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import EditEmployee from "./pages/Edit";
import Home from "./pages/Home";
import CreateEmployee from "./pages/Create";

export default function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/edit-employee/:id" element={<EditEmployee />} />
        <Route path="/create-employee" element={<CreateEmployee />} />
      </Routes>
    </Router>
  );
}
