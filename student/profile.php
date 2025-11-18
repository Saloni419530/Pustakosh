<?php
  include "connection.php";
  include "navbar4.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
  <style>
  /* Background Image */
  #displayImage img {
    position: fixed;
    top: 0;
    left: 0;
    z-index: -1;
    width: 100%;
    height: 100%;
    filter: brightness(75%);
  }

  /* Profile Container */
  .container {
      background: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
      box-shadow: 0px 0px 10px rgba(245, 241, 4, 0.94);
      padding: 28px;
      border-radius: 15px;
      width: 30%; 
      margin: 28px auto;
      text-align: center;
  }

  .container h2 {
      margin-top: 0;
      color: white;
      font-size: 2.5rem;
  }

  .wrapper {
      width: 300px;
      margin: 0 auto;
      color: #e6d522;
  }

  /* Button Styling */
  .btn {
      width: 80px;
      border: 2px solid #e6d522;
      color: white;
      background: transparent;
      padding: 5px;
      cursor: pointer;
      transition: 0.3s;
  }

  .btn:hover {
    background-color: #c6b300;
    transform: scale(1.05);
  }

  /* Table Styling */
  table {
      width: 100%;
      border: 1.5px solid yellow;
      border-radius: 10px;
      border-spacing: 0;
  }

  td {
      border: 1.5px solid yellow !important;
      padding: 10px;
      color: white;
  }

  /* Profile Image */
  .profile-img {
      border-radius: 50%;
      border: 3px solid yellow;
  }

  h4 {
      color: white;
      font-size: 2.2rem;
  }
  </style>
</head>
<body>

<!-- Background Image -->
<div id="displayImage">
  <img src="images/profile.webp" alt="Selected Image">
</div>

<!-- Profile Section -->
<div class="container">
  <form action="" method="post">
    <button class="btn" style="float: right; width:70px; font-family: 'Brush Script MT', cursive; font-size:20px;" name="submit1" type="submit">Edit</button>
    <div class="wrapper">
      
      <?php
      if(isset($_POST['submit1'])) {
        echo "<script type='text/javascript'> window.location='edit.php'; </script>";
      }

      // Fetch user details from the database
      $q = mysqli_query($db, "SELECT * FROM student WHERE username='$_SESSION[login_user]';");
      $row = mysqli_fetch_assoc($q);
      ?>

      <h2 style="font-size:35px;font-family: 'Brush Script MT', cursive;">My Profile</h2>

      <!-- Profile Picture -->
      <div style="text-align: center">
        <img class='profile-img' height=110 width=120 src='images/sprofile.png'>
      </div>

      <!-- Username -->
      <div style="text-align: center;">
        <h4 ><?php echo $_SESSION['login_user']; ?></h4>
      </div>
      <br>
      <!-- User Details Table -->
      <table>
        <tr>
          <td><b> First Name: </b></td>
          <td><?php echo $row['first']; ?></td>  
        </tr>
        <tr>
          <td><b> Last Name: </b></td>
          <td><?php echo $row['last']; ?></td>
        </tr>
        <tr>
          <td><b> User Name: </b></td>
          <td><?php echo $row['username']; ?></td>
        </tr>
        <tr>
          <td><b> Password: </b></td>
          <td><?php echo $row['password']; ?></td>
        </tr>
        <tr>
          <td><b>Roll No: </b></td>
          <td><?php echo $row['roll']; ?></td>
        </tr>
        <tr>
          <td><b> Email: </b></td>
          <td><?php echo $row['email']; ?></td>
        </tr>
        <tr>
          <td><b> Contact: </b></td>
          <td><?php echo $row['contact']; ?></td>
        </tr>
      </table>

    </div>
  </form>
</div>

</body>
</html>
