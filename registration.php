<?php   
include "navbar1.php";   
include "connection.php"; 
?>  
<!DOCTYPE html> 
<html> 
<head>     
    <title>Student Registration</title>     
    <meta charset="utf-8">     
    <meta name="viewport" content="width=device-width, initial-scale=1">       
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>      

    <style>      
        body {                
            height: 100vh;         
            width: 100vw;         
            margin: 0;     
        }      

        section {         
            width: 80%;
            height: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
        }      

        .box {         
            height: 240px;         
            width: 450px;         
            background: rgba(20, 20, 20, 0.9); /* Dark mystical background */         
            color: #d4af37;                  
            box-shadow: 0px 0px 20px 5px rgba(212, 175, 55, 0.7);         
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            margin-left: 330px;
            margin-top: -80px;
            font-family: 'UnifrakturMaguntia', cursive;
        }   
        
        #displayImage img {
      position: fixed;
      top: 0;
      left: 0;
      z-index: -1;
      width: 100%; /* Adjust to occupy 90% of the parent width */
      height: 105%; /* Maintain the aspect ratio */
      filter: brightness(75%); 
    }

        label {         
            font-weight: 400;         
            font-size: 20px;         
            color: #d4af37;         
            text-shadow: 2px 2px 5px rgba(212, 175, 55, 0.7);               
            margin-bottom: 15px;     
        }      

        .btn-default {         
            background-color: #8b0000; /* Gryffindor red */         
            color: white;         
            font-weight: 700;         
            width: 90px;         
            height: 35px;         
            border-radius: 5px;         
            border: 2px solid #d4af37;         
            transition: 0.3s;              
        }      

        .btn-default:hover {         
          
      background: #e6d522;;
      color: black;  
        }

        /* Centering radio buttons */
        .radio-group {
            display: flex;
            justify-content: center;
            gap: 15px;
            align-items: center;
        }

        .radio-group input {
            width: 18px;
        }
    </style> 
</head> 
<body>  
    <div id="displayImage">
        <img src="images/common_reg.jpg" alt="Selected Image">
    </div>
    <section>     
        <div class="box">         
            <form name="signup" action="" method="post">             
                <b><p style="font-size: 20px; font-weight: 700;">𝕾𝖎𝖌𝖓 𝖀𝖕 𝖆𝖘:</p></b>          
                <input type="radio" name="user" id="admin" value="admin">
                <label for="admin" style="color: #e6d522;">Admin</label>
                <input style="margin-left: 50px; width: 18px;"type="radio" name="user" id="student" value="student" checked="">
                <label for="student" style="color: #e6d522;">User</label>
                <br>
                <button class="btn-default" type="submit" name="submit1">OK</button>         
            </form>     
        </div>      
        
        <?php     
        if (isset($_POST['submit1'])) {         
            if ($_POST['user'] == 'admin') {             
                echo "<script type='text/javascript'>window.location='Admin/registration.php';</script>";         
            } else {             
                echo "<script type='text/javascript'>window.location='Student/registration.php';</script>";         
            }     
        }     
        ?> 
    </section>  

</body> 
</html>
