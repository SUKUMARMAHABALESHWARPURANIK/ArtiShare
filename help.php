<?php
session_start();
 require 'connection.php';
if (!isset($_SESSION['uname'])) {
    header('location:https://articlesharing.co.in/ArtiShare/User_info/login.php');
    die();
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link rel="icon" href="icon1.png" type="images/x-icon"/>
      <link rel="shortcut" href="icon1.png" type="images/x-icon"/>
    <link href="https://fonts.googleapis.com/css2?family=Peddana&family=Poppins:wght@400;500&family=Roboto:wght@700&display=swap" rel="stylesheet">
    <title>artiindex</title>

    <style>
                 @import url(https://fonts.googleapis.com/css?family=Open+Sans);


            :root{
                --main-color:red;
                --color-dark:#1D2231;
                 --text-grey:#8390A2;
                 --color_1:#191D88;
                 --color_2:#1450A3;
                 --color_3:#279EFF;     
                 --color_4:#102C57;
    
            }
          * {
                 margin: 0;
                 padding: 0;
                 outline: none;
                 border: none;
                 text-decoration: none;
                 box-sizing: border-box;
                 font-family: 'Open Sans', serif;
             }
        

     .sidebar{
                width:345px;
                position:fixed;   
                left:0;
                top:0;
                height:100%;
                background:var(--color_1);
             /*z-index:100;*/
               transition:width 300ms;
            }
         
        .sidebar-brand{
             height:90px;
             padding:1rem 0rem 1rem 2rem;
             color:white;
         }
         
        
             .sidebar-brand span{
                 display:inline-block;
                 padding-right:1rem;
             }
             
         .sidebar-menu{
             margin-top:1rem;
         }
         .sidebar-menu li{
             width:100%;
             margin-bottom:1.3rem;
             padding-left:2rem;
         }
     
         .sidebar-menu a{
             display:block;
             color:#fff;
             font-size:1.1rem;
         }
          .sidebar-menu a:hover{
           background:#fff;
           padding-top:1rem;
           padding-bottom:1rem;
             color:var(--main-color);
             font-size:1.1rem;
             border-radius:10px 0px 0px 10px;
         }
          .sidebar-menu a span:first-child{
             font-size:1.5rem;
             padding-right:1rem;
         }
       .sidebar-menu a.active{
           background:#fff;
           padding-top:1rem;
           padding-bottom:1rem;
             color:var(--main-color);
             font-size:1.1rem;
             border-radius:10px 0px 0px 10px;
         }
        
         .sidebar-content{
             margin-left:345px;
         }
         
         .sidebar-menu a span:first-child{
             font-size:1.5rem;
             padding-right:1rem;
         }
         
          #nav-toggle{
             display:none;
         }
         #nav-toggle:checked+.sidebar{
             width:70px;
         }
           #nav-toggle:checked+.sidebar .sidebar-brand,
             #nav-toggle:checked+.sidebar li {
             padding-left:1rem;
         }
         
         #nav-toggle:checked+.sidebar .sidebar-brand,
             #nav-toggle:checked+.sidebar li a {
             padding-left:1rem;
         }
         
           #nav-toggle:checked+.sidebar .sidebar-brand h2 span:last-child,
           #nav-toggle:checked+.sidebar li a  span:last-child{
             display:none;
         }
         #nav-toggle:checked ~ .main-content{
             margin-left:70px;
         }
            #nav-toggle:checked ~ .main-content header{
             width:calc(100%-70px);
             left:70px;
         }
       #close-toggle:checked ~ .main-content{
             margin-left:70px;
         }
            #close-toggle:checked ~ .main-content header{
             width:calc(100%-70px);
             left:70px;
         }
       
         .main-content{
             transition:margin-left 300ms;
             margin-left:345px;
         }
         
           header{
              
             display:flex;
             justify-content:space-between;
             padding:1rem;
             box-shadow:4px 4px 10px rgba(0,0,0,0.2);
             position:static;
             left:345px;
             width:calc(100%-345px);
             top:0;
             /*z-index:100;*/
             transition:left 300ms;
         }
        
         header h2{
             color:#222;
         }
         header label span{
             font-size:1.7rem;
             padding-right:1rem;
         }
         .search-wrapper{
             border:1px solid #f0f0f0;
             border-radius:10px;
             height:50px;
             display:flex;
             align-items:center;
             overflow-x:hidden;

         }
         .search-wrapper span{
             display:inline-block;
             padding:0rem 1rem;
             font-size:1.5rem;
         }
         
         .search-wrapper input{
             height:100%;
             padding:.5rem;
             border:none;
             outline:none;
         }
         
         .user-wrapper{
             display:flex;
             align-items:center;
         }
         .user-wrapper img{
             border-radius:50%;
             margin-right:.5rem;
         }
         .user-wrapper small{
             display:inline-block;
             color:var(--text-grey);
             margin-top:-10px !important;
         }
         main{
             margin-top:60px;
             padding:2rem 1.5rem;
             background:#f0f0f0;
             min-height:calc(100vh-90px);
         }
         .cards{
             display:grid;
             grid-template-columns:repeat(3,1fr);
             grid-gap:2rem;
             margin-top:1rem;
         }
         .cards_newBook{
              display:grid;
             grid-template-columns:repeat(1,1fr);
             grid-gap:2rem;
             margin-top:1rem;
             border-radius:10px;
             
         }
         .card-newBook-single{
             display:flex;
             justify-content:space-between;
             background:#BEADFA;
             padding:2rem;
             border-radius:10px;
             color:white;
             
         }
         .card-newBook-single div:second-child h1{
             color:yellow;
         }
         .card-newBook-single  img{
                      background-color:#fff;
                      border-radius:10%;
         }
         
         .card-single{
             display:flex;
             justify-content:space-between;
             background:blue;
             padding:2rem;
             border-radius:10px;
             color:white;
             
         }
          .card-single:hover{
            
             color:red;
             
         }
            .card-single:hover {
             transform: scale(1.1); /* Zoom in by 10% on hover */
            }

        
            .card-single div:last-child span{
                 font-size:3rem;
                 color:var(--text-grey);
             
         }
          .card-single div:last-child span img{
                      width:70px;
                      height:50px;
                      background-color:#fff;
                      border-radius:50%;
             
         }
          .card-single div:first-child span{
               color:white;
             
         }
         .card-single div:first-child span a{
               color:white;
             
         }
         
          .card-single:last-child{
          
                 color:var(--main-color);
             
         }
           .card-single:last-child h1{
          
                 color:var(--main-color);
             
         }
          .card-single:last-child div:last-child span{
               color:#fff;
             
         }
         
          .card-single:last-child div:first-child span{
                color:#fff;
             
         }
         .recent-grid{
             margin-top:3.5rem;
             display:grid;
             grid-gap:3rem;
             grid-template-columns:65% auto;
             
         }
         .card{
             background:#fff;
             border-radius:15px;
         }
         .card-heder,.card-body{
             padding:1rem;
             margin-top:10px;
         }
         .card-header{
             display:flex;
             justify-content:space-between;
             align-items:center;
             border-bottom:1px solid #f0f0f0;
         } 
         .card-header button{
             background:var(--main-color);
             border-radius:10px;
             color:#fff;
             font-size:.8rem;
             padding:.5rem 1rem;
             border:1px solid var(--main-color);
             margin-top:10px;
             margin-right:10px;
         }
         table{
             border-collapse:collapse;
         }
         thead tr{
             border:1px solid #f0f0f0;
         }
         thead td{
             font-weight:700;
         }
         thead td{
             padding:.5rem;
             font-size:.9rem;
             color:#222;
         }
         
        td .status{
            display:inline-block;
            height:20px;
            width:20px;
            border-radius:50%;
            margin-right:1rem;
            
        }
        tr td:last-child{
            display:flex;
            align-items:center;
        }
        .status.purple{
            background:rebeccapurple;
        }
          .status.pink{
            background:deeppink;
        }
          .status.orange{
            background:orangered;
        }
        .table-responsive{
            width:100%;
            overflow-x:auto;
        }
        .customer{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-top:10px;
            padding:.5rem 1rem;
        }
        .info{
            display:flex;
            align-items:center;
        }
        .info img{
            border-radius:50%;
            margin-right:1rem;
        }
        .info h4{
            font-size:.8rem;
            font-weight:700;
            color:#222;
        }
        .info small{
            font-weight:600;
            color:var(--text-grey);
        }
        .contact span{
            font-size:1.2rem;
            display:inline-block;
        }
        #close-toggle{
            display:none;
        }
        #google_element{
            float:right;
              border-radius:10px;
        }
        
        @media only screen and (max-width:1200px){
            
           .sidebar{
             width:70px;
         }
           .sidebar .sidebar-brand,
            .sidebar li {
             padding-left:1rem;
         }
         
          .sidebar .sidebar-brand,
            .sidebar li a {
             padding-left:1rem;
         }
         
         .sidebar .sidebar-brand h2 span:last-child,
           .sidebar li a  span:last-child{
             display:none;
         }
         .main-content{
             margin-left:70px;
         }
          .main-content header{
             width:calc(100%-70px);
             left:70px;
         }
          #close-toggle{
            display:block;
        }
        
         /* .sidebar:hover{*/
         /*    width:345px;*/
         /*    z-index:200;*/
         /*}*/
         /*  .sidebar:hover .sidebar-brand,*/
         /*   .sidebar:hover li {*/
         /*    padding-left:2rem;*/
         /*    text-align:left;*/
         /*}*/
         
          
         /*   .sidebar:hover li a {*/
         /*    padding-left:1rem;*/
         /*}*/
         
         /*.sidebar:hover .sidebar-brand h2 span:last-child,*/
         /*  .sidebar:hover li a  span:last-child{*/
         /*    display:inline;*/
         /*}*/
        }
        
        @media only screen and (max-width:960px){
            .cards{
                grid-template-columns:repeat(3,1fr);
            }
            .recent-grid{
                grid-template-columns:60% 40%;
            }
              #close-toggle{
            display:block;
        }
        }
          @media only screen and (max-width:768px){
            .cards{
                grid-template-columns:repeat(2,1fr);
            }
            .recent-grid{
                grid-template-columns:100%;
            }
            .search-wrapper{
                display:none;
            }
            .sidebar{
                left:-100% !important;
            }
            header h2{
                display:flex;
                align-items:center;
            }
            header h2 label{
                display:inline-block;
                 text-align:center;
                background:var(--main-color);
                padding-right:0rem;
                margin-right:1rem;
                height:40px;
                width:40px;
                border-radius:50%;
                color:#fff;
                display:flex;
                align-items:center;
                justify-content:center !important;
                
            }
            header h2 span{
                text-align:center;
                padding-right:0rem;
            }
            header h2{
                font-size:1rem;
            }
            .main-content{
                width:100%;
                margin-left:0rem;
            }
            header{
                width:100% !important;
                left:0 !important;
            }
            #nav-toggle:checked + .sidebar{
                left:0 !important;
                z-index:200;
                width:345px;
            }
        
           #nav-toggle:checked +.sidebar .sidebar-brand,
           #nav-toggle:checked +.sidebar:hover li{
             padding-left:2rem;
             text-align:left;
         }
         
          
          #nav-toggle:checked +.sidebar li a {
             padding-left:1rem;
         }
         
          #nav-toggle:checked +.sidebar  .sidebar-brand h2 span:last-child,
          #nav-toggle:checked +.sidebar li a  span:last-child{
             display:inline;
         }
         
          #nav-toggle:checked  ~ .main-content{
              margin-left:0rem !important;
          }
            #close-toggle{
            display:block;
        }
            
        }
        
        @media only screen and (max-width:560px){
            .cards{
                grid-template-columns:100%;
            }
              #close-toggle{
            display:block;
        }
        }
        
      
        .cards_newBook {
            background-color: #f0f0f0;
            padding: 20px;
            margin: 10px;
        }


      .card-newBook-single {
          background-color: #fff;
          border: 1px solid #ddd;
          padding-left: 20px;
          margin-bottom: 20px;
      }

      /* Style the book image div */
            .book-image span img {
                width: 10rem;
                height:12rem;                
            }      
            
      
          /* Style the book details div */
          .book-details h1 {
              font-size: 20px;
              font-weight: bold;
              margin-left: 10px;
              color:#000;
          }

       .book-details h3 {
           font-size: 16px;
           margin: 0;
           color: #555;
           margin-left: 10px;
       }     
       
     .book-details p {
         font-size: 14px;
         margin: 0;   
         color: #777;
         margin-left: 10px;
     }

  .book-details span {
      display: inline-block;
      background-color: #007bff;
      color: #fff;
      padding: 5px 10px;
      border-radius: 3px;
      cursor: pointer;
      margin-left: 10px;
   }  

     /* Style the book summary span icon */
     .book-details i {
         margin-left: 5px;
         margin-left: 10px;
     }

     /* Style the container div */
.cards_newBook {
    background-color: #6F61C0;
    padding: 20px;
    margin: 10px;
}

/* Style the child divs */
.card-newBook-single {
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 20px;
    margin-bottom: 20px;
    position: relative; /* Make it a positioned container */
    transition: background-color 0.3s; /* Add a smooth transition effect */
}


/* Style the hover box */
.hover-box {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8); /* Glass-like background color */
    opacity: 0; /* Initially transparent */
    display: flex;
    align-items: center;
    border-radius:10px;
    justify-content: center;
    transition: opacity 0.3s; /* Add a smooth transition effect */
}

/* Style the "See More" button */
.see-more {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s; /* Add a smooth transition effect */
}

/* Hover effect for the card */
.card-newBook-single:hover {
    background-color: #f5f5f5; /* Change background color on hover */
}

/* Show the hover box and button on card hover */
.card-newBook-single:hover .hover-box {
    opacity: 1;
}

/* Style the "See More" button on hover */
.card-newBook-single:hover .see-more {
    background-color: #0056b3; /* Change button color on hover */
}
  .general-info{
      border:1px solid black;
      border-radius:10px;
      background-color:red;
      color:white;
      margin-top:10%;
      margin-right:50px;
      padding-right:20%;
      justify-content:center;
    
  }
    .general-info img{
   border-radius:10px;
   width:40%;
  }
  .user-support{
      border:1px solid black;
      border-radius:10px;
      background-color:#9400FF;
      color:white;
      margin-top:5%;
      margin-right:50px;
  }
   .user-support img{
      border:1px solid black;
      border-radius:10px;
      background-color:#9400FF;
      color:white;
      margin-top:5%;
      margin-right:50px;
        border-radius:10px;
   width:40%;
  }
  .faqs{
       border:1px solid black;
      border-radius:10px;
      background-color:#27005D;
      color:white;
      margin-top:5%;
      margin-right:50px;
  }


  </style>
</head>

<body>

    <!--sidebar for user-->
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-AtiShare"></span>
            <span>ArtiShare <a href="#">
                 <i class="fa fa-window-close" aria-hidden="true" style="margin-left: 200px; color: white;" id="close-toggle" onclick="close_toggle()"></i>
                
              </a></span></h2>
        </div>
        
        <!--content for sidebar-->
        <div class="sidebar-menu">
             <ul>

                 <li>
                     <a href="https://articlesharing.co.in/ArtiShare/profile.php" ><span  class="fa fa-user" aria-hidden="true" ></span></span><span>Profile</span></a>
                 </li>
                 <li>
                     <a href="https://articlesharing.co.in/ArtiShare/subscription.php"><span  class="fa fa-info-circle" aria-hidden="true"></span></span><span>Subscription</span></a>
                 </li>
                   <li>
                     <a href=""><span  class="fa fa-bell" aria-hidden="true"></span></span><span>Notification</span></a>
                 </li>
                 <li>
                     <a href="https://articlesharing.co.in/ArtiShare/help.php" class="active"><span  class="fa fa-question" aria-hidden="true"></span></span><span>Help</span></a>
                 </li>
                 <li>
                     <a href="https://articlesharing.co.in/ArtiShare/fandq.php"><span  class="fa fa-tasks" aria-hidden="true"></span></span><span>F&Q</span></a>
                 </li>
                    <li>
                     <a href="logout.php"><span  class="fa fa-sign-out" aria-hidden="true"></span></span><span>Logout</span></a>
                 </li>
                 
             </ul>
        </div>
        
    </div>
    
    <!--main content-->
    <div class="main-content">
        <header>
         
                <h1>
                    <label for="nav-toggle">
                        <span class="fa fa-bars" style="color:var(--color_1)"></span>
                        </label>
                             <img src="Images/arti.png" width="140px" height="50px" alt="">
                    </h1>
                
                
                <!--<for  search bar area-->
                <div >
                    <h2>Help</h2>
                    
                </div>
                
              
               
                <div class="user-wrapper">
                   <img src="icon1.png" width="40px" height="40px" alt="">
                       <div>
                          <h4>Hi <?php echo $_SESSION['name']; ?></h4>
                         <small><a href="https://articlesharing.co.in/ArtiShare/profile.php">Your Profile</a></small>
                        </div>
                   </div>
                   
               </header>
               
       
        <section class="general-info">
                    <img src="https://img.freepik.com/free-vector/employees-giving-hands-helping-colleagues-walk-upstairs_74855-5236.jpg">
            <h2>General Information</h2>
            <p>Welcome to our Article Sharing website's Help Center. Here you'll find information and assistance for using our platform effectively.</p>
        </section>

        <section class="user-support">
             <img src="   https://www.revechat.com/wp-content/uploads/2022/02/117-Types-Process-Importance-of-Great-Customer-Support.jpg">
         
            <h2>User Support</h2>
            <p>If you encounter any issues or have questions about our platform, please feel free to contact our support team. We are here to assist you.</p>
            <div class="contact-info">
                <p>Email: articlesharinggroup@gmail.com</p>
                <p>Phone: +1-123-456-7890</p>
            </div>
        </section>

        <section class="faqs">
            <h2>Frequently Asked Questions (FAQs)</h2>
            <!-- Add your FAQs here -->
            <div class="faq">
                <h3>Q: How do I create an account?</h3>
                <p>A: To create an account, click on the 'Sign Up' button on the homepage and follow the registration process.</p>
            </div>

            <div class="faq">
                <h3>Q: How can I submit an article?</h3>
                <p>A: To submit an article, log in to your account, navigate to your profile, and click on the 'Submit Article' button.</p>
            </div>

            <!-- Add more FAQs as needed -->
        </section>
    </div>

           
   <script>
  function close_toggle() {
    var sidebar = document.getElementById("sidebar");
    var navToggle = document.getElementById("nav-toggle");

    if (sidebar.style.display === "none" || sidebar.style.display === "") {
        sidebar.style.display = "block";
        navToggle.checked = false; // Uncheck the checkbox to close the sidebar
    } else {
        sidebar.style.display = "none";
        navToggle.checked = true; // Check the checkbox to open the sidebar
    }
}
   </script>
</body>

</html>
