<?php
include "connection.php";

$error_message = "";

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    
    $check_sql = "SELECT * FROM employee WHERE first_name='$first_name' AND last_name='$last_name'";
    $check_result = mysqli_query($conn, $check_sql);

    if(mysqli_num_rows($check_result) > 0){
        $error_message = "Error: Employee with the same name already exists.";
    } else {
        $insert_sql = "INSERT INTO employee (first_name, last_name, department, salary) VALUES ('$first_name', '$last_name', '$department', '$salary')";
        $insert_result = mysqli_query($conn, $insert_sql);

        if($insert_result){
            header("Location: index.php");
            exit();
        } else {
            echo "Data Insertion Failed";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            width: 50%;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color:rgb(6, 97, 201);
            color: #fff;
            padding: 10px 20px; 
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color:rgb(143, 139, 141);
        }
        .error {
            color: red;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Employee</h2>
        <?php if($error_message): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" required><br>
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" required><br>
            <label for="department">Department:</label>
            <input type="text" name="department" id="department" required><br>
            <label for="salary">Salary:</label>
            <input type="number" name="salary" id="salary" required><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>