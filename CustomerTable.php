<?php
$connection = mysqli_connect("localhost","root","","gaget_store");

if($connection===false)
{
    exit("Could not connect to database:".mysqli_connect_error());
}

$customer = "CREATE table customer 
(
    CustomerID int not null primary key auto_increment,
    CustomerName varchar(50),
    Email varchar(60),
    Password text,
    Phone varchar(11),
    Dob date,
    Gender varchar(6),
    ProfilePicture varchar(255),
    Address varchar(255)
)";

$runcustomer = mysqli_query($connection,$customer);
if($runcustomer)
{
    echo "<script>alert('Customer Table Successfully Created.')</script>";
}
else
{
    $errors = mysqli_error($connection);
    echo '<script>alert("Something Went Wrong! Error Occur In : '.$errors.'")</script>';
}
?>