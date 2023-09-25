<?php
session_start();
 require 'connection.php';


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
        

      
    </style>
            <script src="jquery-3.1.1.min.js"></script>
              <!--online link for tinymce-->
            <script type="text/javascript" src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
            <script>
          tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
                
            </script>
            
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
                     <a href="https://articlesharing.co.in/ArtiShare/UserIndex.php" ><span  class="fa fa-home" aria-hidden="true" ></span></span><span>Home</span></a>
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
                             <img src="arti.png" width="140px" height="50px" alt="">
                    </h1>

                <div >
                    <h2>Add your post</h2>
                    
                </div>
                </header>
                
                <div class="Insert_content">
                    <!--column left-->
                    <div class="col-left" style="width:67%;"><br><br>
                        <h3 align="center">Add new post here</h3><br><br>
                        <input type="text" id="title" style="border:1px solid black;margin-left:10px;padding:1%;border-radius:10px;width:60%;" placeholder="enter the title here"  required>
                      
                    </div>
                    
                    <!--column right-->
                    <div class="col-right" style="width:28%;padding:1%;margin-left:500px;">
                        <button class="button" id="publish" style="width:60px;height:20px;background-color:blue;color:white;">Publish</button>
                         <!--<button class="button" id="save" style="width:60px;height:20px;background-color:blue;color:white;">Save</button>-->
                    </div>
                      <textarea class="tinymce" id="post" style="margin-left:10px;margin-right:10px; height:300px;width:700px;" ></textarea>
                </div>
               

             <script src="jquery-3.1.1.min.js"></script>
                <script>
                    $('document').ready(function(){
                        
                        //publish button set up
                        $('#publish').click(function(){
                             var title=$("#title").val();
                             var post_text=tinymce.get('post').getContent();
                              
                             //send this now to 2 file
                             
                             $.post("post_process.php",{
                                 title:title,
                                 post_text:post_text
                             },
                             function (data,status){
                                //  alert(data);
                                if(data=="successfullyd done"){
                                    location.href='https://articlesharing.co.in/ArtiShare/UserIndex.php';
                                }else{
                                    alert(data);
                                }
                             });
                        });
                        
                        //save button set up
                   
                        $('#save').click(function(){
                             var title=$("#title").val();
                             var post_text=tinymce.get('post').getContent();
                              
                             //send this now to 2 file
                             
                             $.post("post_process.php",{
                                 title:title,
                                 post_text:post_text,
                                 save:'yes'
                             },
                             function (data,status){
                                //  alert(data);
                                if(data=="successfullyd done"){
                                    location.href='https://articlesharing.co.in/ArtiShare/UserIndex.php';
                                }else{
                                    alert(data);
                                }
                             });
                        });
                    });
                    
                    
                </script>
   
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
