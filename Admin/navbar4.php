<?php
  session_start();
  include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>
  </title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="images/logo.jpeg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .harry-font {
        font-family: 'Harry Potter', sans-serif;
        font-size: 2rem;
        }        
        /* Navbar Styling */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2px 20px;
            margin-top:20px;
        }
        /* Centered Text */
        .navbar .typo {
            font-size: 3.99rem;
            color: #e6d522;
            flex-grow: 1;
            position: relative;
            top: -10px;
        }
        
        /* Navigation Menu */
        .nav-container {
            display: flex;
            flex-grow: 1;
            justify-content: space-evenly;
            list-style: none;
            padding: 0;
            position: relative;
            top: -12px;
        }
        
        .nav-container li {
            list-style: none;
            margin: 10 5px;
        }
        
        .nav-container a {
            color: #e6d522;
            text-decoration: none;
            font-size: 2.5rem;
            transition: color 0.3s ease;
        }
        
        .nav-container a:hover {
            color: white;
        }
    </style>
<body>
<?php
  $r=mysqli_query($db,"SELECT COUNT(status) as total from message where status='no' and sender='student' ;");
  $c=mysqli_fetch_assoc($r);
  $sql_app=mysqli_query($db,"SELECT COUNT(status) as total from admin where status='';");
  $a=mysqli_fetch_assoc($sql_app);
?>
  <nav class="navbar">
      <!-- Center Text -->
    <div class="typo">पुस्तक𝖔𝖘𝖍</div>
          <ul class="nav-container">
            <li><a href="index.php">&#x22C4 𝕳𝖔𝖒𝖊</a></li>
            <li><a href="books.php">&#x22C4 𝕭𝖔𝖔𝖐𝖘</a></li>
            <li><a href="feedback.php">&#x22C4 𝕱𝖊𝖊𝖉𝖇𝖆𝖈𝖐</a></li>
          </ul>
          <?php
            if(isset($_SESSION['login_user']))
            {?>
                <ul class="nav-container">
                  <li><a href="profile.php">&#x22C4 𝕻𝖗𝖔𝖋𝖎𝖑𝖊</a></li>
                  <li><a href="student.php">
                  &#x22C4 𝖀𝖘𝖊𝖗-𝕴𝖓𝖋𝖔𝖗𝖒𝖆𝖙𝖎𝖔𝖓
                  </a></li>
                  <li><a href="fine.php">&#x22C4 𝕱𝖎𝖓𝖊𝖘</a></li>
                </ul>

                <ul class="nav-container">
                  <li><a href="admin_status.php"><span class="glyphicon glyphicon-user"></span><span class="badge bg-green">
                     <?php 
                      echo $a['total'];
                     ?>
                   </span></a></li>
                  <li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span><span class="badge bg-green">
                     <?php 
                      echo $c['total'];
                     ?>
                   </span></a></li>
                  <li><a href="profile.php">
                    <div style="color: #e6d522">

                      <?php
                        echo "<img class='img-circle profile_img' height = 30 width=30 src='images/profile.png'>";

                        echo " ".$_SESSION['login_user'];
                      ?>
                    </div>
                  </a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> 𝕷𝖔𝖌𝖔𝖚𝖙</span></a></li>
                </ul>
              <?php
            }
            else
            {   
              ?>
                <ul class="nav navbar-nav navbar-right">

                  <li><a href="../login.php"><span class="glyphicon glyphicon-log-in">&#x22C4 𝕷𝖔𝖌𝖎𝖓</span></a></li>
                  
                  <li><a href="registration.php"><span class="glyphicon glyphicon-user"> 𝕾𝖎𝖌𝖓 𝖚𝖕</span></a></li>
                </ul>
              <?php
            }
          ?>


      </div>
    </nav>

</body>
</html>