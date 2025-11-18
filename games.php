<?php
  include "connection.php";
  include "navbar1.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>पुस्तक𝖔𝖘𝖍</title>
  <link rel="icon" type="image/x-icon" href="images/logo.jpeg">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: black;
      color: #e6d522;
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

    .game-section {
      display: flex;
      flex-direction: column;
      align-items: center;
    justify-content: center;
      
    }

    .game-container {
      z-index: 2;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-gap: 40px;
      max-width: 1200px;
      margin-top: 80px;
    }

    .game {
      background-color: rgba(0, 0, 0, 0.6);
      padding: 15px;
      border-radius: 10px;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      text-decoration: none;
      box-shadow: 0px 0px 20px 5px rgba(212,175,55,0.7);
    }

    .game img {
      width: 100%;
      max-width: 150px;
      height: 200px;
      object-fit: cover;
      border-radius: 5px;
      margin-bottom: 8px;
      opacity: 1;
    }

    .game-title {
      font-size: 1rem;
      color: #e6d522;
    }

    .game:hover {
      transform: translateY(-5px);
    }
    .explore-collection-overlay {
      position: absolute;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 2;
    }

    .explore-collection-text {
      font-size: 3rem;
      font-weight: bold;
      color: #e6d522;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
      font-family: 'Arial', sans-serif;
      text-align: center;
    }

    .game-container {
      z-index: 2;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-gap: 20px;
      max-width: 1000px;
      margin-top: 70px;
    }

    .game {
      background-color: rgba(0, 0, 0, 0.6);
      padding: 15px;
      border-radius: 10px;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      text-decoration: none;
      box-shadow: 0px 0px 20px 5px rgba(212,175,55,0.7);
    }

    .game img {
      width: 100%;
      max-width: 150px;
      height: 200px;
      object-fit: cover;
      border-radius: 5px;
      margin-bottom: 8px;
      opacity: 1;
    }

    .game-title {
      font-size: 2rem;
      color: #e6d522;
    }

    .game:hover {
      transform: translateY(-5px);
    }
  </style>
</head>
<body>

<div id="displayImage">
<img src="images/games.webp" alt="Selected Image">
  </div>
  <h1 style="font-size: 50px; text-align: center; padding-top: 5px;">𝕲𝖆𝖒𝖊𝖘</h1>
<section class="game-section">
    <div class="game-container">
    <a href="tic_tac.html" class="game" target="_blank"><img src="images/game1.webp"><div class="game-title">𝓣𝓲𝓬-𝓣𝓪𝓬-𝓣𝓸𝓮</div></a>
    <a href="rock_paper.html" class="game" target="_blank"><img src="images/game2.webp"><div class="game-title">𝓡𝓸𝓬𝓴-𝓟𝓪𝓹𝓮𝓻-𝓢𝓬𝓲𝓼𝓼𝓸𝓻𝓼</div></a>
    <a href="bubble.html" class="game" target="_blank"><img src="images/game3.webp"><div class="game-title">𝓑𝓾𝓫𝓫𝓵𝓮 𝓟𝓸𝓹</div></a>
    <a href="space.html" class="game" target="_blank"><img src="images/game4.png"><div class="game-title">𝓢𝓹𝓪𝓬𝓮 𝓘𝓷𝓿𝓪𝓭𝓮𝓻𝓼</div></a> 
  </div>   
  </div>
</section>
</body>
</html>