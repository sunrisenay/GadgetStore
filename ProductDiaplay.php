<?php
include ('Headerhomepage.html');
date_default_timezone_set('Asia/Yangon');
error_reporting(E_ALL & ~E_NOTICE);
//error_reporting(E_ALL & ~E_WARNING);
$connection = mysqli_connect("localhost","root","","gaget_store");

$select = "SELECT * FROM accessories";
$runselect = mysqli_query($connection,$select);
$count = mysqli_num_rows($runselect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2
        {
            font-family: 'Josefin Sans', sans-serif;
            font-weight: bolder;
            text-align: center;
        }
        section#product-display
        {
            font-family: 'Didact Gothic', sans-serif;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            margin top: 30px;
            margin-bottom: 30px;
        }
        section#product-display > div
        {
            width: 280px;
            box-shadow: 2px 2px 10px black;
            margin-bottom: 40px;            
            border-radius: 25px;
        }
        section#product-display > div > img
        {
            width: 100%;
            height: 250px;
        }
        table
        {
            margin-top: 8px;
            width: 100%;
            height: 120px;
            padding: 5px;
            line-height: 2.4;
        }
        a#btnmore
        {
            text-decoration: none;
            color: gold;
            background-color: rgba(0,0,0,0.7);
            padding:10px 10px;
            font-weight: bold;
            border-radius:20px;
                        
        }
        section#product-display > div:hover
        {
            transform: scale(1.1);
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
    <h2>
        Accessories
    </h2> <br> <br>
    <section id="product-display">
    <?php
    for($i=0 ; $i<$count; $i++)
    {
        $fetchdata = mysqli_fetch_array($runselect);
        $acid = $fetchdata['AccessoriesID'];
        echo "<div>";
        echo "<img src='".$fetchdata['AccessoriesPhoto']."'>";
        echo "<table>";
        echo "<tr>";
        echo "<td>Name: </td>";
        echo "<td>".$fetchdata['AccessoriesName']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Price: </td>";
        echo "<td>".$fetchdata['UnitPrice']." MMK</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='3' align='center'><a href='AccessoriesOrder.php?acid=$acid' id='btnmore'>More Details</a></td>";
        echo "</tr>";
        echo "</table>";
        echo "</div>";
    }
    ?>
    <!-- <div>
            <img src="AccessoriesPhoto/jblpods.jpg" alt="" width=250px height=250px>
            <table>
                <tr>
                    <td>Name:</td>
                    <td>JBL Ear Pods</td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>10000 MMK</td>
                </tr>
            </table>
        </div> 
        -->
    </section>

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