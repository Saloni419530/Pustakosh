<?php
  include "navbar4.php";
  include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        #displayImage img {
      position: fixed;
      top: 0;
      left: 0;
      z-index: -1;
      width: 100%; /* Adjust to occupy 90% of the parent width */
      height: 105%; /* Maintain the aspect ratio */
      filter: brightness(75%); 
    }

        .wrapper {
            margin-top: 80px;
            margin-left: auto;
            margin-right: auto;
            width: 900px;
            background: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 5px rgba(212, 175, 55, 0.7);
            text-align: center;
            height: 300px;
            background-color: black;
            opacity: .7;
            color: gold;
            font-family: 'UnifrakturMaguntia', cursive;
            height:auto;
        }
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-control {
            color: gold;
            border: 2px solid gold;
            background-color: black;
            height: 70px;
            width: 60%;
            font-family: 'UnifrakturMaguntia', cursive;
            text-align: center;
        }
        .scroll {
            width: 100%;
            height: 300px;
            overflow: auto;
        }
        .table {
            border: 2px solid gold;
            background-color: black;
            color: gold;
            font-family: 'UnifrakturMaguntia', cursive;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid gold !important;
            color: gold;
            padding: 10px;
            text-align: justify;
        }
        .table-hover tbody tr:hover {
            background-color: rgba(255, 215, 0, 0.2);
        }
        h4, input[type="submit"] {
            font-family: 'UnifrakturMaguntia', cursive;
        }
        #btn {
    background-color: transparent;
    color: #e6d522;
    font-size: 1.4rem;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    transition: 0.3s ease-in-out;
    border: 2px solid #e6d522;
    }
    #btn:hover {
      background: #e6d522;
      color: black;
    }
    </style>
</head>
<body>
<div id="displayImage">
<img src="images/feedback.jpg" alt="Selected Image">
  </div>
    <div class="wrapper">
        <h4 style="font-size: 40px;font-family: Brush Script MT, cursive;">User Feedback</h4><br>

        
   
        <br><br>
        <div class="scroll">
        <?php
            if(isset($_POST['submit']))
            {
                $sql="INSERT INTO `comments` VALUES('', 'Admin' , '$_POST[comment]');";
                if(mysqli_query($db,$sql))
                {
                    $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
                    $res=mysqli_query($db,$q);

                    echo "<table class='table table-bordered'>";
                    while ($row=mysqli_fetch_assoc($res))
                    {
                        echo "<tr>";
                            echo "<td>"; echo $row['username']; echo "</td>";
                            echo "<td>"; echo $row['comment']; echo "</td>";
                        echo "</tr>";
                    }
                }

            }

            else
            {
                $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
                    $res=mysqli_query($db,$q);

                    echo "<table class='table table-bordered'>";
                    while ($row= mysqli_fetch_assoc($res))
                    {
                        echo "<tr>";
                            echo "<td>"; echo $row['username']; echo "</td>";
                            echo "<td>"; echo $row['comment']; echo "</td>";
                        echo "</tr>";
                    }
            }
        ?>
    </div>
    </div>
</body>
</html>