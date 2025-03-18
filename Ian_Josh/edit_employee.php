<?php
include "connection.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM employee WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    $sql = "UPDATE employee SET first_name='$first_name', last_name='$last_name', department='$department', salary='$salary' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Data Updated Successfully";
        header("Location: index.php");
    } else {
        echo "Data Update Failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee Record</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color:rgb(235, 11, 11);
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color:rgb(143, 139, 141);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Employee Record</h2>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required><br>
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required><br>
            <label for="department">Department:</label>
            <input type="text" name="department" value="<?php echo $row['department']; ?>" required><br>
            <label for="salary">Salary:</label>
            <input type="number" name="salary" value="<?php echo $row['salary']; ?>" required><br>
            <input type="submit" name="update" value="Update">
        </form>
    </div>
</body>
</html>