<?php
  include "connection.php";
  include "navbar4.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style>
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
      padding: 35px;
      border-radius: 15px;
      width: 30%; 
      margin: 35px auto;
      text-align: center;
      height: 550px;
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
      border: 1.5px solid #e6d52;
      border-radius: 10px;
      border-spacing: 0;
  }

  td {
      border: 1.5px solid #e6d522 !important;
      padding: 10px;
	  color: white;
  }

  /* Profile Image */
  .profile-img {
      border-radius: 50%;
      border: 3px solid #e6d522;
  }

  h4 {
      color: white;
      font-size: 2.2rem;
  }
	</style>
</head>
<body>
<div id="displayImage">
<img src="images/profile.webp" alt="Selected Image">
  </div>
	<div class="container">
		<form action="" method="post">
			<button class="btn" style="float: right; width:70px; font-family: 'Brush Script MT', cursive; font-size:20px;" name="submit1" type="submit">Edit</button>
			<div class="wrapper">
				<?php

				if(isset($_POST['submit1']))
				{
					?>
					<script type="text/javascript">
						window.location="edit.php"
					</script>
					<?php
				}
					$q=mysqli_query($db,"SELECT * FROM admin where username='$_SESSION[login_user]' ;");
				

				?>
				<h2 style="font-size:35px;font-family: 'Brush Script MT', cursive;">My Profile</h2>
				<?php
					$row=mysqli_fetch_assoc($q);
					echo "<div style='text-align: center'>
						<img class='img-circle profile-img' height=110 width=120 src='images/profile.png'>
					</div>";
				?>
				<div style="text-align: center;">
					<h4>
						<?php echo $_SESSION['login_user'];
					?>
					</h4>
				</div>
				<br>
				<?php
					echo "<b>";
					echo "<table class='table table-bordered'>"; 
						echo "<tr>";
							echo "<td>";
								echo "<b> First Name: </b>";
							echo "</td>";

							echo "<td>"; 
								echo $row['first'];
							echo "</td>";	 
						echo "</tr>";

						echo "<tr>";
							echo "<td>"; 
								echo "<b> Last Name: </b>";
							echo "</td>";

							echo "<td>"; 
								echo $row['last'];
							echo "</td>";
						echo "</tr>";

						echo "<tr>";
							echo "<td>";
								echo "<b> User Name: </b>"; 
							echo "</td>";

							echo "<td>";
								echo $row['username']; 
							echo "</td>"; 
						echo "</tr>";
 						
 						echo "<tr>"; 
 							echo "<td>";
 								echo "<b> Password: </b>"; 
							echo "</td>";

							echo "<td>"; 
								echo $row['password'];
							echo "</td>";
						echo "</tr>";

						echo "<tr>"; 
							echo "<td>"; 
								echo "<b> Email: </b>";
							echo "</td>";

							echo "<td>"; 
								echo $row['email'];
							echo "</td>";
						echo "</tr>";

						echo "<tr>"; 
							echo "<td>";
								echo "<b> Contact: </b>"; 
							echo "</td>";

							echo "<td>"; 
								echo $row['contact'];
							echo "</td>";
						echo "</tr>";

					echo "</table>"; 
					echo "</b>";
				?>
			</div>
	</div>

</body>
</html>