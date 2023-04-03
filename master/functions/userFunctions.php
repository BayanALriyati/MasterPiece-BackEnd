<?php
 include ('config/connect.php');

// read data from table
function getAllActive($table){
    global $con;
    $sql="SELECT *FROM $table WHERE status='0'";
    return $sql_run=mysqli_query($con,$sql);
}

function getSlugActive($table , $slug){
    global $con;
    $sql="SELECT *FROM $table WHERE slug='$slug' AND status='0' LIMIT 1";
    return $sql_run=mysqli_query($con,$sql);
}

function getProBuCategory($category_id){
    global $con;                                 
    $sql="SELECT *FROM product WHERE category_id='$category_id' AND status='0' ";
    return $sql_run=mysqli_query($con,$sql);
}

function getIDActive($table , $id){
    global $con;
    $sql="SELECT *FROM $table WHERE id='$id' AND status='0' ";
    return $sql_run=mysqli_query($con,$sql);
}

// read data from table
function getAll($table){
    global $con;
    $sql="SELECT *FROM $table";
    return $sql_run=mysqli_query($con,$sql);
}

function getCartItems(){
    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];
    $sql = "SELECT * FROM `cart` INNER JOIN `product` ON cart.product_id = product.product_id AND cart.user_id = '$user_id' ORDER BY cart.id DESC";
    return $sql_run=mysqli_query($con,$sql);
}

function getAllFavorite($table , $id){
    global $con;
    $sql="SELECT *FROM $table ORDER BY $id DESC";
    return $sql_run=mysqli_query($con,$sql);
}

function redirect($url,$message)
{
    $_SESSION ['message'] = $message;
    header('Location: ' .$url);
    exit();
}

?>