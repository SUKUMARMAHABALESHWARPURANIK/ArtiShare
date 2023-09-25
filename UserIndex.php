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
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S        482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
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

    /*Style the child divs */
            .             card-newBook-single {
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
           .col-left,.col-right{
               /*border:1px solid black;*/
               float:left;
               background-color:#fff;
               border-radius:10px;           
               padding:1%;
    
           }           
           .col-left{
               width:28%;
           }
           .col-left h3{
               border:1px solid black;
               border-radius:10px;
               color:white;
               background:blue;
               border:none;            
           }
            .col-right{
                width:72%;
                border-left:1px solid black;
            }
            .col-right .comments{
                  overflow:auto;
                  background:#f5f5f5;
                  padding:1%;
            }
            .content{
                overflow:auto;
            }
            .col-right .comments h4{           
                padding:5px;
            }
            .col-right .comments h5,p{
                background:white;
                padding:5px;
    
            }
           .comment-box,.name{
               width:98%;
               margin-top:10px;
               padding:1%;
               border-radius:5px;
           }
           .button{
               padding:1%;
               margin-top:10px;
    
           }
           .dropdown{
              overflow:hidden;
           }
           .dropdown .drop-content{
               height:200px;;
               width:300px;
               background:blue;
               padding:5px;
               position:absolute;
               border-radius:10px;
               z-index:2;
               border:1px solid white;
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
                     <a href="https://articlesharing.co.in/ArtiShare/profile.php" class="active"><span  class="fa fa-user" aria-hidden="true" ></span></span><span>Profile</span></a>
                 </li>
                 
                  <li>
                     <a href="https://articlesharing.co.in/ArtiShare/Admin_info/insert_post.php" ><span  class="fa fa-pencil" aria-hidden="true" ></span></span><span>Post article</span></a>
                 </li>
                  <li>
                     <a href="https://articlesharing.co.in/ArtiShare/Admin_info/adminIndex.php" ><span   class="fa fa-clipboard" aria-hidden="true" aria-hidden="true" ></span></span><span>All articles</span></a>
                 </li>
                 <li>
                     <a href="https://articlesharing.co.in/ArtiShare/subscription.php"><span  class="fa fa-info-circle" aria-hidden="true"></span></span><span>Subscription</span></a>
                 </li>
                   <li>
                     <a href="#"><span  class="fa fa-bell" aria-hidden="true"></span></span><span class="dropdown"><span style="font-size:18px;" onclick="show_hide()">Notification</span>
                     <span class="drop-content" style="font-size:18px;display:none;" id="drop-content">

                     <?php
                      require 'connection.php';
                     //get all notification of comment
                     $q='SELECT `user`,`post_id` FROM `comment`';
                     $r=mysqli_query($conn,$q);
                     if($r){
                         while($row=mysqli_fetch_Assoc($r)){
                             $user=$row['user'];
                             $post_id=$row['post_id'];
                         
                                                    ?>
                                                    <span style="font-size:15px;height:200px;color:white ;background-color:white;">
                                                    <p style="font-size:15px;color:white ;background-color:blue;border-radius:5px;"> <a  href="view.php?id=<?php echo $post_id;?>"><?php echo $user;?>commented on your post </p></a>
                                                    </span></a>
                                                    <?php
                     
                         }
                         }else{
                           echo 'query problem'.$q;
                     }
                  
                     ?>
                     <!--<css and html comment-->
                 
                     
                 </li>
                 <li>
                     <a href="https://articlesharing.co.in/ArtiShare/help.php"><span  class="fa fa-question" aria-hidden="true"></span></span><span>Help</span></a>
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
                <div class="search-wrapper">
                    <span class="fa fa-search"></span>
                    <input type="search" placeholder="search here"/>
                    
                </div>
                
              
               
                <div class="user-wrapper">
                    
                   <!--<img src="icon1.png" width="40px" height="40px" alt="">-->
                       <div>
                          <h4>Hi <?php echo $_SESSION['name']; ?></h4
                          <?php
                          
                          ?>
                          
                         <small><a href="https://articlesharing.co.in/ArtiShare/profile.php">Your Profile</a></small>
                        </div>
                   </div>
                   
               </header>
               
               <div id="google_element"></div>
               <script src="https://translate.google.com/translate_a/element.js?cb=loadGoogleTransalte"></script>
               <script>
               function loadGoogleTransalte(){
                   new google.translate.TranslateElement("google_element")
                   
               }
               </script>
     
     
        <main>
             <h1>Books category</h1>
            <div class="cards" > 
                  <!--<h1>Books category</h1>-->
                <div class="card-single" >
                  
                    <div>
                        <h1>Comedy</h1>
                        <span><a href="category.php">see more in comedy</a></span>
                    </div>
                    <div>
                        <span><img src="Images/c.png"></span>
                    </div>
                </div>
                
                 <div class="card-single">
                    <div>
                        <h1>Mystery</h1>
                        <span><a href="category.php">see more in mystery</a></span>
                    </div>
                    <div>
                          <span><img src="Images/ar.png"></span>
                    </div>
                </div>
                
                <div class="card-single">
                    <div>
                        <h1>Science Fiction</h1>
                        <span><a href="category.php">see more in  science fiction</a></span>
                    </div>
                    <div>
                          <span><img src="Images/ufo.png"></span>
                    </div>
                </div>
                
                  <div class="card-single">
                    <div>
                        <h1>Biography</h1>
                        <span><a href="#">see more in biography</a></span>
                    </div>
                    <div>
                           <span><img src="Images/cv.png"></span>
                    </div>
                </div>
                 <div class="card-single">
                    <div>
                        <h1>Science and Nature</h1>
                        <span><a href="#">see more in science and nature</a></span>
                    </div>
                    <div>
                         <span><img src="Images/ml.png"></span>
                    </div>
                </div> <div class="card-single">
                    <div>
                        <h1>Thriller</h1>
                        <span><a href="#">see more in thriller</a></span>
                    </div>
                    <div>
                           <span><img src="Images/th.png"></span>
                    </div>
                </div> 
                <div class="card-single">
                    <div>
                        <h1>Historical Fiction</h1>
                        <span><a href="#">see more in historical fiction</a></span>
                    </div>
                    <div>
                            <span><img src="Images/hi.png"></span>
                    </div>
                </div>
                 
            </div><br><br>
            
            
            <!--card2 for books-->
         <h1>New arrival</h1>
<div class="cards_newBook">          
    <div class="card-newBook-single">
        <div class="book-image">
            <span><img src="Images/comedy1.png"></span>
        </div>
        <div class="book-details">
            <h1>Title: The Middle-Class Gentleman</h1>
            <h3>Author: Moliere</h3>
            <p>Category: comedy</p>
            <p>Summary: The Middle-Class Gentleman is a five-act French comedy play written,
            dramatized, and acted by the French playwright Jean-Baptiste Poquelin,
            who is popularly known by his stage name Molière.
            Remembered as one of the greatest masters of comedy in Western literature,
            his notable plays include Tartuffe; The Misanthrope; The Learned Women..
            </p>
            <span>Read <i class="fa fa-book" aria-hidden="true"></i></span>
        </div>
    </div>
</div>
<div class="cards_newBook">          
    <div class="card-newBook-single">
        <div class="book-image">
            <span><img src="Images/comedy.png"></span>
        </div>
        <div class="book-details">
            <h1>Title: Volpone; Or, The Fox</h1>
            <h3>Author: Ben Jonson</h3>
            <p>Category: comedy</p>
            <p>Volpone is a comedy which exposes the greed and lust of human mind written by Ben Jonson,
            an English Playwright who popularized the comedy of humors with his remarkable plays such as
            The Alchemist and Every Man in His Humour. Volpone, a lawyer and childless greedy man
            pretends to be on his deathbed, to annoy his clients Voltore, Corbaccio, and C..
            </p>
            <span>Read <i class="fa fa-book" aria-hidden="true"></i></span>
        </div>
    </div>
</div>


            <!--article section-->
            
            <div>
                <h1>Articles</h1>
            </div>
            
                
                <div class="recent-grid">
                  <div class="projects">
                       <div class="card">
                          <div class="card-header">
                            <h3>Recent Articles</h3>
                           <!--<a href="https://articlesharing.co.in/ArtiShare1/ArtiShare/viewprofile.php"><button> See all<span class="fa fa-arrow-right"></span></button></a>-->
                           
                         
                           </div>
                             <div class="content">
                       
                               <div class="col-left">
                                   <h3 align="center">All post</h3>
                                   
                                   <?php 
                                      $q='SELECT id,title FROM post';
                                      $r=mysqli_query($conn,$q);
                                      
                                     if ($r) {
                                    if (mysqli_num_rows($r) > 0) {
                                        while ($row = mysqli_fetch_assoc($r)) {
                                            $id = $row['id'];
                                            $title = $row['title'];

                                          echo '<div><a href="?id=' . $id . '">' . $title . '</a></div>';
                                           }
                                       } else {
                                                echo 'No posts found.';
                                            }
                                        } else {
                                            echo 'Problem in query: ' . mysqli_error($conn);
                                        }
                                        ?>
                                   <!--set up all post title-->
                             
                               </div>
                               
                                <!--<column right-->
                                <div class="col-right">
                                    <?php
                                    if(isset($_GET['id'])){
                                        $_GET['id']=$_GET['id'];
                                    }else{
                                            $_GET['id']=1;
                                    } 
                                    
                                    $q='SELECT * FROM post WHERE id="'.$_GET['id'].'"';
                                    $r=mysqli_query($conn,$q);
                                    if($r){
                                        if(mysqli_num_rows($r)>0){
                                            while($row=mysqli_fetch_assoc($r)){
                                                $id=$row['id'];
                                                $title=$row['title'];
                                                $content=$row['content'];
                                                $date=$row['date'];
                                                $status=$row['status'];
                                                
                                                
                                                echo '<h3 align="center">'.$title.'</h3>';
                                                echo $content;
                                            }
                                        }else{
                                            echo 'no post';
                                        }
                                        
                                    }else{
                                        echo 'problem in query'.$q;
                                    }
                                    
                                    ?>
                                    <hr>
                                      <div class="comments">
                                          
                                           <h3>comments</h3>
                                           <div id="comment_area">
                                           <?php
                                              $q='SELECT user,text,date FROM comment WHERE post_id="'.$_GET['id'].'"';
                                              $r=mysqli_query($conn,$q);
                                              
                                              if($r){
                                                  if(mysqli_num_rows($r)>0){
                                                       while($row=mysqli_fetch_assoc($r)){
                                                           $user=$row['user'];
                                                           $text=$row['text'];
                                                           $date=$row['date'];
                                                           
                                                           echo '<h5>'.$user.' ';
                                                           echo '<small style="color:5f5f5f;">  '.$date.'</small></h5>';
                                                           echo '<p>'.$text.'</p>';
                                                           
                                                           echo '<hr>';
                                                       }
                                                  
                                                
                                              }else{
                                                  echo 'no comment to this post';
                                                
                                                }
                                              } else{
                                                  echo $q.'problem in query';
                                              }
                                           ?>
                                          </div>
                                           
                                         <!--input field for user name-->
                                           <input type="text" placeholder="write your name" class="name" id="user_name" required/>
                                           <textarea placeholder="write your comment" class="comment-box" id="comment_text" required></textarea>
                                           <button class="button" onclick="insert_comment()" style="background-color:blue;color:white;border-radius:10px;width:60px;height:30px;">Submit</button>
                                       </div>
                               </div>
                               
                        </div>
                        <!--javascript jquery file download jquery-3.1.1.min.js-->
                        <script src="js/jquery-3.1.1.min.js"></script>
                        <script>
                            //this function will execute with submit button
                            function insert_comment(){
                                //send data to 2nd file for background process
                                $.post("insert_comment.php",
                                {
                                    user_name:$("#user_name").val(),
                                    text:$("#comment_text").val(),
                                    post_id:<?php echo $_GET['id'];?>
                                },
                                function(data,status){
                                    //empty all the boxes
                                    $("#user_name").val('');
                                     $("#comment_box").val('');
                                     
                                     //add the comment at the end of this div
                                     
                                     $("#comment_area").append(data);
                                }
                                
                                
                                );
                            }
                        </script>
                
             
            </div>
        </div>
        
        <!--for new author-->
        <?php 
// Initialize the search query variable
$searchQuery = "";

// Check if the search form was submitted
if (isset($_GET["submit"])) {
    $searchQuery = $_GET["search"];
    // Add a condition to the SQL query to filter by name
    $query = "SELECT name, phone, country, designation, image FROM tb_upload WHERE name LIKE '%$searchQuery%'";
} else {
    // If no search query is provided, retrieve all profiles
    $query = "SELECT name, phone, country, designation, image FROM tb_upload";
}

$result = mysqli_query($conn, $query);
?>
        <div class="customers">
            <div class="card">
                <div class="card-header">
                    <h3>NEW authors</h3>
                    <a href="https://articlesharing.co.in/ArtiShare/viewprofile.php"><button> See all<span class="fa fa-arrow-right"></span></button></a>
                </div>
                
                <div class="card-body">
                     <div class="customer">
                         <div class="info">
                             
                         
                         <div>
                                   <?php if (mysqli_num_rows($result) > 0): ?>
                 
                    <table border="1">
                        <tr>
                            <th>Person</th>
                          
                            <th>Country</th>
                           
                            <th>Profile pic</th>
                        </tr>

                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo $row["name"]; ?></td>
                               
                                <td><?php echo $row["country"]; ?></td>
                               
                                <td><img src="uploads/<?php echo $row["image"]; ?>" alt="User Image" width="60px" height="70px" style="border-radius:50%;"></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                <?php else: ?>
                    <p>No user profiles found.</p>
                <?php endif; ?>
                         </div>
                     </div>
                     
                     
                 </div>
                 
             
               
                 
                 
             
              </div>
           </div>
        </div>
    </div>
  </main>
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
   
   <script>
       function show_hide(){
           var drop_cont=document.getElementById('drop-content');
           if(drop_cont.style.display==='none'){
               drop_cont.style.display='block';
           }else{
               drop_cont.style.display='none';
           }
       }
   </script>
</body>

</html>
