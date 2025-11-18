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
* {
        font-size: 20px;
    }
    body {
      font-family: 'Harry Potter', sans-serif;
  transition: background-color .5s;
  background-image: url('images/book.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
}
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
  height: auto;
  background: rgba(0, 0, 0, 0.6);
  box-shadow: 0px 0px 10px rgba(245, 241, 4, 0.94);
  color: white;
  margin-top: 20px;
}
.scroll
{
  width: 100%;
  overflow: auto;
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
.btn, .btn-default {
  width: 100px;
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
  
  h3{
    color: #e6d522;
  }
  table tr:hover td {
    background-color:rgb(175, 171, 171) !important;
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
    <h3 style="font-size:35px;font-family: 'Brush Script MT', cursive;text-align: center;">Information of Borrowed Books</h3><br>
    <?php
    $c=0;
    if(isset($_SESSION['login_user']))
    {
        $sql="SELECT student.username,roll,books.bid,name,authors,edition,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='Yes' ORDER BY `issue_book`.`return` ASC";
        $res=mysqli_query($db,$sql);
        
        
       

       echo "<div class='scroll'>";
        echo "<table class='table table-bordered' >";
        echo "<tr style='background-color: #6db6b9e6;'>";
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "Roll No";  echo "</th>";
        echo "<th>"; echo "BID";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";
      while($row=mysqli_fetch_assoc($res))
      {
        $d=date("Y-m-d");
        if($d > $row['return'])
        {
          $c=$c+1;
          $var='<p style="color:yellow; background-color:red;">EXPIRED</p>';

          mysqli_query($db,"UPDATE issue_book SET approve='$var' where `return`='$row[return]' and approve='Yes' limit $c;");
          
          echo $d."</br>";
        }
        
      echo "</tr>"; 
        echo "<tr>";
          echo "<td>"; echo $row['username']; echo "</td>";
          echo "<td>"; echo $row['roll']; echo "</td>";
          echo "<td>"; echo $row['bid']; echo "</td>";
          echo "<td>"; echo $row['name']; echo "</td>";
          echo "<td>"; echo $row['authors']; echo "</td>";
          echo "<td>"; echo $row['edition']; echo "</td>";
          echo "<td>"; echo $row['issue']; echo "</td>";
          echo "<td>"; echo $row['return']; echo "</td>";
        echo "</tr>";
      }
    echo "</table>";
        echo "</div>";
    }
        else
        {
          ?>
          <h3 style="text-align: center;">Login to see Informantion of Borrowed Books</h3>
          <?php
        }
    ?>
  </div>
</div>
</body>
</html>