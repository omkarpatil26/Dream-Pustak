<?php 
include("includes/connect.php"); 
session_start();
if($_SESSION['username'] == true){
    $rollno = $_SESSION['username'];
    if($rollno == "admin"){
        header('location: admin_availablebooks.php');
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Barriecito&family=Bigshot+One&family=Flavors&family=Kavoon&family=Michroma&family=Trade+Winds&family=Unlock&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel = "icon" href = "images/logo.png" type = "image/x-icon">
        <title>yourorder</title>
        <style>
            body{
                margin: 0;
                padding: 0;
                background: url(images/home.jpg);
                background-size: cover;
                background-position: center;
                box-sizing: border-box;
            }

            /* navbar-style */

            header {
                background-color: rgb(231, 180, 13);
                padding: 10px;
                height:90px;
            }
 
            .s-content ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: rgb(41, 2, 73);
                height: 50px;
            }
            
            .s-content ul li {
                float: left;
            }
            
            .s-content ul li a {
                display: block;
                color: white;
                text-align: center;
                padding: 10px;
                text-decoration: none;
                margin-left:30px;
                font-size:20px;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            
            .s-content ul li a:hover {
                background-color: rgb(182, 172, 172);
            }
            .books{
                float:left;
                font-size:50px;
                color:rgb(25, 5, 70);
                font-family: 'Michroma', sans-serif;
                margin-left:20px;
            }
            .carlog{
                float:right;
                margin-top:38px;
                color:black;
                font-size:27px;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                margin-right:20px;
            }

            /* content-style */

            .content-box{
                width: 87%;
                height: auto;
                background: white;
                /* background: rgba(0, 0, 0, 0.5); */
                color: black;
                position: absolute;
                /* align: center; */
                box-sizing: border-box;
                padding: 30px 30px 20px 30px;
                margin: 60px 100px 0px 100px;
                font-family: Sans-serif;
                border: solid 7px rgb(231, 180, 13);
                
            }

            table, th, td{
                border: 1.5px solid black;
                border-collapse: collapse;
            }
            
            table{
                width: 100%;
                border: 3px solid rgb(41, 2, 73);
            }

            th, td{
                padding: 10px;
                text-align: center;
                
            }
            td{
                background-color: #cccccc;
                font-size: 20px;
                font-family: Sans-serif;
                
            }
            td h1{
                    font-size: 40px;
                    text-decoration: underline;
            }

            th{
                background-color: #8a0900;
                color: white;

            }
            .footer {
                 position: fixed;

                  left: 0;
                  bottom: 0;
                 width: 100%;
                 background-color: #ffc400;
                 color: white;
                 height: 50px;
                 text-align: center;}

        </style>
    </head>
    <body>
        <header>
            <div class="info">
                <div class="books">
                <b>Dream Pustak</b>
                </div>
                <div class="carlog">
                    <?php
                        $queryN = "SELECT FN, LN FROM user WHERE RollNo = '$rollno'";
                        $queryN_run = mysqli_query($conn, $queryN);
                        $rowN = mysqli_fetch_assoc($queryN_run);
                        echo "Hello, " . $rowN["FN"]. " " . $rowN["LN"]. " ";
                    ?>
                    <b><a href="logout.php" class="px-1"><i class="material-icons" >account_circle</i><span>Log Out</span></a></b>
        </header>
        <div class="s-content">
            <ul>
                <li><a href="viewbooks.php">View Books</a></li>
                <li><a href="sellbook.php">Sell Books</a></li>
                <li><a class="active" href="yourbooks.php">Your Books</a></li>
                <li><a href="yourrequests.php">Your Requests</a></li>
                <li><a style="color:rgb(41, 2, 73); background-color: rgb(231, 180, 13);" href="#">Your Orders</a></li>
            </ul>
        </div>


        <div class="content-box">   
            <?php 
                $query = "SELECT * FROM addbook WHERE Buyer = '$rollno' AND BuyStatus ='CLOSE'";
                $query_run = mysqli_query($conn, $query);
                if(mysqli_num_rows($query_run)>0){
            ?>
            <table>
                    <tr>
                        <td colspan = "5"><h1>YOUR ORDERS</h1></td>
                    </tr>
                    <tr>
                        <th>Book Name</th>
                        <th>Auther Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                    </tr>
                    <?php
                            while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                                <tr>
                                    <td> <?php echo $row['BookName']?></td>
                                    <td> <?php echo $row['AuthName']?></td>
                                    <td> <?php echo $row['Price']?></td>
                                    <td> <?php echo $row['Description']?></td>
                                    <td> <?php echo '<img src = "uploads/'.$row['Image'].'" width = "100px" height = "100px" alt = "">'?></td>
                                </tr>
                                <?php
                            }
                                ?>
            </table>
            <?php
                }
                else{
                    ?>

                <div style="margin-top: 30px; margin-left: 30px;">
                    <p><h2>NO RECORD FOUND</h2></p>
                </div>

                <?php
                }
            ?>
        </div>

        <div class="footer">
  <p>Omkar Patil    &emsp; 9028141154    &emsp;   omkarpatil26498@gmail.com</p>
</div>

    </body>
<?php 
}

else{
    header('location: login.php');
}
?>
