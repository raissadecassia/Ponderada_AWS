<?php include "../inc/dbinfo.inc"; ?>
<html>
<body>
<h1>Departments</h1>
<?php

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

  /* Ensure that the DEPARTMENTS table exists. */
  VerifyDepartmentsTable($connection, DB_DATABASE);

  /* If input fields are populated, add a row to the DEPARTMENTS table. */
  $department_name = htmlentities($_POST['DEPARTMENT_NAME']);
  $manager_name = htmlentities($_POST['MANAGER_NAME']);
  $established_date = htmlentities($_POST['ESTABLISHED_DATE']);
  $budget = htmlentities($_POST['NUMBER_OF_EMPLOYEES']);

  if (strlen($department_name) || strlen($manager_name) || strlen($established_date) || strlen($number_of_employees)) {
    AddDepartment($connection, $department_name, $manager_name, $established_date, $number_of_employees);
  }
?>

<!-- Input form -->
<form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
  <table border="0">
    <tr>
      <td>Department Name</td>
      <td>Manager Name</td>
      <td>Established Date</td>
      <td>Number of employees</td>
    </tr>
    <tr>
      <td><input type="text" name="DEPARTMENT_NAME" maxlength="50" size="30" /></td>
      <td><input type="text" name="MANAGER_NAME" maxlength="50" size="30" /></td>
      <td><input type="date" name="ESTABLISHED_DATE" /></td>
      <td><input type="number" step="1" name="BUDGET" /></td>
      <td><input type="submit" value="Add Department" /></td>
    </tr>
  </table>
</form>

<!-- Display table data. -->
<table border="1" cellpadding="2" cellspacing="2">
  <tr>
    <td>Department ID</td>
    <td>Department Name</td>
    <td>Manager Name</td>
    <td>Established Date</td>
    <td>Number of Employees</td>
  </tr>

<?php

$result = mysqli_query($connection, "SELECT * FROM Departments");

while($query_data = mysqli_fetch_row($result)) {
  echo "<tr>";
  echo "<td>",$query_data[0], "</td>",
       "<td>",$query_data[1], "</td>",
       "<td>",$query_data[2], "</td>",
       "<td>",$query_data[3], "</td>",
       "<td>",$query_data[4], "</td>";
  echo "</tr>";
}
?>

</table>

<!-- Clean up. -->
<?php

  mysqli_free_result($result);
  mysqli_close($connection);

?>

</body>
</html>


<?php

/* Add a department to the table. */
function AddDepartment($connection, $department_name, $manager_name, $established_date, $budget) {
   $dn = mysqli_real_escape_string($connection, $department_name);
   $mn = mysqli_real_escape_string($connection, $manager_name);
   $ed = mysqli_real_escape_string($connection, $established_date);
   $b = mysqli_real_escape_string($connection, $number_of_employees);

   $query = "INSERT INTO Departments (DepartmentName, ManagerName, EstablishedDate, NumberOfEmployees) VALUES ('$dn', '$mn', '$ed', '$b');";

   if(!mysqli_query($connection, $query)) echo("<p>Error adding department data.</p>");
}

/* Check whether the table exists and, if not, create it. */
function VerifyDepartmentsTable($connection, $dbName) {
  if(!TableExists("Departments", $connection, $dbName))
  {
     $query = "CREATE TABLE Departments (
         DepartmentID int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         DepartmentName VARCHAR(50) NOT NULL,
         ManagerName VARCHAR(50),
         EstablishedDate DATE,
         NumberOfEmployees int
       )";

     if(!mysqli_query($connection, $query)) echo("<p>Error creating table.</p>");
  }
}

/* Check for the existence of a table. */
function TableExists($tableName, $connection, $dbName) {
  $t = mysqli_real_escape_string($connection, $tableName);
  $d = mysqli_real_escape_string($connection, $dbName);

  $checktable = mysqli_query($connection,
      "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");

  if(mysqli_num_rows($checktable) > 0) return true;

  return false;
}
?>
