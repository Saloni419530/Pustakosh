<?php
	include "connection.php";
	include "navbar4.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Message</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#displayImage img {
	position: fixed;
	top: 0;
	left: 0;
	z-index: -1;
	width: 100%;
	height: 100%;
}
.wrapper {
	height: 584px;
	width: 500px;
	background-color: rgba(0, 0, 0, 0.2); /* Transparent White */
	color: black;
	border: 3px solid #e6d522;
	margin: -25px auto;
	padding: 10px;
	border-radius: 10px;
	box-shadow: 0px 0px 20px 5px rgba(212,175,55,0.7); /* Golden Glow */
	backdrop-filter: blur(10px); /* Glass Effect */
}
.form-control {
	height: 47px;
	width: 76%;
	border: 1px solid #FFC107; /* Golden Border */
	background-color: rgba(255, 255, 255, 0.3); /* Transparent */
	color: black;
	padding: 5px 10px;
	font-size: 16px;
	backdrop-filter: blur(5px);
}
.msg {
	height: 450px;
	overflow-y: scroll;
}
.btn-info {
	background-color: #FFD700; /* Golden */
	border: none;
	color: black;
	font-size: 16px;
	padding: 8px 15px;
	border-radius: 5px;
	cursor: pointer;
}
.btn-info:hover {
	background-color: #E6C200;
}
.chat {
	display: flex;
	flex-flow: row wrap;
	align-items: center;
}
.user {
	justify-content: flex-end; /* Moves user message to the right */
}
.user .chatbox {
	height: auto;
	max-width: 400px;
	padding: 13px 15px;
	background-color: rgba(255, 213, 79, 0.7); /* Semi-transparent Golden */
	color: black;
	border-radius: 15px;
	box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
	backdrop-filter: blur(5px);
}
.admin .chatbox {
	height: auto;
	max-width: 400px;
	padding: 13px 15px;
	background-color: rgba(129, 212, 250, 0.7); /* Semi-transparent Blue */
	color: black;
	border-radius: 15px;
	box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
	backdrop-filter: blur(5px);
}
</style>
</head>
<body>
	<div id="displayImage">
		<img src="images/message_darker.webp" alt="Selected Image">
	</div>
<?php
	if(isset($_POST['submit'])) {
		mysqli_query($db,"INSERT into `library1`.`message` VALUES ('', '$_SESSION[login_user]','$_POST[message]','no','student');");
	}
	$res = mysqli_query($db,"SELECT * from message where username='$_SESSION[login_user]' ;");
	mysqli_query($db,"UPDATE message set status='yes' where sender='admin' and username='$_SESSION[login_user]' ;");
?>

<div class="wrapper">
	<div style="height: 60px; width: 100%; background-color: rgba(248, 242, 242, 0.2); text-align: center; color:white;">
		<h1 style="margin-top: -5px; padding-top: 10px;">पुस्तक𝖔𝖘𝖍</h1>
	</div>
	<div class="msg">
	<?php
	  while ($row = mysqli_fetch_assoc($res)) {
			if ($row['sender'] == 'student') {
	?>
		<!---student-->
		<br>
		<div class="chat user">
			<div style="float: right;" class="chatbox">
				<?php echo $row['message']; ?>
			</div>
			<div style="float: right; padding-top: 5px;">
				&nbsp;
				<?php echo "<img class='img-circle profile_img' height=40 width=40 src='images/sprofile.png'>"; ?>
				&nbsp;
			</div>
		</div>

<?php
	} else {
?>
		<!---admin-->
		<br>
		<div class="chat admin">
			<div style="float: left; padding-top: 5px;">
				&nbsp;
				<img style="height: 40px; width: 40px; border-radius: 50%;" src="images/profile.png">
				&nbsp;
			</div>
			<div style="float: left;" class="chatbox">
				<?php echo $row['message']; ?>
			</div>
		</div>

		<?php
		}
	}
		?>
	</div>

	<div style="height: 100px; padding-top: 10px;">
		<form action="" method="post">
			<input type="text" name="message" class="form-control" required="" placeholder="Write Message..." style="float: left"> &nbsp;
			<button class="btn btn-info btn-lg" type="submit" name="submit">
				<span class="glyphicon glyphicon-send"></span>&nbsp;Send
			</button>
		</form>
	</div>
</div>

</body>
</html>
