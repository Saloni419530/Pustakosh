<?php
  include "connection.php";
  include "navbar4.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Message</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
    #displayImage img {   
        position: fixed;   
        top: 0;   
        left: 0;   
        z-index: -1;   
        width: 100%;   
        height: 100%;   
    } 
    #displayVideo {     
        display: flex;     
        justify-content: center;     
        align-items: center;     
        position: fixed;     
        width: 100%;     
        height: 100%;     
        top: 0;     
        left: 0; 
    } 

    #displayVideo video {     
        width: 60%;     
        height: 60%;     
        object-fit: cover;     
        border-radius: 50%; 
    } 
  .left_box
  {
    height: 600px;
    width: 300px;
    float: left;
    margin-top: -20px;
    margin-left:330px;
  }
  .left_box2
  {
    height: 600px;
    width: 300px;
    border-radius: 20px;
    float: right;
    margin-right: 30px;
    backdrop-filter: blur(5px); /* Glass effect */  
    background-color: rgba(0, 0, 0, 0.2);
    border: 3px solid #e6d522; 
  }
  .left_box input
  {
    width: 150px;
    height: 50px;
    padding: 10px;
    margin: 10px;
    border-radius: 10px;  
    backdrop-filter: blur(5px); /* Glass effect */  
    background-color: rgba(0, 0, 0, 0.2);
  }
  .list
  {
    height: 600px;
    width: 300px;
    float: right;
    color: white;
    padding: 10px;
    overflow-y: hidden;
    overflow-x: hidden;
    backdrop-filter: blur(5px); /* Glass effect */  
  }
  .right_box
  {
    height: 600px;
    width: 970px;
    margin-left: 600px;
    margin-top: -20px;
    padding: 10px;
  }
  .right_box2
  {
    height: 600px;
    width: 660px;
    margin-top: -20px;
    padding: 20px;
    border-radius: 20px;
    background-color: #537890;
    float: left;
    color:white;
    backdrop-filter: blur(5px); /* Glass effect */  
    background-color: rgba(0, 0, 0, 0.2);
    border: 3px solid #e6d522; 
  }
  tr:hover
  {
    background-color: #1e3f54;
    cursor: pointer;
  }
  .form-control
{
  height: 47px;
  width: 78%;
}
.msg
{
  height: 450px;
  overflow-y: scroll;
}
.btn-info
{
    border: none; 	
    color: white;
    border-radius: 5px; 	
        cursor: pointer;   
        border-color: orange; /* Change border color on focus */   
        box-shadow: 0 0 8px rgba(255, 215, 0, 0.8);
        postion:fixed;
}
.chat
{
  display: flex;
  flex-flow:row wrap;
}
.user .chatbox
{
  height: 50px;
  width: 500px;
  padding: 13px 10px;
  background-color: #821b69;
  color: white;
  border-radius: 10px;
}
.admin .chatbox
{
  height: 50px;
  width: 500px;
  padding: 13px 10px;
  background-color: #423471;
  color: white;
  border-radius: 10px;
  order: -1;
}
</style>

<body>
<?php
  $sql1=mysqli_query($db,"SELECT student.pic,message.username FROM student INNER JOIN message ON student.username=message.username group by username ORDER BY message.status ;");
?>
<div id="displayImage">     
            <img src="images/message_darker.webp" alt="Selected Image">   
        </div>

<!-----------------------Left box-------------------->
<div class="left_box">
  <div class="left_box2">
    <div style="color: #fff;">
      <form method="post" enctype="multipart/form-data">
        <input type="text" name="username" id="uname">
        <button type="submit" name="submit" class="btn btn-default">SHOW</button>
      </form>
    </div>
    <div class="list">
      <?php
        echo "<table id='table' class='table' >";
        while ($res1=mysqli_fetch_assoc($sql1)) 
        {
          echo "<tr>";
            echo "<td width=65>"; echo "<img class='img-circle profile_img' height=60 width=60 src='images/sprofile.png'>";  echo "</td>";

            echo "<td style='padding-top:30px;'>"; echo $res1['username']; echo "</td>";

          echo "</tr>";
        }
        echo "</table>";
      ?>
    </div>
  </div>
</div>

<!-----------------------Right box-------------------->
<div class="right_box">
  <div class="right_box2">
    <?php
    /*--------------if submit is pressed-----------*/
      if(isset($_POST['submit']))
      {
        $res=mysqli_query($db,"SELECT * from message where username='$_POST[username]' ;");
        mysqli_query($db,"UPDATE message SET status='yes' where sender='student' and username='$_POST[username]' ;");

        if($_POST['username'] != ''){$_SESSION['username']=$_POST['username'];}

      ?>
        <div style="height: 70px; width: 100%; text-align: center; color: white; ">
          <h3 style="margin-top: -5px; padding-top: 10px;"> <?php echo $_SESSION['username'] ?> </h3>
        </div>
  <!---------show message----------->
            <div class="msg">
            <?php
              while ($row=mysqli_fetch_assoc($res))
              {
                if($row['sender']=='student')
                {
            ?>
              <!-------student---------------->
              <br><div class="chat user">
                <div style="float: left; padding-top: 5px;">
                  &nbsp
                  <img style="height: 40px; width: 40px; border-radius: 50%;" src="images/sprofile.png  ">
                  &nbsp
                </div>
                <div style="float: left;" class="chatbox">
                  <?php
                    echo $row['message'];
                  ?>
                </div>
              </div>

          <?php
            }
            else
            {
          ?>
              <!-------admin---------------->

              <br><div class="chat admin">
                <div style="float: left; padding-top: 5px;">
                  &nbsp
                  <?php
                  echo "<img class='img-circle profile_img' height=40 width=40 src='images/profile.png'>";
                  ?>
                  
                  &nbsp
                </div>
                <div style="float: left;" class="chatbox">
                  <?php
                    echo $row['message'];
                  ?>
                </div>
              </div>

              <?php
            }
            }
              ?>
            </div>
        
          <div style="height: 50px; padding-top: 10px;" >
          <form action="" method="post">
            <input type="text" name="message" class="form-control" required="" placeholder="Write Message..." style="float: left"> &nbsp&nbsp
            <button class="btn btn-info btn-lg" type="submit" name="submit1"><span class="glyphicon glyphicon-send "></span>&nbsp Send</button>
          </form>
          </div>
      <?php
      }
     /*--------------if submit is not pressed-----------*/
     else
     {
      if($_SESSION['username']=='')
      {
        ?>
          <div id="displayVideo">           
            <video id="myVideo" width="600" height="500" autoplay loop playsinline>         
                <source src="images/message.mp4" type="video/mp4">Your browser does not support the video tag.</video> 
            </div>        
        </div> 
        <?php
      }
      else
      {
        if(isset($_POST['submit1']))
        {
          mysqli_query($db,"INSERT into `library1`.`message` VALUES ('', '$_SESSION[username]','$_POST[message]','no','admin');");

          $res=mysqli_query($db,"SELECT * from message where username='$_SESSION[username]' ;");
        }
        else
        {
          $res=mysqli_query($db,"SELECT * from message where username='$_SESSION[username]' ;");
        }
        ?>
        <div style="height: 70px; width: 100%; text-align: center; color: white; ">
          <h3 style="margin-top: -5px; padding-top: 10px;"> <?php echo $_SESSION['username'] ?> </h3>
        </div>
            <div class="msg">
            <?php
              while ($row=mysqli_fetch_assoc($res))
              {
                if($row['sender']=='student')
                {
            ?>
              <!-------student---------------->
              <br><div class="chat user">
                <div style="float: left; padding-top: 5px;">
                  &nbsp
                  <img style="height: 40px; width: 40px; border-radius: 50%;" src="images/p.jpg">&nbsp
                </div>
                <div style="float: left;" class="chatbox">
                  <?php
                    echo $row['message'];
                  ?>
                </div>
              </div>

          <?php
            }
            else
            {
          ?>
              <!-------admin---------------->

              <br><div class="chat admin">
                <div style="float: left; padding-top: 5px;">
                  &nbsp
                  <?php
                  echo "<img class='img-circle profile_img' height=40 width=40 src='images/".$_SESSION['pic']."'>";
                  ?>
                  
                  &nbsp
                </div>
                <div style="float: left;" class="chatbox">
                  <?php
                    echo $row['message'];
                  ?>
                </div>
              </div>

              <?php
            }
            }
              ?>
            </div>
          <div style="height: 50px; padding-top: 10px;" >
          <form action="" method="post">
            <input type="text" name="message" class="form-control" required="" placeholder="Write Message..." style="float: left"> &nbsp&nbsp
            <button class="btn btn-info btn-lg" type="submit" name="submit1"><span class="glyphicon glyphicon-send "></span>&nbsp Send</button>
          </form>
          </div>

        <?php

      }
     }
    ?>
  </div>
</div>

<script>
  var table = document.getElementById('table'),eIndex;
  for(var i=0; i< table.rows.length; i++)
  {
    table.rows[i].onclick =function()
    {
      rIndex = this.rowIndex;
      document.getElementById("uname").value = this.cells[1].innerHTML;
    }
  }
</script>
</body>
</html>