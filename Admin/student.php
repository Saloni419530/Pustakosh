
<?php
  include "connection.php";
  include "navbar4.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Information</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
		.srch
		{
			padding-left: 850px;
		}
		
		body {
  transition: background-color .5s;
  background-image: url('images/book.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
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
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
	box-shadow: 0px 0px 10px rgba(245, 241, 4, 0.94);
}
th,td
{
  width: 10%;

}
td,th {
      border: 1.5px solid #e6d522 !important;
      padding: 10px;
    color: white;
	text-align:center;
  }
  .container
{
  height: auto;
  background: rgba(0, 0, 0, 0.6);
  box-shadow: 0px 0px 10px rgba(245, 241, 4, 0.94);
  color: white;
  margin-top: 20px;
}
table tr:hover td {
    background-color:rgb(175, 171, 171) !important;
}

h2{
  color: #e6d522;
  margin-top: -15px;
  text-align: center;
}
	</style>

</head>
<body>
	<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <div style="color: white;; margin-left: 60px; font-size: 35px;">

<?php
if(isset($_SESSION['login_user']))

{   echo "<img class='img-circle profile_img' height=120 width=120 src='images/profile.png'>";
	echo "</br></br>";

	echo "Welcome ".$_SESSION['login_user']; 
}
?>
</div><br><br>
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
	<!--___________________search bar________________________-->
<div class="container">
	<div class="srch">
		<form class="navbar-form" method="post" name="form1" style="display: flex; justify-content: flex-end; align-items: center; margin-top:20px;">
			
				<input class="form-control" type="text" name="search" placeholder="Student Username.." required="" style="margin-right: 5px;">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>
	<h2 style="font-size:35px;font-family: 'Brush Script MT', cursive;">List Of Users</h2><br>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT first,last,username,roll,email,contact FROM `student` where username like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No Student found with that username. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "First Name";	echo "</th>";
				echo "<th>"; echo "Last Name";  echo "</th>";
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Roll";  echo "</th>";
				echo "<th>"; echo "Email";  echo "</th>";
				echo "<th>"; echo "Contact";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['first']; echo "</td>";
				echo "<td>"; echo $row['last']; echo "</td>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['roll']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['contact']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT first,last,username,roll,email,contact FROM `student`;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "First Name";	echo "</th>";
				echo "<th>"; echo "Last Name";  echo "</th>";
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Roll";  echo "</th>";
				echo "<th>"; echo "Email";  echo "</th>";
				echo "<th>"; echo "Contact";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				
				echo "<td>"; echo $row['first']; echo "</td>";
				echo "<td>"; echo $row['last']; echo "</td>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['roll']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['contact']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		}
	?>
</div>
</body>
</html>