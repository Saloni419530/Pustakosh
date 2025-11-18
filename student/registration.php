<?php
  include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>

  <title>Student Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    
    body {
      height: 87vh;
      width: 100vw;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      overflow-x: hidden;
    }

    /* Navbar Styling */
    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 2px 20px;
      border-radius: 10px;
      width: 90%;
      position: absolute;
      top: 5px;
    }

    /* Logo Section */
    .navbar .logo img {
      height: 8rem;
      width: auto;
      border-radius: 50%;
      margin-left: -50px;
    }

    /* Centered Typo */
    .navbar .typo {
      font-size: 3.8rem;
      color: #e6d522;
      position: relative;
      top: -15px;
      left: -230px; 
    }

    /* Navigation Links */
    .navbar .nav-options {
      display: flex;
      list-style: none;
      position: relative;
      top: -10px;
      right: -70px; 
    }

    .navbar .nav-options li {
      margin: 0 15px;
    }

    .navbar .nav-options a {
      color: #e6d522;
      text-decoration: none;
      font-size: 1.8rem;
      transition: color 0.3s ease;
    }

    .navbar .nav-options a:hover {
      color: white;
    }

    /* Login Section */
    .reg_img {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 100%;
    }

    .box2 {
      margin-top: 170px;
      height: 570px;
      width: 400px;
      background: rgba(0, 0, 0, 0.5);
      padding: 10px;
      border-radius: 10px;
      box-shadow: 0px 0px 15px rgba(245, 241, 4, 0.94);
      text-align: center;
    }

    .box2 h1 {
      color: #e6d522;
    }

    #displayImage img {
      position: fixed;
      top: 0;
      left: 0;
      z-index: -1;
      width: 100%; /* Adjust to occupy 90% of the parent width */
      height: 105%; /* Maintain the aspect ratio */
      filter: brightness(75%); 
    }

    .login input {
      width: 90%;
      padding: 10px;
      margin: 10px 0;
      border: 2px solid #e6d522;
      border-radius: 5px;
      font-size: 1rem;
      background: transparent;
      color: #e6d522;
    }

    .login input::placeholder {
      color: #e6d522;
    }

    .btn .btn-default{
      background-color: #e6d522;
      border: none;
      font-size: 0.9rem;
      cursor: pointer;  
      border-radius: 5px;
      width: 100px;  
      height: 40px;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .btn:hover {
      background-color: #e6d522;
      color:black;
    }

    p {
      font-size: 1rem;
      color: #e6d522;
    }

    p a {
      color: #e6d522;
      text-decoration: none;
      font-weight: bold;
    }

    p a:hover {
      text-decoration: underline;
    }


  </style>   
</head>

<body>
<div id="displayImage">
<img src="images/bg.jpeg" alt="Selected Image">
  </div>
<nav class="navbar">
        <!-- Left Logo -->
        <div class="logo">
            <img src="images/logo.jpeg" alt="Logo">
        </div>

        <!-- Center Text -->
        <div class="typo">पुस्तक𝖔𝖘𝖍</div>
        
        <!-- Navigation Menu -->
        <ul class="nav-options">
            <li><a href="index.php">&#x22C4 𝕳𝖔𝖒𝖊</a></li>
            <li><a href="books.php">&#x22C4 𝕭𝖔𝖔𝖐𝖘</a></li>
            <li><a href="games.php">&#x22C4 𝕲𝖆𝖒𝖊𝖘</a></li>
            <?php if(isset($_SESSION['login_user'])) { ?>
                <li><a href="">Welcome <?php echo $_SESSION['login_user']; ?></a></li>
                <li><a href="logout.php">&#x22C4 𝕷𝖔𝖌𝖔𝖚𝖙</a></li>
            <?php } else { ?>
                <li><a href="login.php">&#x22C4 𝕷𝖔𝖌𝖎𝖓</a></li>
            <?php } ?>
        </ul>
    </nav>

    <div class="box2">
    <h1 style="font-size:35px;font-family: 'Brush Script MT', cursive;">Registration Form</h1>
    <form name="Registration" action="" method="post" onsubmit="return validateForm()">
        <div class="login">
            <input type="text" name="first" id="first" placeholder="First Name" required 
                pattern="([A-Za-z]+\.*\s?)*" title="Only letters, min 2 characters"><br>

            <input type="text" name="last" id="last" placeholder="Last Name" required 
                pattern="[A-Za-z]{2,}" title="Only letters, min 2 characters"><br>

            <input type="text" name="username" id="username" placeholder="Username" required 
                pattern="[A-Za-z0-9]{2,}" title="Alphanumeric, min 2 characters"><br>

            <input type="password" name="password" id="password" placeholder="Password" required 
                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" 
                title="At least 8 characters, including 1 uppercase, 1 lowercase, 1 number, and 1 special character."><br>

            <input type="text" name="roll" id="roll" placeholder="Roll No" required 
                pattern="[0-9]{2,}" title="Roll No should be in numbers and at least 2 digits"><br>

            <input type="email" name="email" id="email" placeholder="Email" required><br>

            <input type="text" name="contact" id="contact" placeholder="Phone No" required 
                pattern="[0-9]{10}" title="Exactly 10 digits"><br>

            <input style="font-size:17px;font-family: 'Brush Script MT', cursive;" class="btn" type="submit" name="submit" value="Sign Up">
        </div>
    </form>
</div>

<script>
function validateForm() {
    var email = document.getElementById("email").value;
    var emailRegex = /^[a-zA-Z0-9._%+-]*[0-9]+[a-zA-Z0-9._%+-]*@([a-zA-Z0-9.-]+)\.(com|in|org|net|edu|gov|co|info)$/;

    if (!emailRegex.test(email)) {
        alert("Email must contain at least one number before '@' and have a valid domain like gmail.com, yahoo.in, etc.");
        return false;
    }

    return true;
}
</script>


    <?php

      if(isset($_POST['submit']))
      {
        $count=0;
        $sql="SELECT username from `student`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['username']==$_POST['username'])
          {
            $count=$count+1;
          }
        }
      if($count==0)
      {
        mysqli_query($db,"INSERT INTO `STUDENT` VALUES('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[roll]', '$_POST[email]', '$_POST[contact]', 'sprofile.png');");
    ?>
    
      <script type="text/javascript">
        window.location="../login.php"
        alert("Registration Successful");
      </script>
    <?php
  }
      else
      {
          ?>
      <script type="text/javascript">
        alert("The username already exist.");
      </script>
    <?php

      }
      }
    ?>

</body> 
</html>