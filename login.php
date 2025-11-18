<?php
  include "connection.php";
  include "navbar1.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="images/logo.jpeg">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <style>
    /* Body Styling */
    body {
      background-image: url('images/studentLogin.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      font-family: 'Harry Potter', sans-serif;
      /*height: 100vh;
      width: 100vw;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;*/
    }

    /* Login Section */
    .log_img {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 100%;
    }

    .box1 {
      margin-top: 30px;
      width: 500px;
      background: rgba(0, 0, 0, 0.6);
      padding: 30px;
      border-radius: 10px;
      margin-left: auto;
      margin-right: auto;
      box-shadow: 0px 0px 20px 5px rgba(212, 175, 55, 0.7);
      text-align: center;
      height: 450px;
      background-color: black;
      opacity: .7;
      color: gold;
      font-family: 'UnifrakturMaguntia', cursive;
    }

    .box1 h1 {
      font-family: Algebian;
      color: #e6d522;
    }

    .login input {
  width: 100%;
  padding: 10px;
  margin: 5px 0; /* Reduced margin */
  border: 2px solid #e6d522;
  border-radius: 5px;
  font-size: 1.5rem;
  background: transparent;
  color: #e6d522;
}

    .login input::placeholder {
      color: #e6d522;
    }

    .btn-default {
  background-color: #e6d522;
  border: none;
  font-size: 1rem;
  cursor: pointer;  
  border-radius: 5px;
  width: 100%; /* Ensures it takes full width */
  height: 40px;
  text-align: center;
  display: block; /* Makes it behave like a block element */
  font-weight: bold;
  color: black;
}

    .btn:hover {
      background-color: #e6d522;
    }

    p {
      font-size: 1.5rem;
      color: #e6d522;
    }
    p a {
      color: #e6d522;
      text-decoration: none;
      font-weight: bold;
    }

    p a:hover {
      text-decoration: underline;
      color:#e6d522;
    }
  </style>
</head>
<body>
  

  <!-- Login Section -->
  <section>
    <div class="log_img">
      <div class="box1">
        <h1 style="font-size: 33px;">𝕷𝖔𝖌𝖎𝖓 𝖋𝖔𝖗𝖒</h1>
        <form name="login" action="" method="post">
        <b><p style="text-align: center; font-size: 20px;color: #e6d522;">𝕷𝖔𝖌𝖎𝖓 𝖆𝖘:</p></b>
        <input type="radio" name="user" id="admin" value="admin">
        <label for="admin" style="color: #e6d522;">Admin</label>
        <input style="margin-left: 50px; width: 18px;"type="radio" name="user" id="student" value="student" checked="">
        <label for="student" style="color: #e6d522;">User</label>
          <div class="login">
            <input class="form-control" type="text" name="username" placeholder="𝖚𝖘𝖊𝖗𝖓𝖆𝖒𝖊" required> <br>
            <input class="form-control" type="password" name="password" placeholder="𝖕𝖆𝖘𝖘𝖜𝖔𝖗𝖉" required> <br>
            <input class="btn btn-default" type="submit" name="submit" value="𝖑𝖔𝖌𝖎𝖓" style="width: 100px; height: 40px; text-align: center; display: block; margin: auto;">

          </div>
          <p>
            <br><br>
            <a href="updatepassword.php">𝕱𝖔𝖗𝖌𝖔𝖙 𝖕𝖆𝖘𝖘𝖜𝖔𝖗𝖉?</a> &nbsp;&nbsp;
            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="registration.php">𝖘𝖎𝖌𝖓 𝖚𝖕</a>
          </p>
        </form>
      </div>
    </div>
  </section>
<?php


    if(isset($_POST['submit']))
    {
      if($_POST['user']=='admin')
      {
        $count=0;
      $res=mysqli_query($db,"SELECT * FROM admin WHERE username='$_POST[username]' and password='$_POST[password]' and status='yes';");
      
      $row= mysqli_fetch_assoc($res);

      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
          <div class="alert alert-danger" style="width: 600px; margin-left : 370p x; color: black">
            <strong>The username or password does not match.</strong>
          </div>
        <?php
      }
      else
      {
        $_SESSION['login_user'] = $_POST['username'];
        $_SESSION['pic'] = $row['pic'];
        $_SESSION['username']='';
        ?>
          <script type="text/javascript">
            window.location="Admin/profile.php"
          </script>
        <?php
      }
      }
      else
      {
      $count=0;
      $res=mysqli_query($db,"SELECT * FROM student WHERE username='$_POST[username]' && password='$_POST[password]';");
      
      $row= mysqli_fetch_assoc($res);
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
             
          <div class="alert alert-danger" style="width: 700px; margin-left : 360p x; color: black">
            <strong>The username and password does not match.</strong>
          </div>

        <?php
      }
      else
      {
        $_SESSION['login_user'] = $_POST['username'];
        $_SESSION['pic'] = $row['pic'];
        
        ?>
          <script type="text/javascript">
            window.location="Student/profile.php"
          </script>
        <?php
      }
    
    }
  }
  ?>
</body>
</html>