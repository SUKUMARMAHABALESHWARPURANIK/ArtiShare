<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['uname'])) {
    header('location: https://articlesharing.co.in/ArtiShare/User_info/login.php');
    die();
}

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $country = $_POST["country"];
    $designation = $_POST["designation"];

    if ($_FILES["image"]["error"] === 4) {
        echo "<script>alert('Image does not exist');</script>";
    } else {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $imageExtension = strtolower($imageExtension);

        if (!in_array($imageExtension, $validImageExtensions)) {
            echo "<script>alert('Invalid image extension');</script>";
        } else if ($fileSize > 100000000000000000000) {
            echo "<script>alert('Image size is too large');</script>";
        } else {
            $newImageName = uniqid() . '.' . $imageExtension;
            $uploadDirectory = 'uploads/';
            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0755, true);
            }
            move_uploaded_file($tmpName, $uploadDirectory . $newImageName);
            $query = "INSERT INTO tb_upload (name, phone, country, designation, image) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sssss", $name, $phone, $country, $designation, $newImageName);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
        
              
                echo "<script>alert('Successfully added');window.location.href='https://articlesharing.co.in/ArtiShare/profile.php';</script>";
            } else {
                echo "<script>alert('Error in preparing the SQL statement');</script>";
            }
        }
    }
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
 .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="tel"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-group select {
            height: 40px;
        }

        .btn-submit {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #0056b3;
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
                     <a href="https://articlesharing.co.in/ArtiShare/subscription.php"><span  class="fa fa-info-circle" aria-hidden="true"></span></span><span>Subscription</span></a>
                 </li>
                   <li>
                     <a href=""><span  class="fa fa-bell" aria-hidden="true"></span></span><span>Notification</span></a>
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
                <div>
                    
                    <h2>ArtiProfile</h2>
                    
                    
                </div>
            
               
                <div class="user-wrapper">
                   <img src="icon1.png" width="40px" height="40px" alt="">
                       <div>
                          <h4>Hi <?php echo $_SESSION['name']; ?></h4>
                         <small><a href="https://articlesharing.co.in/ArtiShare/viewprofile.php?user_id=<?php echo $_SESSION['name']; ?>">View Profile</a></small>
                        </div>
                   </div>
                   
               </header>
               <br><br>
              <div class="container">
        <h1>Create profile </h1>
        <form class="" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" placeholder="Enter a number" oninput="validateInput(this)" required>
       
                
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <select id="country" name="country" required>
                
    <option value="  " selected>Select a country</option>
  <option value="Not Specified">Not Specified</option>
<option value="Afghanistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antarctica">Antarctica</option>
<option value="Antigua and Barbuda">Antigua and Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
<option value="Botswana">Botswana</option>
<option value="Bouvet Island">Bouvet Island</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
<option value="Brunei Darussalam">Brunei Darussalam</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote d'Ivoire">Cote d'Ivoire</option>
<option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
<option value="Cuba">Cuba</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="France, Metropolitan">France, Metropolitan</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Territories">French Southern Territories</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-Bissau">Guinea-Bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
<option value="Korea, Republic of">Korea, Republic of</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Ky

                </select>
            </div>
            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="text" id="designation" name="designation" required>
         
             <label for="designation">Upload image:</label>
                <input type="file" name="image" id="image" accept=".jpg,.jpeg,.png" value="" required>
                </div><br><br>
            <button type="submit" name="submit" class="btn-submit">Submit</button>
        
        </form>

<!--//     // Query to retrieve user information including uploaded images-->
<!--//     $query = "SELECT name, phone, country, designation, image FROM tb_upload";-->
<!--//     $result = mysqli_query($conn, $query);-->

<!--//     if (mysqli_num_rows($result) > 0) {-->
<!--//         echo '<table border="1">';-->
<!--//         echo '<tr><th>Name</th><th>Phone</th><th>Country</th><th>Designation</th><th>Image</th></tr>';-->
        
<!--//         while ($row = mysqli_fetch_assoc($result)) {-->
<!--//             echo '<tr>';-->
<!--//             echo '<td>' . $row["name"] . '</td>';-->
<!--//             echo '<td>' . $row["phone"] . '</td>';-->
<!--//             echo '<td>' . $row["country"] . '</td>';-->
<!--//             echo '<td>' . $row["designation"] . '</td>';-->
<!--//             echo '<td><img src="uploads/' . $row["image"] . '" alt="User Image" width="100"></td>';-->
<!--//             echo '</tr>';-->
<!--//         }-->
        
<!--//         echo '</table>';-->
<!--//     } else {-->
<!--//         echo 'No user data found.';-->
<!--//     }-->

<!--//     mysqli_close($conn);-->

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
