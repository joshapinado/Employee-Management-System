<?php
include "connection.php";

$sql = "SELECT * FROM employee";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Record</title>
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
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            width: 80%;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .add-employee-btn {
            background-color:rgb(5, 174, 221);
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
        }
        .add-employee-btn:hover {
            background-color:rgb(95, 175, 183);
        }
        .action-btn {
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            color: #fff;
            margin-right: 5px;
        }
        .edit-btn {
            background-color:rgb(12, 197, 8);
        }
        .edit-btn:hover {
            background-color:rgb(106, 176, 115);
        }
        .delete-btn {
            background-color: #dc3545;
        }
        .delete-btn:hover {
            background-color:rgb(179, 105, 112);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Employee Record</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Department</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
            <?php
            if($result){
                while($row = mysqli_fetch_assoc($result)){               
                    echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['first_name']."</td>
                        <td>".$row['last_name']."</td>
                        <td>".$row['department']."</td>
                        <td>".$row['salary']."</td>
                        <td>
                            <a href='edit_employee.php?id=".$row['id']."' class='action-btn edit-btn'>Edit</a>
                            <a href='delete_employee.php?id=".$row['id']."' class='action-btn delete-btn'>Delete</a>
                        </td>
                    </tr>";
                } 
            }  
            ?>
        </table>
    </div>
    <a href="add_employee.php" class="add-employee-btn">Add Employee</a>
</body>
</html>