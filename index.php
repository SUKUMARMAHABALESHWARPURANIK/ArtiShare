<?php
session_start();
require 'connection.php';

if(isset($_SESSION['uname'])){
   header("Location: https://articlesharing.co.in/ArtiShare/UserIndex.php");
            exit;  
}

?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"
      integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link rel="icon" href="icon1.png" type="images/x-icon" />
   <link rel="shortcut" href="icon1.png" type="images/x-icon" />
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" 
   <link href="https://fonts.googleapis.com/css2?family=Peddana&family=Poppins:wght@400;500&family=Roboto:wght@700&display=swap"
      rel="stylesheet">
 <title>index</title>
 <style>
 * {
    margin: 0;
    padding: 0;
}

body {

    color: white;
    font-family: 'Poppins', sans-serif;
}

nav {
    position: absolute;
    top: 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 80px;
    width: 100%;
    background-color: #fff;
}

nav img {
    width: 200px;
    height: 70px;
    margin-top: 10px;
    margin-left: 5px;
}


nav ul {
    display: flex;
    justify-content: center;
    list-style: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    margin: 0 23px;
}

nav ul li a {
    text-decoration: none;

}

nav ul li a:hover {
    color: rgb(17, 17, 201);
    font-size: 1.2rem;
}

.left {
    font-size: 1.5rem;
}

.firstSection {
    display: flex;
    justify-content: space-around;
    margin: 140px 0;
    align-items: center;
}

.firstSection>div {
    width: 40%;
}

.leftSection {
    font-size: 3rem;
}

.leftSection .buttons {
    padding: 10px;
}

.leftSection .btn {
    font-size: 2rem;
    border-radius: 10px;
    padding: 12px;
    background-color: #680aeb;
    color: white;
    border: 2px solid white;
    font-size: 20px;
    cursor: pointer;
}

.rightSection img {
    width: 80%;
    margin: 50px 0;
    border-radius: 10px;
}

.yellow {
    color: aqua;
}

#element {
    color: aqua;
}

.secondSection {
    max-width: 80vw;
    margin: auto;
    height: 300vh;
}

main hr {
    border: 0;
    background: white;
    height: 1.2rem;
    margin: 60px 84px;
    border-radius: 10px;
}

.secondSection h1 {
    font-size: 1.6rem;
}

.text-grey {
    color: grey;
}

.secondSection .box {
    background: white;
    width: 50vw;
    height: 2px;
    margin: 56px 0;
    display: flex;
}

.secondSection .vertical {
    height: 93px;
    width: 1px;
    background-color: white;
    margin: 0 225px;

}

.image-top {
    width: 23px;
    position: relative;
    top: 20px;
    left: -9px;
    width: 100px;
    background-color: white;
    border-radius: 10px;
}

.vertical-title {
    position: relative;
    top: 65px;
    width: 25px;
    margin-top: 20px;
    font-size: 30px;
}

.vertical-desc {
    position: relative;
    top: 86px;
    color: white;
    width: 150px;
    font-size: 15px;
}

footer {
    display: flex;
    flex-direction: column;
    height: auto;
    margin-top: 20px;
    background-color: #680aeb;
    border-radius: 0%;
    padding: 23px 122px;
    justify-content: space-evenly;
}

.footer-first {
    margin-left: 40px;
    /* Adjusted the margin */
    bottom: 0;
}

.footer h3 {
    font-size: 1.5rem;
}

.footer-second ul {
    list-style: none;

}

.footer>div {
    width: 223px;
}

footer .footer-rights {
    text-align: center;
}

/* Define the animation keyframes */
@keyframes slideFromLeft {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }

    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideFromRight {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }

    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.checkbtn {
    font-size: 30px;
    float: left;
    line-height: 80px;
    margin: 20px;
    cursor: pointer;
    display: none;
}

#check {
    display: none;
}

.skill-section {
    text-align: center;
}

::-webkit-scrollbar {
    height: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 25px;
}

::-webkit-scrollbar-thumb {
    background: #6e93f7;
    border-radius: 25px;
}

::-webkit-scrollbar-thumb:hover {
    background: #4070f4;
}

.container {
    display: flex;
    gap: 12px;
    width: 80rem;
    align-items: center;
    border-radius: 12px;
    padding: 30px;
    scroll-snap-type: x mandatory;
    overflow-x: scroll;
    scroll-padding: 30px;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
}

.container .card {
    display: flex;
    flex: 0 0 100%;
    flex-direction: column;
    align-items: center;
    padding: 30px;
    border-radius: 12px;
    background: #fff;
    scroll-snap-align: start;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
}

.card .image {
    height: 150px;
    width: 150px;
    padding: 4px;
    background: #4070f4;
    border-radius: 50%;
}

.image img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 50%;
    border: 5px solid #fff;
}

.card h2 {
    margin-top: 25px;
    color: #333;
    font-size: 22px;
    font-weight: 600;
}

.card p {
    margin-top: 4px;
    font-size: 18px;
    font-weight: 400;
    color: #333;
    text-align: center;
}

footer {
    flex-direction: column;
}

.footer-first,
.footer-rights {
    margin: 10px 0;
}

.footer h3 {
    font-size: 1.2rem;
}

.footer-second li {
    font-size: 0.9rem;
}

.footer-rights {
    font-size: 0.7rem;
}

.about_me {
    justify-content: center;
    text-align: center;

}

.about_me img {
    width: 250px;
    border-radius: 50%;
}

hr {
    border: 0;
    background: white;
    height: 1.2rem;
    margin: 60px 84px;
    border-radius: 10px;
}


.about_me_p {
    padding: 0 120px;
}

.text-video {
    color: white;
    text-align: center;
    background: rgba(0, 0, 0, 0.4);
    position: absolute;
    top: 95px;
    left: 0;
    right: 0;
    width: 100%;
    height: 750px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.text-video video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
}

.text-string {
    font-size: 75px;
    color: white;
}

#about-img {
    width: 35rem;
    height: 25rem;
    border-radius: 10px;
}

.about-heading {
    padding-top: 2rem;
    padding-bottom: 10rem;

}

.about-body {
    display: flex;
    justify-content: space-between;
    padding-right: 2rem;
    padding-left: 2rem;

}

.about-content {
    padding-left: 3rem;
    padding-right: 3rem;

}

.about_text {
    color: black;
    text-align: center;
    font-size: 36px;
}

.about_text_h5 {
    color: black;
    font-size: 26px;
    text-align: center;

}

.language-content {
    text-align: center;
    justify-content: center;
    font-size: 1.5rem;
    display: grid;
    /* grid-template-columns:  auto auto auto; */
    grid-template-columns: repeat(2, auto);
    /* grid-template-columns: 1fr 1fr 1fr; */
    grid-gap: 1rem;
}

.language-content h3 {
    font-weight: bolder;
    font-family: "Poppins", sans-serif;
    font-size: 3.5rem;
    text-align: center;
    justify-content: center;
    padding-top: 2rem;
    /*text-transform: uppercase;*/
}

#lan_button {
    align-items: center;
    width: 25rem;
    height: 7rem;
    background-color: #F94C10;
    border: none;
    font-size: 2.5rem;

}

#lan_button:hover {
    transform: scale(1.1);
}

input[type="button"] {
    justify-content: center;
    align-items: center;
    border-radius: 10px;
    background-color: red;
    color: white;
    width: 8rem;
    height: 3rem;
    font-weight: 100;
    font-size: bold;
    font-size: 1.5rem;
}
.services {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: flex-start;
    gap: 20px;
}

.service-card {
    flex: 1;
    max-width: 300px;
    height:20rem;
    background-color: #071952;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    margin-top:20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
.font{
    font-size:22px;
}
.service-heading{
    color:#000;
    margin-top:20px;
    text-align:center;
}

.article-img1 {
   width: 35rem;
   height: 15rem;
   border-radius: 10px;
   padding-top: 50px;
}

.article-heading {
   padding-top: 10rem;
   padding-bottom: 10rem;
   font-size: 18px;
   color: black;
   text-align: center;
}

.article-1,
.article-2,
.article-3 {
   display: grid;
   grid-template-columns: 1fr 1.5fr;
   grid-template-rows: 0.5fr 0.5fr;
   grid-row-gap: 1rem;
   grid-column-gap: 5rem;
   justify-content: space-between;
   padding-left: 3rem;
   padding-right: 3rem;
   border-radius: 10px;
}

.article-2 {
   padding-left: 3rem;
   padding-right: 3rem;
}

.article_content {
   font-size: 25px;
   color: #27005D;
     background-color:#FFCC70;
   border-radius:10px;
     padding:10px 10px 10px 10px;
}

   #contactus {
   background-color: #27005D;
   color: white;
   text-align: center;
   padding: 20px 0;
}

.footer-heading {
   font-size: 24px;
   margin-bottom: 20px;
   color:#000;
   text-align:center;

}

.footer-body {
   font-size: 32px;
}
footer{
    height:20rem;
}

@media (max-width: 480px) {
    .article_content {
   font-size: 20px;
   padding:10px 10px 10px 10px;
   color: black;
   background-color:#FFCC70;
   border-radius:10px;
   
}

     .article-1,
   .article-2,
   .article-3 {
      grid-template-columns: 1fr; /* Single column layout */
      padding-left: 0;
      padding-right: 0;
      
   }

   .article-img1 {
      width: 100%; /* Image occupies full width */
      height: auto; /* Maintain aspect ratio */
   }

   .article-1 .article-img1 {
      order: 2; /* Move image after content */
   }

   .article-2 .article-img1,
   .article-3 .article-img1 {
      order: 3; /* Keep image before content */
   }
    
    .checkbtn {
        display: block;
    }

    nav ul {
        display: none;
        flex-direction: column;
        background: white;
        position: absolute;
        top: 80px;
        left: 0;
        right: 0;
        text-align: center;
    }

    #check:checked~.right ul {
        display: block;
        z-index: 1;

    }

    .right ul li {
        margin: 0;
        padding: 10px;
    }

    .skills-section h2 {
        text-align: center;
        justify-content: center;
    }

    .secondSection {
        display: none;
    }

    .leftSection {
        font-size: 26px;
    }

    .leftSection .buttons {
        padding: 20px;
        width: 30px;
        display: flex;
        /* Add this line to make the buttons appear in a row */
        flex-direction: row;
        /* Set the direction to horizontal */
        gap: 10px;
        /* Add some spacing between buttons if needed */
    }

    .leftSection .btn {
        font-size: 2rem;
        border-radius: 10px;
        padding: 12px;
        width: 15rem;
        background-color: #680aeb;
        color: white;
        border: 2px solid white;
        font-size: 20px;
        cursor: pointer;
        /* Remove display: flex; from here */
    }

    ::-webkit-scrollbar {
        height: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 25px;
    }

    ::-webkit-scrollbar-thumb {
        background: #6e93f7;
        border-radius: 25px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #4070f4;
    }

    .container {
        display: flex;
        gap: 12px;
        max-width: 400px;
        border-radius: 12px;
        padding: 10px;
        scroll-snap-type: x mandatory;
        overflow-x: scroll;
        scroll-padding: 30px;
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        width: 100%;
        height: 20%;
    }

    .container .card {
        display: flex;
        flex: 0 0 100%;
        width: 20%;
        height: 20%;
        flex-direction: column;
        align-items: center;
        padding: 30px;
        border-radius: 12px;
        background: #fff;
        scroll-snap-align: start;
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
    }

    .card .image {
        height: 150px;
        width: 150px;
        padding: 4px;
        background: #4070f4;
        border-radius: 50%;
    }

    .image img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid #fff;
    }

    .card h2 {
        margin-top: 25px;
        color: #333;
        font-size: 22px;
        font-weight: 600;
    }

    .card p {
        margin-top: 4px;
        font-size: 18px;
        font-weight: 400;
        color: #333;
        text-align: center;
    }

    .text-video {
        color: black;
        text-align: center;
        background: rgba(0, 0, 0, 0.4);
        z-index: 2;
        margin-top: 0px;
        position: absolute;
        top: 43%;
        left: 0;
        right: 0;
        width: 100%;
        height: 281px;
        transform: translateY(-50%);
        z-index: auto;

    }

    .text-string {
        font-size: 25px;
        color: white;
    }

    .about-body {
        flex-direction: column;
        align-items: center;
    }

    #about-img {
        max-width: 100%;
    }

    .about-content {
        padding-left: 0;
        text-align: center;
    }

    #lan_button {
        align-items: center;
        width: 12rem;
        height: 4rem;
        background-color: #F94C10;
        border: none;
        font-size: 2.5rem;
    }
     .services {
        flex-direction: column;
        align-items: center;
    }

    .service-card {
        width: 100%;
    }
}
     
   </style>
</head>

<body>
     <header>
        <nav>
            <div class="left" id="nameAnimation_1"> 
                   <img src="Images/arti.png" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
            </div>
            <input type="checkbox" id="check" >
            <label for="check" class="checkbtn">
                <i class="fa fa-bars" style="color:blue;"></i>
            </label>
            <div class="right" id="nameAnimation_2"  data-aos="fade-right">
                <ul>
                  
          <li><i class="fa fa-home" aria-hidden="true" style="color:#27005D;"></i> <a href="#hero">Home</a></li>
         <li><i class="fa fa-sign-in" aria-hidden="true" style="color:#27005D;"></i> <a href="User_info/login.php">Login</a></li>
         <li><i class="fa fa-user-plus" aria-hidden="true" style="color:#27005D;"></i> <a href="Register_Info/register.php">Register</a></li>
         <li><i class="fa fa-users" aria-hidden="true" style="color:#27005D;"></i> <a href="#about">About</a></li>
         <li><i class="fa fa-wrench" aria-hidden="true" style="color:#27005D;"></i> <a href="#service-section">Services</a></li>
         <li><i class="fa fa-pencil" aria-hidden="true" style="color:#27005D;"></i> <a href="#article-section">Article</a></li>
         <li><i class="fa fa-phone" aria-hidden="true" style="color:#27005D;"></i> <a href="#contactus">Contactus</a></li>
                </ul>
            </div>
        </nav>
    </header>
   
  
  <div style="margin-top:90px;">
         <div class="text-video"><b  class="text-string">Welcome to ArtiShare..... <span id="element" style="color:skyblue;"></span></b></div>
        <video autoplay muted loop style="width: 100%; height: 100%;">
            <source src="Images/bgvideo1.mp4" type="video/mp4" />
        </video>
  </div>

     <!-- New section after the video section -->
   <section id="about">
      <div class="about-heading font"  data-aos="fade-up" >
         <h3 class="about_text">About</h3>
      </div>
      <div class="about-body font" >
         <div>
            <img src="Images/about.png" alt="about" id="about-img"  data-aos="fade-left">
         </div>
         <div class="about-content" >
            <!--<h3>About me</h3>-->
            <h5 class="about_text_h5"  data-aos="fade-right" style="background-color:#22668D;color:white;border-radius:10px;padding:10px 10px 10px 10px;">
               <?php
                     //quotes query
                     
                     
                       $sql = "SELECT `about_content`, `about_writer` FROM `aboutus` where id=1";
                     
                       $result = $conn->query($sql);
                     
                         if ($result->num_rows > 0) {
                               while ($row = $result->fetch_assoc()) {
                                     echo "<p>{$row['about_content']}</p>
                                           <p>-{$row['about_writer']}</p>";
                                 }
                                 } else {
                                  echo "No data found.";
                          }
                     
                                  ?>

            </h5>



         </div>
      </div>
   </section>
   
   
   <!--language section-->
   <section id="language">
      <div class="language-heading font" >
         <h3>
            "Write Your Article in Your Language...!"</h3>
      </div>
      <div class="language-font" >
         <div>
         </div>
         <center data-aos="fade-up">
            <h1 style="color:black;">Languages</h1>
         </center> <br>

         <div class="language-content" data-aos="flip-up">

            <input type="button" id="lan_button" value="English">
            <input type="button" id="lan_button" value="हिन्दी">
            <input type="button" id="lan_button" value="ಕನ್ನಡ">
            <input type="button" id="lan_button" value="தமிழ்">
            <input type="button" id="lan_button" value="తెలుగు">
            <input type="button" id="lan_button" value="മലയാളം">
            <!--<input type="button" id="lan_button"  value="मराठी">-->
            <!--<input type="button" id="lan_button"  value="संस्कृत">-->

         </div>
      </div>
   </section>
   
   
   
   
   <!-- 
         service section -->
  <section id="service-section">
    <div class="service-heading font" data-aos="fade-up">
        <h3>Services</h3>
    </div>
    <div class="services" data-aos="zoom-in">
        <div class="font service-card">
            <i class="fa-solid fa-share"></i><br>
            <h4>Social Sharing</h4><br>
            <h5 style="text-align: justify;"><br>
                Include social media sharing buttons on each article to make it easy for readers to share content across
                different platforms.
            </h5>
        </div>
        <div class="font service-card">
            <i class="fa-solid fa-tag"></i><br>
            <h4>Categories and Tags</h4><br>
            <h5 style="text-align: justify;"><br>
                Implement a system of categories and tags to help users categorize their articles and make it easier for
                readers to discover content on specific topics.
            </h5>
        </div>
        <div class="font service-card">
            <i class="fa-solid fa-user"></i><br>
            <h4>User Profiles</h4><br>
            <h5 style="text-align: justify;"><br>
                Allow users to create profiles where they can manage their published articles, track engagement metrics,
                and update their information.
                A user dashboard can provide an overview of their articles' performance.
            </h5>
        </div>
    </div>
</section>

   <!-- article section -->
    <!-- article section -->
   <article id="article-section">
      <div class="article-heading "  data-aos="fade-up">
         <h3 >Article</h3>
         <h3>Top writer's quotes</h3>
      </div>
      <div class="article-1">
         <div>
            <img class="article-img1" src="Images/a1.jpg" alt="artilce-image1" data-aos="fade-left" >
         </div>
         <div class="article_content" >
            <h5>
               <?php
                     //quotes query
                     
                     
                       $sql = "SELECT `quotes_content`, `quotes_writer` FROM `quotes` where id=1";
                     
                       $result = $conn->query($sql);
                     
                         if ($result->num_rows > 0) {
                               while ($row = $result->fetch_assoc()) {
                                     echo "<p>{$row['quotes_content']}</p>
                                           <p>-{$row['quotes_writer']}</p>";
                                 }
                                 } else {
                                  echo "No data found.";
                          }
                     
                                  ?>
            </h5>
         </div>
      </div>
  <div class="article-2" >
      <div class="article_content" data-aos="fade-left" >
         <h5>
            <?php
               //quotes query
               $sql = "SELECT `quotes_content`, `quotes_writer` FROM `quotes` where id=2";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                     echo "<p>{$row['quotes_content']}</p>
                           <p>-{$row['quotes_writer']}</p>";
                  }
               } else {
                  echo "No data found.";
               }
            ?>
         </h5>
      </div>
      <div>
         <img class="article-img1" src="Images/a2.jpg" alt="article-image1" >
      </div>
   </div>
       
      </div>
      <div class="article-3" >
         <div>
            <img class="article-img1" src="Images/a4.jpg" alt="artilce-image1" data-aos="fade-left" >
         </div>
         <div class="article_content" >
            <h5 >
               <?php
                     //quotes query
                     
                     
                       $sql = "SELECT `quotes_content`, `quotes_writer` FROM `quotes` where id=3";
                     
                      $result = $conn->query($sql);
                     
                         if ($result->num_rows > 0) {
                               while ($row = $result->fetch_assoc()) {
                                     echo "<p>{$row['quotes_content']}</p>
                                           <p>-{$row['quotes_writer']}</p>";
                                 }
                                 } else {
                                  echo "No data found.";
                          }
                     
                                  ?>
            </h5>
         </div>
      </div>
      
        
   </article>
   
     <!-- footer -->
   <div class="footer-heading" >
      <h3 >Contact us</h3>
   </div>
   <footer id="contactus">

      <div class="footer-body" >
         <i class="fab fa-facebook"></i></a>
         <i class="fab fa-linkedin"></i></a>
         <i class="fab fa-instagram"></i></a>
         <i class="fab fa-twitter"></i></a>
      </div>
   </footer>
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script>
      AOS.init({
         offset: 400,
         duration: 1000,
      }
      );
   </script>

  <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    
        <!-- Setup and start animation! -->
        <script>
            var typed = new Typed('#element', {
                strings: ['Indias largest Readers writers Hub... '],
                typeSpeed: 60,
            });
        </script>
</body>

</html>