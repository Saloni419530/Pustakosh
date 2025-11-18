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

    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 2px 20px;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 2;
      background: transparent;
    }

    .navbar .logo img {
      height: 8rem;
      border-radius: 50%;
    }

    .navbar .typo {
      font-size: 3.5rem;
      color: #e6d522;
    }

    .navbar .nav-options {
      display: flex;
      list-style: none;
    }

    .navbar .nav-options li {
      margin: 0 15px;
    }

    .navbar .nav-options a {
      color: #e6d522;
      text-decoration: none;
      font-size: 1.8rem;
      transition: color 0.3s ease;
    }

    .navbar .nav-options a:hover {
      color: white;
    }

    main {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    main p {
      font-size: 2.5rem;
      color: #e6d522;
      margin: 200px;
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
      z-index: 1;
    }

    #displayVideo video {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .book-section {
      position: relative;
      background-image: url('images/bb.webp');
      background-size: cover;
      background-position: center;
      padding: 100px 20px 50px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      min-height: 80vh;
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

    .book-container {
      z-index: 2;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-gap: 20px;
      max-width: 1200px;
      margin-top: 80px;
    }

    .book {
      background-color: rgba(0, 0, 0, 0.6);
      padding: 15px;
      border-radius: 10px;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      text-decoration: none;
      box-shadow: 0px 0px 20px 5px rgba(212,175,55,0.7);
    }

    .book img {
      width: 100%;
      max-width: 150px;
      height: 200px;
      object-fit: cover;
      border-radius: 5px;
      margin-bottom: 8px;
      opacity: 1;
    }

    .book-title {
      font-size: 1rem;
      color: #e6d522;
    }

    .book:hover {
      transform: translateY(-5px);
    }

    .blog-container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      padding: 20px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .card {
      background-color: #1e1e1e;
      padding: 20px;
      border-radius: 10px;
      color: #ffd700;
      box-shadow: 0px 0px 15px rgba(255, 215, 0, 0.7);
      transition: transform 0.3s ease-in-out;
      display: flex;
      flex-direction: column; /* Add this */
    }

    .card:hover {
      transform: translateY(-8px);
    }

    .owner h1 {
      font-size: 1.6rem;
      color: gold;
    }

    .owner p {
      margin-top: 2px;
      color: white;
      line-height: 1.6;
    }

    .info {
      flex-grow: 1; /* Add this */
      margin-bottom: 10px; /* Add spacing */
    }

    .info p {
      color: white;
      line-height: 1.6; /* Add spacing between lines */
    }

    .read-more {
      display: inline-block;
      margin-top: auto; /* Push to the bottom */
      color: #ffd700;
      text-decoration: none;
      font-weight: bold;
    }

    .read-more:hover {
      color: white;
    }

    
    /*footer {
      background-color: black;
      color: #e6d522;
      text-align: center;
      padding: 5px 20px;
      width: 100%;
      font-size: 1.2rem;
    }*/

    /* FAQ Section */
    .faq-section {
      position: relative;
      background-image: url('images/faq.webp');
      background-size: cover;
      background-position: center;
      padding: 100px 20px 50px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      min-height: 100vh;
    }

.faq-container {
    width: 600px;
    background: rgba(0, 0, 0, 0.9);
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
    text-align: center;
}


.faq-container h1 {
    font-size: 35px;
    text-shadow: 5px 5px 7px black;
    letter-spacing: 3px;
    border-bottom: 3px solid #FFD700;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.faq-item {
    background: rgba(255, 215, 0, 0.2);
    padding: 10px;
    cursor: pointer;
    border-radius: 8px;
    margin-bottom: 8px;
    font-size: 25px;
    font-weight: bold;
    border: 2px solid rgba(255, 215, 0, 0.5);
    text-align: left;
    color: #FFD700;
    transition: 0.3s;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top:40px;
}

.faq-item:hover {
    background: rgba(255, 215, 0, 0.3);
}

.toggle-btn {
    font-size: 20px;
    font-weight: bold;
    color: #FFD700;
    margin-left: auto;
    transition: transform 0.3s;
}

.answer {
    display: none;
    padding: 10px;
    background: rgba(139, 0, 0, 0.6);
    color: #FFD700;
    border-radius: 8px;
    font-size: 14px;
    margin-bottom: 8px;
    animation: slideDown 0.3s ease-in-out;
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-5px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Contact Us Section */
.contact-us-section {
            position: relative;
            background-size: cover;
            background-position: center;
            padding: 100px 20px 80px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 50vh;
            text-align: center;
            overflow: hidden; /* To contain the video */
        }

        .contact-us-section #displayVideo {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .contact-us-section #displayVideo video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .contact-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            
            z-index: 1;
        }

        .contact-container {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
            color: #e6d522;
            z-index: 2;
            max-width: 800px;
            width: 50%;
        }

        .contact-container h2 {
            font-size: 3rem;
            margin-bottom: 30px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.9);
        }

        .contact-info {
            margin-bottom: 30px;
        }

        .contact-info p {
            font-size: 1.6rem;
            line-height: 1.8;
            margin-bottom: 10px;
        }

        .contact-info a {
            color: #ffd700;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-info a:hover {
            color: white;
        }
        
  </style>
</head>
<body>

<nav class="navbar">
  <div class="logo">
    <img src="images/logo.jpeg" alt="Logo">
  </div>
  <div class="typo">पुस्तक𝖔𝖘𝖍</div>
  <ul class="nav-options">
    <li><a href="index.php">&#x22C4 𝕳𝖔𝖒𝖊</a></li>
    <li><a href="books.php">&#x22C4 𝕭𝖔𝖔𝖐𝖘</a></li>
    <li><a href="games.php">&#x22C4 𝕲𝖆𝖒𝖊𝖘</a></li>
    <li><a href="login.php">&#x22C4 𝕷𝖔𝖌𝖎𝖓</a></li>
  </ul>
</nav>

<main>
  <div id="displayVideo">
    <video autoplay loop muted playsinline>
      <source src="images/index2.mp4" type="video/mp4">
    </video>
    <p>"𝕿𝖍𝖆𝖙’𝖘 𝖜𝖍𝖆𝖙 𝕳𝖊𝖗𝖒𝖎𝖔𝖓𝖊 𝖉𝖔𝖊𝖘," 𝖘𝖆𝖎𝖉 𝕽𝖔𝖓. "𝖂𝖍𝖊𝖓 𝖎𝖓 𝖉𝖔𝖚𝖇𝖙, 𝖌𝖔 𝖙𝖔 𝖙𝖍𝖊 𝖑𝖎𝖇𝖗𝖆𝖗𝖞."</p>
  </div>
</main>

<section class="book-section">
  <div id="displayVideo">
    <video autoplay loop muted playsinline>
      <source src="images/e-book.mp4" type="video/mp4">
    </video>
  <h2 class="explore-collection-text">𝕰𝖝𝖕𝖑𝖔𝖗𝖊 𝖔𝖚𝖗 𝖊𝖓𝖌𝖎𝖓𝖊𝖊𝖗𝖎𝖓𝖌 𝖈𝖔𝖑𝖑𝖊𝖈𝖙𝖎𝖔𝖓</h2>
  <div class="book-container">
    <a href="https://jeffe.cs.illinois.edu/teaching/algorithms/book/Algorithms-JeffE.pdf" class="book" target="_blank"><img src="images/algorithm.jpg"><div class="book-title">𝓐𝓵𝓰𝓸𝓻𝓲𝓽𝓱𝓶</div></a>
    <a href="https://moodle.tktk.ee/pluginfile.php/270005/mod_resource/content/1/Harris%20D.%20M.%2C%20Harris%20S.%20L.%20-%20Digital%20Design%20and%20Computer%20Architecture%2C%202nd%20Edition%20-%202012.pdf" class="book" target="_blank"><img src="images/digital_design.jpg"><div class="book-title">𝓓𝓲𝓰𝓲𝓽𝓪𝓵 𝓓𝓮𝓼𝓲𝓰𝓷</div></a>
    <a href="https://www.mbit.edu.in/wp-content/uploads/2020/05/Operating_System_Concepts_8th_EditionA4.pdf" class="book" target="_blank"><img src="images/os.jpg"><div class="book-title">𝓞𝓹𝓮𝓻𝓪𝓽𝓲𝓷𝓰 𝓢𝔂𝓼𝓽𝓮𝓶</div></a>
    <a href="https://mrcet.com/downloads/digital_notes/ECE/III%20Year/DATABASE%20MANAGEMENT%20SYSTEMS.pdf" class="book" target="_blank"><img src="images/dbms.jpeg"><div class="book-title">𝓓𝓑𝓜𝓢</div></a>
    <a href="https://csc-knu.github.io/sys-prog/books/Andrew%20S.%20Tanenbaum%20-%20Computer%20Networks.pdf" class="book" target="_blank"><img src="images/cn.jpeg"><div class="book-title">𝓒𝓸𝓶𝓹𝓾𝓽𝓮𝓻 𝓝𝓮𝓽𝔀𝓸𝓻𝓴𝓼</div></a>
    <a href="http://repo.darmajaya.ac.id/4229/1/Artificial%20Intelligence_%20The%20Basics%20%28%20PDFDrive%20%29.pdf" class="book" target="_blank"><img src="images/ai.jpg"><div class="book-title">𝓐𝓻𝓽𝓲𝓯𝓲𝓬𝓲𝓪𝓵 𝓘𝓷𝓽𝓮𝓵𝓵𝓲𝓰𝓮𝓷𝓬𝓮</div></a>
    <a href="https://engineering.futureuniversity.com/BOOKS%20FOR%20IT/Software-Engineering-9th-Edition-by-Ian-Sommerville.pdf" class="book" target="_blank"><img src="images/se.png"><div class="book-title">𝓢𝓸𝓯𝓽𝔀𝓪𝓻𝓮 𝓔𝓷𝓰𝓲𝓷𝓮𝓮𝓻𝓲𝓷𝓰</div></a>
    <a href="https://alex.smola.org/drafts/thebook.pdf" class="book" target="_blank"><img src="images/ml.jpg"><div class="book-title">𝓜𝓪𝓬𝓱𝓲𝓷𝓮 𝓛𝓮𝓪𝓻𝓷𝓲𝓷𝓰</div></a>
  </div>
</div>
</section>

<section class="book-section">
  <div id="displayVideo">
    <video autoplay loop muted playsinline>
      <source src="images/blog.mp4" type="video/mp4">
    </video>
    <h1 style="font-size: 50px; text-align: center;">𝕷𝖆𝖙𝖊𝖘𝖙 𝕭𝖑𝖔𝖌𝖘</h1>
  <div class="blog-container" data-aos="fade-down">
      <div class="card" data-aos="fade">
          <div class="card-bg"></div>
          <div class="owner">
              <h1>Machine Learning</h1>
              <p>Posted by Varsha Diwale</p>
              <p>January 16, 2025</p>
          </div>
          <div class="info">
              <p>Machine Learning is a field of study that gives computers the ability to learn from data and make predictions without explicit programming.</p>
          </div>
          <a href="https://www.analyticsvidhya.com/blog/2025/01/explainability-and-interpretability/" target="_blank" class="read-more"> Read more<span><i class="bot-arrow bi bi-arrow-right"></i></span></a>
      </div>
      
      <div class="card" data-aos="fade">
          <div class="card-bg"></div>
          <div class="owner">
              <h1>Generative AI</h1>
              <p>Posted by Raja Gupta</p>
              <p>February 08, 2024</p>
          </div>
          <div class="info">
              <p>“Artificial Intelligence (AI)” has been known to all of us since,1956. Still, the use and discussion of AI was mostly limited to scientific research or fictional movies until the rapid popularity of ChatGPT. </p>
          </div>
          <a href="http://medium.com/@raja.gupta20/generative-ai-for-beginners-part-1-introduction-to-ai-eadb5a71f07d" target="_blank" class="read-more"> Read more<span><i class="bot-arrow bi bi-arrow-right"></i></span></a>
      </div>
      
      <div class="card" data-aos="fade">
          <div class="card-bg"></div>
          <div class="owner">
              <h1>Cybersecurity</h1>
              <p>Posted by Alice Smith</p>
              <p>March 1, 2024</p>
          </div>
          <div class="info">
              <p>Cybersecurity is essential for protecting systems, networks, and data from cyber threats, ensuring privacy and integrity in the digital world.</p>
          </div>
          <a href="https://www.cisco.com/c/en/us/products/security/what-is-cybersecurity.html" target="_blank" class="read-more"> Read more<span><i class="bot-arrow bi bi-arrow-right"></i></span></a>
      </div>
      <div class="card" data-aos="fade">
          <div class="card-bg"></div>
          <div class="owner">
              <h1>Web Development</h1>
              <p>Posted by Ashima Jain</p>
              <p>February 22, 2025</p>
          </div>
          <div class="info">
              <p>Full-stack developers are the brains behind the websites and apps we use daily. They build and design these websites to make our lives hassle-free.   </p>
          </div>
          <a href="https://www.wscubetech.com/blog/web-development/" target="_blank" class="read-more"> Read more<span><i class="bot-arrow bi bi-arrow-right"></i></span></a>
      </div>
      <div class="card" data-aos="fade">
          <div class="card-bg"></div>
          <div class="owner">
              <h1>Introduction to DevOps</h1>
              <p>Posted by Siddharth Dutta</p>
              <p>February 20, 2025</p>
          </div>
          <div class="info">
              <p>We've been hearing the terms DevOps, Docker, Kubernetes a lot as of late. This article will help you
          understand the what, why and how of DevOps.</p>
          </div>
          <a href="https://www.nimblework.com/blog/introduction-to-devops/#:~:text=DevOps%20is%20the%20acronym%20given,seamlessly%20work%20with%20better%20communication." target="_blank" class="read-more"> Read more<span><i class="bot-arrow bi bi-arrow-right"></i></span></a>
      </div>
      <div class="card" data-aos="fade">
          <div class="card-bg"></div>
          <div class="owner">
              <h1>Speed Up Your Productivity</h1>
              <p>Posted by Sam Altman</p>
              <p>April 20, 2024</p>
          </div>
          <div class="info">
              <p>Creativity starts in the Unity Hub, where you can explore all that Unity has to offer for real-time 3D creation.</p>
          </div>
          <a href="https://blog.samaltman.com/productivity" target="_blank" class="read-more"> Read more<span><i class="bot-arrow bi bi-arrow-right"></i></span></a>
      </div>
  </div>
  </div>
</section>
    <!-- FAQ Section -->
    <section class="faq-section">
  <div id="displayVideo">
    <video autoplay loop muted playsinline>
      <source src="images/faq.mp4" type="video/mp4">
    </video>
    <h1 style="font-size: 50px; text-align: center;">𝕱𝖗𝖊𝖖𝖚𝖊𝖓𝖙𝖑𝖞 𝕬𝖘𝖐𝖊𝖉 𝕼𝖚𝖊𝖘𝖙𝖎𝖔𝖓𝖘</h1>
    <div class="faq">
                <div class="faq-item">Q: What is पुस्तकOSH? <span class="toggle-btn">+</span></div>
                <div class="answer">A: पुस्तकOSH is a magical repository of books from all over the wizarding world.</div>

                <div class="faq-item">Q: How can I borrow books? <span class="toggle-btn">+</span></div>
                <div class="answer">A: Simply log in and browse our digital library to borrow books.</div>

                <div class="faq-item">Q: Is there a return deadline? <span class="toggle-btn">+</span></div>
                <div class="answer">A: Yes, books must be returned within 14 days, or a fine will be charged.</div>

                <div class="faq-item">Q: What is the best part of पुस्तकOSH? <span class="toggle-btn">+</span></div>
                <div class="answer">A: The best part of पुस्तकOSH is its vast collection of enchanted books and magical knowledge from the wizarding world.</div>
            </div>
  </div>
  <script>
        document.querySelectorAll('.faq-item').forEach(item => {
            item.addEventListener('click', () => {
                let answer = item.nextElementSibling;
                let isActive = answer.style.display === 'block';

                document.querySelectorAll('.answer').forEach(ans => ans.style.display = 'none');
                document.querySelectorAll('.toggle-btn').forEach(btn => btn.textContent = '+');

                if (!isActive) {
                    answer.style.display = 'block';
                    item.querySelector('.toggle-btn').textContent = '-';
                }
            });
        });
    </script>
</section>
<section class="contact-us-section" id="contact">
        <div id="displayVideo">
            <video autoplay loop muted playsinline>
                <source src="images/cont.mp4" type="video/mp4">
            </video>
        </div>
        <div class="contact-overlay"></div>
        <div class="contact-container">
            <h2>𝕮𝖔𝖓𝖙𝖆𝖈𝖙 𝖀𝖘</h2>
            <div class="contact-info">
                <p>Have any questions or magical inquiries? Reach out to the पुस्तक𝖔𝖘𝖍 librarians!</p>
                <p>Email: <a href="mailto:enquiries@pustakosh.com">libraryami@gmail.com</a></p>
                <p>Contact Number: +91 97xxxxxxxx</p>
                <p>Post Address: पुस्तक𝖔𝖘𝖍, Banasthali Vidyapith</p>
            </div>
        </div>
    </section>
</body>
</html>