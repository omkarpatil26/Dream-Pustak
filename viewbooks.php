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
        <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
        <link rel = "icon" href = "images/logo.png" type = "image/x-icon">
        <title>viewbooks</title>
        <style>
            body{
                margin: 0;
                padding: 0;
                background-color: #ffe57f;
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

            .books
            {
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
                width: 80%;
                height: auto;
                background: #00daf7;
                 background: rgba(0, 0, 0, 0.5); 
                color: white;
                position: absolute;
                align : center;
                box-sizing: border-box;
                padding: 30px 30px 20px 30px;
                margin: 80px 200px 0px 200px;
            }
            
            div.gallery {
                margin: 40px;
                border: 2px solid #B8B8B8 ;
                float: left;
                height: 330px;
                width: 18%;
                background: blue;
                background-color: white;
                font-family: Sans-serif;
                
                margin-top: 100px;
            }

            div.gallery:hover {
                color: #212121;
                background-color: #ff8f00;
            } 
  
            div.gallery:hover {
                border: 1   px solid black;
            }
            
            div.gallery img {
                padding: 10px;
                width: 92%;
                height: 60%;
                border-bottom: 2px solid #ff6f00 ;
            }
            
            div.desc {
                padding-top: 5px;
                padding-left: 15px;
                font-size: 18px;
                /* text-align: center; */
            }

            .details{
                background-color: #F2CE0E;
                width: 100px;
                border: 1px solid black;
                color: black;
                padding: 10px 0px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                float: right;
                border-radius: 5px;
                
            }

            .details:hover{
                cursor: pointer;
                background-color: #ffc107;
                color: #000;
            }

            .butt{
                padding-right: 20px;
            }
            #header-image-menu img{ 
                width: 100%; 
                margin: none; 
                padding: none; 
                height: 400px;
            } 
            .image-text{ 
                position: absolute; 
                top: 32%; 
                left: 16%; 
                font-family: 'Architects Daughter', cursive;
                color: black; 
                transform: translate(-30%, -30%); 
                text-align: center; 
                font-size: 50px;
            }

            .searchbox {  
                float: right;  
                margin-right: 50px;
                margin-top: 30px;
            }  
            .searchbox input[type=text] {  
                margin-right: 10px;
                padding: 9px;   
                font-size: 17px;  
                border-radius: 50px;  
                width:300px;
            }  
            .searchbox button {  
                padding: 10px 20px 10px 20px;  
                margin-top: 10px;  
                color:white;
                background-color: darkblue;  
                font-size: 20px;  
                border-radius: 30px;  
                cursor: pointer;  
            }  
                .searchbox button:hover {  
                background: blue;  
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

            h1{
                font-size:40px;
                font-family: Sans-Serif;
                margin-left: 50px;
                margin-top:75px;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="info">
                <div class="books">
                <b>Dream Pustak</b>
                <!--<img src="images\logo1.png">-->
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
                <li><a style="color:rgb(41, 2, 73); background-color: rgb(231, 180, 13);" href="#">View Books</a></li>
                <li><a href="sellbook.php">Sell Books</a></li>
                <li><a href="yourbooks.php">Your Books</a></li>
                <li><a href="yourrequests.php">Your Requests</a></li>
                <li><a href="yourorders.php">Your Orders</a></li>
            </ul>
        </div>
        
        <div id="header-image-menu"> 
            <img src="images\image.jpg"> 
            <h2 class = "image-text">BUY SELL or RENT your <br> Used and New Books <br> At best prices</h2>
        </div>
        <!-- <div class="searchbox">
            <form>
                <input type="text" placeholder=" Search...." name="search">   
                <button type="submit">Search</button>   
            </form>
        </div> -->
<h1>&nbsp; Recently Added</h1>

        
        <?php 
            $query = "SELECT * FROM addbook WHERE BuyStatus= 'OPEN'";
            $query_run = mysqli_query($conn, $query);
            if(mysqli_num_rows($query_run)>0){
        ?>
        <?php
            while($row = mysqli_fetch_assoc($query_run)){
        ?>
                <div class="gallery">
                    <a target="_blank">
                    <?php echo '<img src = "uploads/'.$row['Image'].'" alt="book" width="600" height="400">'?>
                    </a>
                    <div class="desc"><b><?php echo $row['BookName']?></b></div>
                    <div class="desc" style="color: #424242;"><?php echo " Price: " . $row["Price"]. " Rs "?></div>
                    <div class="butt">
                        <a href="bookdetails.php?ID=<?php echo $row['BookId']?>" type="submit" name="details" class= "details">Details</a>
                    </div>
                    
                </div>
        <?php
            }
        ?>
        <?php
            }
            else{
                echo "no record found";
            }
        ?>

        <div class="footer">
  <p>Omkar Patil    &emsp; 9028141154    &emsp;   omkarpatil26498@gmail.com</p>
</div>

    </body>
    </html>

<?php 
}

else{
    header('location: login.php');
}
?>

