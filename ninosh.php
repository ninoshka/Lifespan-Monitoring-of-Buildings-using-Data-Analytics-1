<?php
session_start();
$database ='project';
$username = 'root'; 
$password = '';


$connection=mysql_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
  <style>

 #map {
        height: 90%;
      width:95%;
      }
      
     
 h2 {
    text-align: center;
}
table {
	border: 3px solid black;
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: center;
    padding: 15px;
	border: 3px solid black;
}


tr:nth-child(even){background-color: #f2f2f2}

th {
	border: 3px solid black;
    background-color: #4CAF50;
    color: white;
}
<!-- strt of new css-->

  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
  h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;      
      font-size: 20px;
      color: #111;
  }
  .container {
      padding: 80px 120px;
  }
  .person {
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.7;
  }
  .person:hover {
      border-color: #f1f1f1;
  }
  .carousel-inner img {
      -webkit-filter: grayscale(90%);
      filter: grayscale(90%); /* make all photos black and white */ 
      width: 100%; /* Set width to 100% */
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
      background: #2d2d30;
      color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail p {
      margin-top: 15px;
      color: #555;
  }
  .btn {
      padding: 10px 20px;
      background-color: #333;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
  }
  .modal-header, h4, .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-header, .modal-body {
      padding: 40px 50px;
  }
  .nav-tabs li a {
      color: #777;
  }
  #googleMap {
      width: 100%;
      height: 400px;
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
  }  
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 11px !important;
      letter-spacing: 4px;
      opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
  }
  .dropdown-menu li a {
      color: #000 !important;
  }
  .dropdown-menu li a:hover {
      background-color: red !important;
  }
  footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 32px;
  }
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  
  .form-control {
      border-radius: 0;
  }
  textarea {
      resize: none;
  }
  </style>
</head>
<body id="home" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#home">Prevention is better than cure</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#home">HOME</a></li>
        <li><a href="#idea">THE IDEA</a></li>
        <li><a href="#awareness">AWARENESS</a></li>
        <li><a href="#check">CHECK HEALTH</a></li>
        </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" style=" width:100%; height: 750px !important;" role="listbox">
      <div class="item active">
        <img src="1.png" alt="New York" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Mass Destruction</h3>
          <p>What people face after building collapses.</p>
        </div>      
      </div>

      <div class="item">
        <img src="2.png" alt="Chicago" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Rescue Operations</h3>
          
        </div>      
      </div>
    
      <div class="item">
        <img src="3.png" alt="Los Angeles" width="1200" height="700">
        <div class="carousel-caption">
         </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<div id="idea" class="container text-center">
  <h3>THE IDEA</h3>
  <p><em>Save Lives!</em></p>
  <p align="justify">The built environment usually constitutes a very important part of the real capital of a nation. Keeping in mind the past events of frequent building collapses that have been witnessed, lifespan monitoring of buildings would prove to be quite beneficial to our local masses. Structural audit plays a key role in monitoring of the lifespan. The service life depends mainly on the construction of a building (RCC or load bearing),age of the building, wear and tear of the building(health of columns etc.) ,environmental conditions (topography) and the maintenance work carried out  in order to maintain the health of the building and protecting it from a collapse. By considering the above main factors as per the structural audit  a  model will be created which after assessing these factors and analyzing the data available with us, working coherently with different data analysis algorithms would determine the lifespan of a building through advanced technologies such as, Data Analytics. </p>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <p class="text-center"><strong>Amey Kharote</strong></p><br>
      
        <img src="amey.jpg" class="img-circle person" style=" width:65%; height: 225px !important";>
      
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Shannon Fernando</strong></p><br>
   <img src="shan.jpg" class="img-circle person" style=" width:65%; height: 225px !important";>
      
      
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Ninoshka Pinto</strong></p><br>
      <img src="nins.jpg" class="img-circle person" style=" width:65%; height: 225px !important";>
      </div>
  </div>
</div>

<!-- Container (TOUR Section) -->
<div id="awareness" class="bg-1">
  <div class="container">
    <h3 class="text-center">AWARENESS</h3>
    <p class="text-center">Read the latest news here!<br> Know why maintenance is important</p>
       
    <div class="row text-center">
      <div class="col-sm-3">
        <div class="thumbnail">
          <img src="bhivandi.png" width="400" height="300">
          <p><strong>Maharashtra: 8 killed,23 hurt in Bhiwandi building collapse as heavy rains wreak havoc</strong></p><br><br>
         <a href="http://www.ndtv.com/mumbai-news/2-storey-building-collapses-in-bhiwandi-many-feared-trapped-1441211" button class="btn" >READ NOW</button> </a>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="thumbnail">
           <img src="bandra.png" width="400" height="300">
          <p><strong>Bandra East: Six dead as 5-storey structure collapses in Behrampada, rescue operations underway</strong></p><br>
         <a href="http://indianexpress.com/article/cities/mumbai/mumbai-5-storey-building-structure-collapses-behrampada-bandra-east-rescue-operations-underway-3080513/" button class="btn">READ NOW</button></a>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="thumbnail">
          <img src="baby.png" width="400" height="300">
          <p><strong>Baby pulled alive from wreckage of five-storey building that collapsed in Mumbai as search continues for dozens of trapped people</strong></p>
        <a href="http://www.mercurynews.com/2013/09/27/india-building-collapse-8-killed-dozens-trapped-in-mumbai/" button class="btn" >READ NOW</button></a>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="thumbnail">
          <img src="m3.png" width="400" height="300">
          <p><strong>Importance of maintenance. Know how to maintain your building's health and increase its lifespan</strong></p>
          <p align="justify"></p>
          <a href ="http://traditionalbuildingshealthcheck.org/why-maintain/" button class="btn" >READ NOW</button></a>
        </div>
      </div>        
      </div>
    </div>
  </div>
  
 
<!-- Container (Contact Section) -->
<div id="check" class="container">
  <h3 class="text-center">KNOW THE LIFESPAN OF YOUR BUILDING</h3>
    <div class="row">
     <div class="col-sm-6 col-sm-offset-3 form-group">
     <form id "contactForm" method="POST" action="index1.php"> 
      <input class="form-control" id="name" name="name" placeholder="ENTER AREA" type="text" required>
        </div></div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3  form-group">
          <input class="form-control" id="email" name="firstname" placeholder="ENTER BUILDING NAME" type="text" required>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-3 col-sm-offset-4 form-group">
          <button class="btn pull-right" type="submit">CHECK LIFESPAN</button>
        </div>
      </div> </form>
    </div>
<br>
<br>


</body>
</html>
