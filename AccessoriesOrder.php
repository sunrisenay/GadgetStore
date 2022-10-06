<?php  
include ('home.html');
session_start();
date_default_timezone_set('Asia/Yangon');
error_reporting(E_ALL & ~E_NOTICE);
//error_reporting(E_ALL & ~E_WARNING);
$connection = mysqli_connect("localhost","root","","gaget_store");
if(!isset($_SESSION['cuid']))
{
    echo "<script>alert('User must Login First')</script>";
    echo "<script>location='CustomerLogin.php'</script>";
}
if(isset($_REQUEST['acid']))
{
    $accid = $_REQUEST['acid'];
    $select = "SELECT * FROM accessories WHERE AccessoriesID = '$accid'";
    $runselect = mysqli_query($connection,$select);
    $fetchdata = mysqli_fetch_array($runselect);
}
if(isset($_POST['btnorder']))
{
    $todaydate = date('Y-m-d');
    $cid = $_SESSION['cuid'];
    $tqty = $_POST['txtoqty'];
    $totalamount = $fetchdata['UnitPrice'] * $tqty;
    $phone = $_POST['txtphone'];
    $address = $_POST['txtaddress'];
    $paymenttype = $_POST['rdopayment'];
    if($paymenttype == 'cod')
    {
        $insert = "INSERT INTO accessoriessorder(OrderDate,AccessoriesID,CustomerID,TotalAmount,TotalQty,ContactPhone,DeliveryAddress,PaymentType) VALUES('$todaydate','$accid','$cid','$totalamount','$tqty','$phone','$address','$paymenttype')";
        $runinsert = mysqli_query($connection,$insert);
        if($runinsert)
        {   
            $update = "UPDATE `accessories` SET `TotalQty`= `TotalQty`- '$tqty' WHERE `AccessoriesID`= '$accid'";
            $runupdate = mysqli_query($connection,$update);
            echo "<script>alert('Order Successful')</script>";
            echo "<script>alert('location='ProductDisplay.php')</script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong. Error Occured')</script>";
            echo "<script>alert('location='ProductDisplay.php')</script>";
        }
    }
    else
    {
        $slip = $_FILES['filscreenshot']['name'];
            $filepath ="PaymentSlip/";
            if(!$slip)
            {
                $filename = $filepath."".$slip; //PaymentSlip/Slip.jpg
                $copy = copy($_FILES['filprofile']['tmp_name'],$filename);
                if(!$copy)
                {
                    exit("Problem occurred. Can't Upload profile");
                }
            }
            $insert = "INSERT INTO accessoriessorder(OrderDate,AccessoriesID,CustomerID,TotalAmount,TotalQty,ContactPhone,DeliveryAddress,PaymentType,ScreenShot) VALUES('$todaydate','$accid','$cid','$totalamount','$tqty','$phone','$address','$paymenttype','$filename')";
            $runinsert = mysqli_query($connection,$insert);
            if($runinsert)
            {   
                $update = "UPDATE `accessories` SET `TotalQty`= `TotalQty`- '$tqty' WHERE `AccessoriesID`= '$accid'";
                $runupdate = mysqli_query($connection,$update);
                echo "<script>alert('Order Successful')</script>";
                echo "<script>alert('location='ProductDiaplay.php')</script>";
            }
            else
            {
                echo "<script>alert('Something Went Wrong. Error Occured')</script>";
                echo "<script>alert('location='ProductDiaplay.php')</script>";
            }
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
    <title>Accessories Order</title>
    <style>
        h2
        {
            font-family: 'Josefin Sans', sans-serif;
            font-weight: bolder;
            text-align: center;
        }
        fieldset
        {
            width: 75%;
            margin: auto;
            border-radius: 25px;
        }
        fieldset, input, #desc
        {
            font-family: 'Didact Gothic', sans-serif;
        }
        img#accessimg
        {
            width: 320px;
            height: 320px;
            box-shadow: 2px 2px 8px black;
            border-radius: 25px;
        }
        #orderdelipay
        {
            width: 76%;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }
        #productdli, #productpay
        {
            width: 450px;
            padding: 10px;
        }
        #divbtn
        {
            width: 200px;
            margin: auto;
        }
        #btnorder, #btnback
        {
            text-decoration: none;
            color: gold;
            background-color: rgba(0,0,0,0.7);
            padding:10px 10px;
            font-weight: bold;
            border-radius:20px;
            margin: 30px 0;
        }
    
    </style>
</head>
<body>
    <h2><?php echo $fetchdata['AccessoriesName'] ?></h2>
    <form action="" method="post" enctype="multipart/form-data">
    <fieldset id="productorder">
        <legend>View More Detail and Order More</legend>
        <table width=100%>
            <td><img src="<?php echo $fetchdata['AccessoriesPhoto'] ?>" id="accessimg"></td>
            <td>
                <table height = "350px">
                    <caption><h3>Product Details</h3></caption>
                    <tr>
                        <td>Name: </td>
                        <td><?php echo $fetchdata['AccessoriesName'] ?></td>
                    </tr>
                    <tr>
                        <td>Model: </td>
                        <td><?php echo $fetchdata['AccessoriesModel'] ?></td>
                    </tr>
                    <tr>
                        <td>Brand: </td>
                        <td><?php echo $fetchdata['AccessoriesBrand'] ?></td>
                    </tr>
                    <tr>
                        <td>Stock Qty: </td>
                        <td><?php echo $fetchdata['TotalQty'] ?> Pcs</td>
                    </tr>
                    <tr>
                        <td>Color: </td>
                        <td><?php echo $fetchdata['Color'] ?></td>
                    </tr>
                    <tr>
                        <td>Unit Price: </td>
                        <td><?php echo $fetchdata['UnitPrice'] ?> MMK</td>
                    </tr>
                    <tr>
                        <td>Description: </td>
                        <td><pre id="desc" style="line-height:1.5"><?php echo $fetchdata['Description'] ?></pre></td>
                    </tr>
                    <tr>
                        <td>Order Qty: </td>
                        <td><input type="number" id="orderqty" min="1" max="<?php echo $fetchdata['TotalQty'] ?>" required name="txtoqty" id="oderqty"> Pcs</td>
                    </tr>
                    <tr>
                        <td>Total Amount:</td>
                        <td><label id="total">0</label>MMK</td>
                    </tr>
                </table>
            </td>
        </table>
    </fieldset>
    <div id="orderdelipay">
    <fieldset id="productdli">
        <legend>Delivery</legend>
        <table>
            <tr>
                <td>Customer Name:</td>
                <td><?php echo $_SESSION['cuname'] ?></td>
            </tr>
            <tr>
                <td>Contact Number: </td>
                <td><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="8" maxlength="11" placeholder="Eg: 09423898898" required name="txtphone"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><textarea name="txtaddress" id="" cols="19" rows="4"  placeholder="Eg: No.00, 00th floor A, Example Quater, Example Township, City" required></textarea></td>
            </tr>
        </table>
    </fieldset>
    <fieldset id="productpay">
        <legend>Payment</legend>
        <table>
            <tr>
                <td>Payment Type:</td>
            </tr>
            <tr>
                <td>
                <input type="radio" name="rdopayment" value="cod" checked onclick="cash();">Cash On delivery
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="rdopayment" value="onlinepay" onclick="online();">Online Payment <br>
                    <div style = "margin-left: 25px;" id="onlinepay"> Kpay: 09421142342 <br>
                    Ayapay: 09421142342 <br>
                    CBpay: 09421142342 <br>
                    Wavepay: 09421142342 <br>
                    Screenshot: <input type = "file" name="filscreenshot" id="screenshot">
                    </div>
                </td>
            </tr>
        </table>
    </fieldset>
    </div>
    <div id="divbtn">
        <input type="submit" name="btnorder" id="btnorder" value="order">
        <button id="btnback" onclick="histroy.back();">Back</button>
    </div>
    </form>
    <script>
        $(document).ready(function(){
            $('#onlinepay').hide();
            $("#orderqty").on('input',function(){
            $('#total').text($('#orderqty').val() * (<?php echo $fetchdata['UnitPrice'] ?>));
            });
        });
        function cash()
        {
            $('#onlinepay').hide(3000);
            $('#screenshot').removeAttr('required','');
        }
        function online()
        {
            $('#onlinepay').show(3000);
            $('#screenshot').attr('required','');
        }
    </script>
</body>
</html>