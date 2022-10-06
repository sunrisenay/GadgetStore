<?php
include ('Headerhomepage.html');
date_default_timezone_set('Asia/Yangon');
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ALL & ~E_WARNING);
$connection = mysqli_connect("localhost","root","","gaget_store");

if(isset($_POST['btnregister']))
{
    $cname = $_POST['txtcname'];
    $email = $_POST['txtemail'];
    $dob = $_POST['txtdob'];
    $password = $_POST['txtpass'];
    $phone = $_POST['txtphone'];
    $gender = $_POST['rdogender'];
    $address = $_POST['txtaddress'];
    $todaydate = date('Y-m-d');
    if ($todaydate - $dob >= 18)
    {
        $uppercase = preg_match('@[A-Z]@',$password);
        $lowercase = preg_match('@[a-z]@',$password);
        $special = preg_match('@[^\w]@',$password);
        $number = preg_match('@[0-9]@',$password);
        if (!$uppercase || !$lowercase || !$special || !$number || strlen($password)<8)
        {
            echo "<script>alert('Password must include uppercase, lower case, num, speial character')</script>";
        }
        else
        {   
            $profile = $_FILES['filprofile']['name'];
            $filepath = "CustomerProfile/";
                if($profile)
                {
                    $filename = $filepath."".$profile;//CustomerProfile/profile.jpg
                    $copy = copy($_FILES['filprofile']['tmp_name'],$filename);
                    if(!$copy)
                    {
                        exit("Problem occured. Can't upload profile");
                    }
                }
            $insert  = "INSERT into customer (CustomerName,Email,Password,Phone,Dob,Gender,ProfilePicture,Address) values('$cname','$email','$password','$phone','$dob','$gender','$filename','$address')";

            $runinsert = mysqli_query($connection,$insert);
            if($runinsert)
            {
            echo "<script>alert('Customer Account Created.')</script>";
            }
            else
            {
            echo "<script>alert('Error Occured! Check query Syntax!')</script>";
            }
        }
    }
    else
    {
        echo "<script>alert('Age must be 18')</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
    <title>Customer Register</title>
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
        #btnregister, #btnback
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
    <h2 align="center">Customer Register Form</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <fieldset style="border-radius: 30px;">
            <legend style = "margin-left : 30px;">create your own account</legend>
            <table width="70%" border="0" align="center" style="padding-left: 50px; height : 450px;">
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
                    <td>Phone: </td>
                    <td><input type="text" name="txtphone" placeholder="Eg: 09123456789" required maxlength="11" minlength="8"></td>
                </tr>
                <tr>
                    <td>Date Of Birth: </td>
                    <td><input type="date" name="txtdob" required></td>
                </tr>
                <tr>
                    <td>Gender: </td>
                    <td>
                        <input type="radio" name="rdogender" value="Male" checked> Male 
                        <input type="radio" name="rdogender" value="Female"> Female 
                        <input type="radio" name="rdogender" value="Other"> Other
                    </td>
                </tr>
                <tr>
                    <td>Profile Picture: </td>
                    <td><input type="file" name="filprofile" required value="upload"></td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td><textarea name="txtaddress" cols="20" rows="5" placeholder="Eg: No.00, 00th floor A, Example Quater, Example Township, City" required></textarea></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="checkbox" required>Agreed Terms And Conditions</td>
                </tr>
                <tr>
                    <td><input type="submit" value="Register" name="btnregister" id="btnregister"></td>
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