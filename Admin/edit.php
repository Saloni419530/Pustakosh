<?php
  include "connection.php";
  include "navbar4.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
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
    body {
        font-family: Arial, sans-serif;
    }
    .container {
        width: 35%;
        margin: 30px auto;
        background-color: rgba(0, 0, 0, 0.7); /* Only background is transparent */
        padding: 30px;
        border-radius: 10px;
        color: #e6d522; /* Text remains fully visible */
        box-shadow: 0px 0px 10px rgba(255, 215, 0, 1);
        text-align: center;
    }
    .form-group {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 80%;
        margin: 10px auto;
    }
    .form-group label {
        font-size: 16px;
        color: #e6d522;
        font-weight: bold;
        width: 30%;
        text-align: left;
    }
    .form-group .form-control {
        width: 65%;
        height: 38px;
        padding: 5px;
        border-radius: 5px;
        border: none;
        border: 3px solid #e6d522;
        box-shadow: 0px 0px 4px rgba(245, 241, 4, 0.94);
        background-color: rgba(255, 255, 255, 0.9); /* Light background to keep input fields readable */
        color: black;
    }
    .btn {
        background-color: transparent;
        color: white;
        padding: 8px 20px;
        border: 2px solid #e6d522; /* Yellow border */
        cursor: pointer;
        border-radius: 5px;
        margin-top: 10px;
        transition: 0.3s;
    }
    .btn:hover {
        background-color: #c6b300;
    	transform: scale(1.05);
    }
    h2 {
        margin-top: -10px;
    }
    .profile_info {
        font-size: 25px;
    }
    </style>
</head>
<body>
	<div id="displayImage">
    <img src="images/profile.webp" alt="Selected Image">
  </div>

	<div class="container">
		<h2 style="text-align: center; color: #e6d522;font-size:35px;font-family: 'Brush Script MT', cursive;">Edit Information</h2>
	<?php
		
		$sql = "SELECT * FROM admin WHERE username='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$first=$row['first'];
			$last=$row['last'];
			$username=$row['username'];
			$password=$row['password'];
			$email=$row['email'];
			$contact=$row['contact'];
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<p><strong>Welcome, <?php echo $_SESSION['login_user']; ?></strong></p><br>
	</div>

	<form action="" method="post" enctype="multipart/form-data" class="form-container" onsubmit="return validateForm()">
    <div class="form-group">
        <label>First Name:</label>
        <input class="form-control" type="text" name="first" id="first" value="<?php echo $first; ?>" required 
            pattern="([A-Za-z]+\.*\s?)*" title="Only letters, min 2 characters">
    </div>
    <div class="form-group">
        <label>Last Name:</label>
        <input class="form-control" type="text" name="last" id="last" value="<?php echo $last; ?>" required 
            pattern="[A-Za-z]{2,}" title="Only letters, min 2 characters">
    </div>
    <div class="form-group">
        <label>Username:</label>
        <input class="form-control" type="text" name="username" id="username" value="<?php echo $username; ?>" required 
            pattern="[A-Za-z0-9]{2,}" title="Alphanumeric, min 2 characters">
    </div>
    <div class="form-group">
        <label>Password:</label>
        <input class="form-control" type="password" name="password" id="password" value="<?php echo $password; ?>" required 
            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" 
            title="At least 8 characters, including 1 uppercase, 1 lowercase, 1 number, and 1 special character.">
    </div>
    <div class="form-group">
        <label>Email:</label>
        <input class="form-control" type="email" name="email" id="email" value="<?php echo $email; ?>" required>
    </div>
    <div class="form-group">
        <label>Contact No:</label>
        <input class="form-control" type="text" name="contact" id="contact" value="<?php echo $contact; ?>" required 
            pattern="[0-9]{10}" title="Exactly 10 digits">
    </div>
    <button style="font-size:20px;font-family: 'Brush Script MT', cursive;" class="btn" type="submit" name="submit">Save</button>
</form>

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
			move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

			$first=$_POST['first'];
			$last=$_POST['last'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$contact=$_POST['contact'];
			$pic=$_FILES['file']['name'];

			$sql1= "UPDATE admin SET pic='$pic', first='$first', last='$last', username='$username', password='$password', email='$email', contact='$contact' WHERE username='".$_SESSION['login_user']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="profile.php";
					</script>
				<?php
			}
		}
 	?>
	</div>
</body>
</html>
