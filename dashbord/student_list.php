<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'school';


$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
}

// echo 'Connected successfully';
// Create
$sql = "INSERT INTO students (student_name) VALUES ('JohnDoe')";
$result = mysqli_query($conn, $sql);

// Read
$sql = "SELECT id, student_name FROM students WHERE status=1";
$result = mysqli_query($conn, $sql);

// Update
// $sql = "UPDATE students SET student_name='xyz' WHERE student_name='JohnDoe'";
// mysqli_query($conn, $sql);

// delete
// $sql = "DELETE FROM students WHERE student_name='xyz'";
// mysqli_query($conn, $sql);
// soft delete
$sql = "UPDATE students SET status=0 WHERE id=1";
mysqli_query($conn, $sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User - Login and Register</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  
  <header>
    <h2>TJ WEBDEV</h2>
    <nav>
      <a href="http://localhost/school/dashbord/student_list.php">Dashboard</a>
      <a href="http://localhost/school/index.html">Login</a>
      <a href="#">BLOG</a>
      <a href="#">CONTACT</a>
      <a href="#">ABOUT</a>
    </nav>
  </header>
<body>
    <?php 
      // https://www.scaler.com/topics/php-tutorial/crud-operation-in-php/ !> 
    ?>
    <div class="table-list">
        <table>
            <tr>
                <th>Student Name</th>
                <th>&nbsp;</th>
                <th>Action</th>
            </tr>
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                 echo "<tr>
                        <td>".$row["student_name"]."</td>
                        <td>&nbsp;</td>
                        <td>
                            <a href='#'>Delete</a>
                            <a href='#'>Update</a>
                        </td>
                    </tr>";
               }
            ?>
            
        </table>
    </div>
</body>
</html>