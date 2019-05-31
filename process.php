<?php

session_start();

$mysqli = new mysqli('localhost', 'root','ghi96djdHRM4OXgS', 'yardsale') or die(mysqli_error(mysqli));

$id='';
$name='';
$description='';
$price='';
$update=false;

if(isset($_POST['save'])){
    $name= $_POST['name'];
    $descript= $_POST['description'];
    $price= $_POST['price'];
    


    $mysqli->query("INSERT INTO items(name, description, price) VALUES('$name', '$descript', '$price')")
                or die($mysqli->error);
                $_SESSION['message']= "Record has been saved!";
$_SESSION['msg_type']="success";

header("location: index.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM items WHERE id=$id") or die($mysqli->error);

    $_SESSION['message']="Record deleted";
    $_SESSION['msg_type']="Danger";

    header("location: index.php");

}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result =$mysqli->query("SELECT * FROM items WHERE id=$id") or die($mysqli->error);
    if(count($result)==1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
    }

}

if (isset($_POST['update'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $description=$_POST['description'];
    $price= $_POST['price'];

    $mysqli->query("UPDATE items SET name='$name', description='$description', price='$price'
    WHERE id=$id") or die($mysqli->error);

header("location: index.php");

}

?>