<?php
  include "connection.php";
  include "navbar4.php";
  
?>
<!DOCTYPE html>
<html>
<head>
  <title>Approve Request</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>

    .srch
    {
      padding-left: 850px;

    }
    .form-control
    {
      width: 300px;
      height: 45px;
      background-color: black;
      color: white;
    }
    
    body {
            transition: background-color .5s;
        }

        #displayImage img {
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
            width: 100%;
            height: 105%;
            filter: brightness(75%);
        }
        .sidenav {
          font-family: 'Brush Script MT', cursive;
        height: 100%;
        margin-top: 50px;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #222;
        color: #e6d522;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }
    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 35px;
        color: #e6d522;
        display: block;
        transition: 0.3s;
    }
    .sidenav a:hover {
        color: #f1f1f1;
    }
    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }
        

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                color: gold;
                font-size: 18px;
            }
        }

        .img-circle {
            margin-left: 20px;
			box-shadow: 0px 0px 10px rgba(245, 241, 4, 0.94);
        }

        .container {
      background: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
      box-shadow: 0px 0px 10px rgba(245, 241, 4, 0.94);
      padding: 35px;
      padding-top:0;
      border-radius: 15px;
      width: 30%; 
      margin: 35px auto;
      text-align: center;
      height:450px;
      text-align: center;
      display: flex;
      justify-content:center;
      align-items:center;
      flex-direction:column;o
  }

  .container h3 {
      margin-top: 0;
      color: #e6d522;
      font-size: 2.5rem;
  }
  /* Button Styling */
  .btn {
      width: 80px;
      border: 2px solid #e6d522;
      color: white;
      background: transparent;
      padding: 5px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
  }

  .btn:hover {
      background: #e6d522;
      color: black;
  }
  .Approve input {
      
      border: 2px solid #e6d522;
      
    }
    input[type="date"] {
        background-color: black !important;
        color: white !important;
        border: 2px solid #e6d522;
    }

  </style>

</head>
<body>
<!--_________________sidenav_______________-->
<div id="displayImage">
        <img src="images/ex.webp" alt="Selected Image">
    </div>
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <div style="color: white; margin-left: 60px; font-size: 35px;">

                <?php
                if(isset($_SESSION['login_user']))

                {   echo "<img class='img-circle profile_img' height=120 width=120 src='images/profile.png'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>
<a href="books.php">Books</a>
<a href="request.php">Book Request</a>
<a href="issue_info.php">Issue Information</a>
<a href="expired.php">Expired List</a>
</div>

<div id="main">
  
<span style="font-size:32px;font-family: 'Brush Script MT', cursive; cursor:pointer; color: #e6d522;" onclick="openNav()">&#9776; open</span>


  <script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
    document.getElementById("main").style.marginLeft = "300px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
  }
  </script>
  <div class="container">
    <br><h3 style="text-align: center;font-size:35px;font-family: 'Brush Script MT', cursive;">Approve Request</h3><br>
    
    <form class="Approve" action="" method="post" onsubmit="return validateDate()">
    <input class="form-control" type="text" name="approve" placeholder="Yes or No" required=""><br>

    <input type="date" id="issueDate" name="issue" placeholder="Issue Date yyyy-mm-dd" required="" class="form-control" readonly><br>

    <input type="date" id="returnDate" name="return" placeholder="Return Date yyyy-mm-dd" required="" class="form-control" readonly><br>

    <input type="text" name="tm" class="form-control" placeholder="Return Date  March 18, 2025 15:00:00" required=""><br>

    <button class="btn btn-default" type="submit" name="submit">Approve</button>
</form>

<script>
    function setDefaultDates() {
        let today = new Date();
        let issueDate = today.toISOString().split("T")[0]; // Get today’s date in yyyy-mm-dd format

        let returnMinDate = new Date();
        returnMinDate.setDate(today.getDate() + 14); // Add 14 days for return date
        let returnDate = returnMinDate.toISOString().split("T")[0];

        document.getElementById("issueDate").value = issueDate;
        document.getElementById("returnDate").value = returnDate;
    }

    window.onload = setDefaultDates; // Set default issue and return dates when the page loads
</script>

  
</div>
</div>

<?php
  if(isset($_POST['submit']))
  {
    mysqli_query($db,"INSERT into timer VALUES ('$_SESSION[name]', '$_SESSION[bid]', '$_POST[tm]') ;");
    mysqli_query($db,"UPDATE  `issue_book` SET  `approve` =  '$_POST[approve]', `issue` =  '$_POST[issue]', `return` =  '$_POST[return]' WHERE username='$_SESSION[name]' and bid='$_SESSION[bid]';");

    mysqli_query($db,"UPDATE books SET quantity = quantity-1 where bid='$_SESSION[bid]' ;");

    mysqli_query($db,"UPDATE books SET bcount = bcount-1 where bid='$_SESSION[bid]' ;");

    $res=mysqli_query($db,"SELECT quantity from books where bid='$_SESSION[bid]';");

    while($row=mysqli_fetch_assoc($res))
    {
      if($row['quantity']==0)
      {
        mysqli_query($db,"UPDATE books SET status='not-available' where bid='$_SESSION[bid]';");
      }
    }
    ?>
      <script type="text/javascript">
        alert("Updated successfully.");
        window.location="request.php"
      </script>
    <?php
  }
?>
</body>
</html>