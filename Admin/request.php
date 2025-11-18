<?php
  include "connection.php";
  include "navbar4.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style>

		.srch
		{
			padding-left: 850px;

		}
		.form-control
		{
			width: 300px;
			height: 40px;
			background-color: black;
			color: white;
			border: 2px solid #e6d522;
		}
		
		body {
  transition: background-color .5s;
  background-image: url('images/book.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
}

 /* Side navigation styles */
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
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
	box-shadow: 0px 0px 10px rgba(245, 241, 4, 0.94);
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}
.container
{
	
	margin-top: 30px;
      width: 1200px;
	  height:auto;
      background: rgba(0, 0, 0, 0.6);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(245, 241, 4, 0.94);
      text-align: center;
}
td,th {
      border: 1.5px solid #e6d522 !important;
      padding: 10px;
    color: white;
	text-align: center;
  }
  /* Gold Submit Button */
  button[name="submit"] {
    background-color: transparent;
    color: #e6d522;
    font-size: 1.4rem;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    transition: 0.3s ease-in-out;
    border: 2px solid #e6d522;
	margin-right:200px;
  }

  button[name="submit"]:hover {
    background-color: #c6b300;
      transform: scale(1.05);
  }

  h1{
	margin-top: -120px;
  }
  table tr:hover td {
    background-color:rgb(175, 171, 171) !important;
}
h2 {
	color:white;
}

	</style>

</head>
<body>
<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 35px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/profile.png'>";
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
	<br>

<div class="container">
	<div class="srch">
		<br>
		<form method="post" action="" name="form1">
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
			<button class="btn btn-default" name="submit" type="submit">Submit</button><br>
		</form>
	</div>

	<h1 style="margin-left:-250px;text-align: center; padding-left: 60px;color: #e6d522;font-family: 'Brush Script MT', cursive; font-size:40px;">Request of Book</h1><br><br><br><br><br><br>

	<?php
	
	if(isset($_SESSION['login_user']))
	{
		$sql= "SELECT student.username,roll,books.bid,name,authors,edition,books.status FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='' ";
		$res= mysqli_query($db,$sql);

		if(mysqli_num_rows($res)==0)
			{
				echo "<h2><b>";
				echo "There's no pending request.";
				echo "</h2></b>";
			}
		else
		{
			echo "<table class='table table-bordered' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Roll No";  echo "</th>";
				echo "<th>"; echo "BID";  echo "</th>";
				echo "<th>"; echo "Book Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['roll']; echo "</td>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				
				
				echo "</tr>";
			}
		echo "</table>";
		}
	}
	else
	{
		?>
		<br>
			<h4 style="text-align: center;color: yellow;">You need to login to see the request.</h4>
			
		<?php
	}

	if(isset($_POST['submit']))
	{
		$_SESSION['name']=$_POST['username'];
		$_SESSION['bid']=$_POST['bid'];

		?>
			<script type="text/javascript">
				window.location="approve.php"
			</script>
		<?php
	}

	?>
	</div>
</div>
</body>
</html>