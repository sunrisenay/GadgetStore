<?php
include ('Headerhomepage.html');
session_start();
date_default_timezone_set('Asia/Yangon');
error_reporting(E_ALL & ~E_NOTICE);
//error_reporting(E_ALL & ~E_WARNING);
$connection = mysqli_connect("localhost","root","","gaget_store");
if(isset($_POST['btnsignin']))
{
    $email = $_POST['txtemail'];
    $password =$_POST['txtpass'];

    $select = "SELECT * FROM customer where Email='$email' and Password = '$password'";
    $runselect = mysqli_query($connection,$select);
    $countrow = mysqli_num_rows($runselect);
    if($countrow==0)
    {
        echo "<script>alert('Email or password may be wrong')</script>";
    }
    else
    {
        $fetchdata = mysqli_fetch_array($runselect);
        $cid = $fetchdata['CustomerID'];
        $cname = $fetchdata['CustomerName'];
        $_SESSION['cuid'] = $cid;
        $_SESSION['cuname'] = $cname;
        echo "<script>alert('Login Successful')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <style>
        fieldset
        {
            width: 45%;
            margin: auto;
            margin-bottom: 30px;
        }
        h2
        {
            font-family: 'Josefin Sans', sans-serif;
            font-weight: bolder;
            text-align: center;
        }
        fieldset, input
        {
            font-family: 'Didact Gothic', sans-serif;
        }
        #btnsignin, #btnback
        {
            text-decoration: none;
            color: gold;
            background-color: rgba(0,0,0,0.7);
            padding:10px 10px;
            font-weight: bold;
            border-radius:20px;
        }
        section#footer 
        {
            font-family: 'Didact Gothic', sans-serif;
            position: relative;
            border: 1px solid black;
            background-color: Black;
            color: white;
        }
        section#footer > ul {margin-bottom: 70px; z-index: -1;}
        section#footer > ul > li { list-style: none; line-height: 1.5;}
        section#footer > ul > li > a
        {
            text-decoration: none;
            color: white;
        }
        section#footer > p
        {
            background-color: Gold;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h2 align="center">Customer Login Form</h2>
    <form action="" method="post">
        <fieldset style="border-radius: 30px;">
            <legend style = "margin-left : 30px;">Sign In your own account</legend>
            <table width="70%" border="0" align="center" style="padding-left: 50px; height : 150px;">
                <tr>
                    <td>Customer Name: </td>
                    <td><input type="text" name="txtcname" placeholder="Eg: John Doe" required></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="email" name="txtemail" placeholder="Eg: johndoe@gmail.com" required></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="txtpass" placeholder="*********" required></td>
                </tr>
                
                <tr>
                    <td><input type="submit" value="Login" name="btnsignin" id="btnsignin"></td>
                    <td><input type="button" value="Back" id="btnback" onclick="history.back()"></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <section id="footer">
        <h3>More Contact</h3>
        <ul>
            <li><a href="">Contact Us</a></li>
            <li><a href="">About Us</a></li>
            <li><a href="">Terms And Condition</a></li>
            <li><a href="">Help</a></li>
        </ul>
        <p  style="position:absolute; z-index: 99; color: white; bottom: 0; width: 98.5%; text-align: center; color: Black;">Copyright &#169; 2022 Gadget Store. All rights reserved</p>
    </section>
</body>
</html>