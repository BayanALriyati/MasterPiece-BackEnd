<?php
 
 include_once ('../config/connect.php');

// read data from table
function getAll($table){
    global $con;
    $sql="SELECT *FROM $table";
    return $sql_run=mysqli_query($con,$sql);
}

// read  data from table by get id
function getById($table , $id){
    global $con;
    $sql="SELECT *FROM $table WHERE id='$id'";
    return $sql_run=mysqli_query($con,$sql);
}

// read  data from table by get id
function getByRole($table , $role){
    global $con;
    $sql="SELECT *FROM $table WHERE role='$role'";
    return $sql_run=mysqli_query($con,$sql);
}

// read  data from table by get id
function getCategoryProduct($table_1 , $table_2 ){
    global $con;
    $sql="SELECT * FROM `$table_1` INNER JOIN `$table_2` ON product.category_id = category.category_id";
    return $sql_run=mysqli_query($con,$sql);
}
// ORDER BY orders.order_id DESC
// read  data from table by get id
function getByIdOrder($table , $id){
    global $con;
    $sql="SELECT *FROM $table WHERE order_id='$id'";
    return $sql_run=mysqli_query($con,$sql);
}

function getAllOrder($table){
    global $con;
    $sql="SELECT *FROM $table ORDER BY orders.order_id DESC";
    return $sql_run=mysqli_query($con,$sql);
}

// function redirect($url,$message)
// {
//     $_SESSION ['message'] = $message;
//     header('Location: ' .$url);
//     exit();
// }

?>