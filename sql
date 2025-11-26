<?php
$conn = new mysqli("localhost", "root", "", "");
if ($conn->connect_error) die("Connection failed");
$conn->query("CREATE DATABASE IF NOT EXISTS company_db");
$conn->select_db("company_db");
$conn->query("CREATE TABLE IF NOT EXISTS departments (
 dept_id INT AUTO_INCREMENT PRIMARY KEY,
 dept_name VARCHAR(50)
)");
$conn->query("CREATE TABLE IF NOT EXISTS employees (
 emp_id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100),
 salary DECIMAL(10,2),
 dept_id INT
)");
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (isset($_POST["add_data"])) {
 $name = $_POST["name"];
 $salary = $_POST["salary"];
 $dept_id = $_POST["dept_id"];
 // Insert department if not exists
 $conn->query("INSERT IGNORE INTO departments (dept_id, dept_name)
VALUES ($dept_id, 'Dept $dept_id')");
 $sql = "INSERT INTO employees (name, salary, dept_id) VALUES
('$name', $salary, $dept_id)";
 $message = $conn->query($sql) ? "The record is added in the
database" : "Error";
 }
 if (isset($_POST["delete_data"])) {
 $emp_id = $_POST["emp_id"];
 $sql = "DELETE FROM employees WHERE emp_id = $emp_id";
 $message = $conn->query($sql) ? "A record is deleted from the
database" : "Error";
 }
}
?>
<!DOCTYPE html>
<html><head><title>DB</title></head><body>
<?php if($message) echo "<p>$message</p>"; ?>
<form method="post">
Name: <input name="name" required><br><br>
Salary: <input name="salary" step="0.01" required><br><br>
Dept ID: <input name="dept_id" required><br><br>
<button name="add_data">Add Data</button>
</form>
<form method="post">
Emp ID: <input name="emp_id" required><br><br>
<button name="delete_data">Delete Data</button>
</form>
<form method="post">
<button name="display_data">Display Data</button>
</form>
<?php
if (isset($_POST["display_data"])) {
 $conn->query("INSERT IGNORE INTO departments (dept_id, dept_name)
VALUES
 (1,'HR'),(2,'IT'),(3,'Finance'),(4,'Marketing')");
 $sql = "SELECT e.emp_id, e.name, e.salary, d.dept_name,
 COUNT(*) OVER (PARTITION BY e.dept_id) AS cnt
 FROM employees e
 LEFT JOIN departments d ON e.dept_id = d.dept_id
 GROUP BY e.emp_id, e.name, e.salary, d.dept_name
 ORDER BY d.dept_name, e.salary DESC";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 echo "<table border='1'><tr>

<th>ID</th><th>Name</th><th>Salary</th><th>Dept</th><th>Count</th>
 </tr>";
 while($row = $result->fetch_assoc()) {
 echo "<tr><td>{$row['emp_id']}</td><td>{$row['name']}</td>
