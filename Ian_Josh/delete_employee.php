<?php
include "connection.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM employee WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Record Deleted Successfully";
        header("Location: index.php");
    } else {
        echo "Failed to Delete Record";
    }
}
?>