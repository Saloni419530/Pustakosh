<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/logo.jpeg">
    <title>पुस्तक𝖔𝖘𝖍</title>
    <link rel="icon" type="image/x-icon" href="harrypotter/Home/hogwarts harry potter.jpeg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 20px;
        }
        .harry-font {
        font-family: 'Harry Potter', sans-serif;
        font-size: 2rem;
        }        
        /* Navbar Styling */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2px 20px;
        }

        /* Logo Section */
        .navbar .logo img {
        height: 10rem;
        width: auto;
        border-radius: 50%;
        margin-left: 10px;
        }
        
        /* Centered Text */
        .navbar .typo {
            font-size: 3.3rem;
            color: #e6d522;
            flex-grow: 1;
            position: relative;
            top: -10px;
            margin-left: 10px;
        }
        
        /* Navigation Menu */
        .nav-container {
            display: flex;
            flex-grow: 1;
            justify-content: space-evenly;
            list-style: none;
            padding: 0;
            position: relative;
            top: -12px;
            margin-left: 500px;
        }
        
        .nav-container li {
            list-style: none;
            margin: 10 5px;
        }
        
        .nav-container a {
            color: #e6d522;
            text-decoration: none;
            font-size: 1.8rem;
            transition: color 0.3s ease;
        }
        
        .nav-container a:hover {
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar">
    <div class="logo" >
            <img src="images/logo.jpeg" alt="Logo">&nbsp;&nbsp;
        </div>
        <!-- Center Text -->
        <div class="typo" style="font-size: 35px; ">पुस्तक𝖔𝖘𝖍</div>
        
        <!-- Navigation Menu -->
        <ul class="nav-container">
        <li><a href="index.php" style="font-size: 30px; ">&#x22C4 𝕳𝖔𝖒𝖊</a></li>
            <li><a href="books.php" style="font-size: 30px; ">&#x22C4 𝕭𝖔𝖔𝖐𝖘</a></li>
            <li><a href="games.php" style="font-size: 30px; ">&#x22C4 𝕲𝖆𝖒𝖊𝖘</a></li>
            <?php if(isset($_SESSION['login_user'])) { ?>
                <li><a href="">Welcome <?php echo $_SESSION['login_user']; ?></a></li>
                <li><a href="logout.php" style="font-size: 30px; ">&#x22C4 𝕷𝖔𝖌𝖔𝖚𝖙</a></li>
            <?php } else { ?>
                <li><a href="login.php" style="font-size: 30px; ">&#x22C4 𝕷𝖔𝖌𝖎𝖓</a></li>
            <?php } ?>
        </ul>
    </nav>
</body>
</html>
