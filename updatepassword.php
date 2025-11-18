<?php
  include "connection.php";
  include "navbar1.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <style>
        body {
           font-family: 'Harry Potter', sans-serif;
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
        .wrapper {
            width: 450px;
            height: 400px;
            margin: 80px auto;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            box-shadow: 0px 0px 20px 5px rgba(212, 175, 55, 0.7);
            padding: 27px 15px;
            opacity: .9;
        }
        h1 {
            text-align: center;
			margin-top: -10px;
            font-size: 30px;
            color: #e6d522;
        }
		h3 {
            text-align: center;
            color: white;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 2px solid #e6d522;
            background: transparent;
            font-size: 18px;
            color:#e6d522;
        }
        .btn {
            width: 80px;
            padding: 10px;
            border: 2px solid #e6d522;
            border-radius: 5px;
            background: transparent;
            color: #e6d522;
            font-size: 1.4rem;
            display: block;      
            margin: 0 auto;     
        }
        .form-control::placeholder {
            color: #e6d522;
        }
        .btn-default {
            background-color: #e6d522;
            border: none;
            font-size: 0.9rem;
            cursor: pointer;  
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #e6d522;
            color: #e6d522;
            color:black;
        }
    </style>
</head>
<body>
	<div id="displayImage">
    <img src="images/update_pass.jpg" alt="Selected Image">
  </div>
  <div class="wrapper">
    <h1> पुस्तक𝖔𝖘𝖍 </h1>
    <h3>𝕮𝖍𝖆𝖓𝖌𝖊 𝖄𝖔𝖚𝖗 𝕻𝖆𝖘𝖘𝖜𝖔𝖗𝖉</h3>&nbsp;
    <form action="" method="post" onsubmit="return validateForm()">
        <input type="text" name="username" class="form-control" placeholder="𝖀𝖘𝖊𝖗𝖓𝖆𝖒𝖊" required 
            pattern="[A-Za-z0-9]{2,}" title="Alphanumeric, min 2 characters"><br>
        <input type="email" name="email" class="form-control" placeholder="𝕰𝖒𝖆𝖎𝖑" id="email" required><br>
        <input type="password" name="password" class="form-control" placeholder="𝕹𝖊𝖜 𝕻𝖆𝖘𝖘𝖜𝖔𝖗𝖉" required 
            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" 
            title="At least 8 characters, including 1 uppercase, 1 lowercase, 1 number, and 1 special character."><br>
        <button class="btn" type="submit" name="submit"> 𝖀𝖕𝖉𝖆𝖙𝖊 </button>
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
        if(isset($_POST['submit'])) {
            if(mysqli_query($db,"UPDATE student SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]';")) {
                echo "<script>alert('Password Updated Successfully! ');</script>";
            }
        }
    ?>
</body>
</html>
