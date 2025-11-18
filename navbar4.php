<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="images/logo.jpeg">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
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
            font-size: 3.7rem;
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
</head>

<body>
<?php
if(isset($_SESSION['login_user']))
{
  $r=mysqli_query($db,"SELECT COUNT(status) as total from message where status='no' and username='$_SESSION[login_user]' and sender='admin' ;");
  $c=mysqli_fetch_assoc($r);

  //------timer------
  $b=mysqli_query($db,"SELECT * from issue_book where username='$_SESSION[login_user]' and approve='Yes' ORDER BY `return` ASC limit 0,1 ;");
  $var1=mysqli_num_rows($b);
  $bid=mysqli_fetch_assoc($b);

  $res = null;
  if($bid) {
      $t=mysqli_query($db,"SELECT * from `timer` where name='$_SESSION[login_user]' and bid='$bid[bid]' ;");
      $res=mysqli_fetch_assoc($t);
  }
}
?>
<nav class="navbar">
    <!-- Center Text -->
    <div class="typo">पुस्तक𝖔𝖘𝖍</div>
    <ul class="nav-container">
            <li><a href="index.php">&#x22C4 𝕳𝖔𝖒𝖊</a></li>
            <li><a href="books.php">&#x22C4 𝕭𝖔𝖔𝖐𝖘</a></li>
            <li><a href="feedback.php">&#x22C4 𝕱𝖊𝖊𝖉𝖇𝖆𝖈𝖐</a></li>
            <li><a href="profile.php">&#x22C4 𝕻𝖗𝖔𝖋𝖎𝖑𝖊</a></li>
            <li><a href="fine.php">&#x22C4 𝕱𝖎𝖓𝖊𝖘</a></li>
            <li><a><p style="color: #ff1503; font-size: 20px;" id="demo"></p></a></li>
            <li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span><span class="badge bg-green">
            <?php 
                echo $c['total'];
            ?>
            <li><a href="">
                    <div style="color: white">
                      <?php
                        echo "<img class='img-circle profile_img' height=30 width=30 src='images/".$_SESSION['pic']."'>";
                        echo " ".$_SESSION['login_user']; 
                      ?>
                    </div>
                  </a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
    </ul>
    <?php
            if($var1==1 && $res)
            {
            ?>
            <!--timer-->
  <script>
  var countDownDate = new Date("<?php echo $res['tm']; ?>").getTime();
  var x = setInterval(function() {
    var now = new Date().getTime();
    var distance = countDownDate - now;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    document.getElementById("demo").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "EXPIRED";
    }
  }, 1000);
  </script>
<?php } ?>

</nav>
<?php
      if(isset($_SESSION['login_user']))
      {
        $day=0;
        $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';
        $res= mysqli_query($db,"SELECT * FROM `issue_book` where username ='$_SESSION[login_user]' and approve ='$exp' ;");
      
      while($row=mysqli_fetch_assoc($res))
      {
        $d= strtotime($row['return']);
        $c= strtotime(date("Y-m-d"));
        $diff= $c-$d;

        if($diff>=0)
        {
          $day= $day+floor($diff/(60*60*24)); 
        }
      }
      $_SESSION['fine']=$day*.3;
    }
    else
    { ?>
      <nav class="navbar">
      <div class="typo">पुस्तक𝖔𝖘𝖍</div>
      <ul class="nav-container">
        

            <li><a href="index.php">HOME</a></li>
            <li><a href="books.php">BOOKS</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
                  <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                  <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
        </ul>
      </div>
      </nav>
    <?php 
}
?>
</body>
</html>