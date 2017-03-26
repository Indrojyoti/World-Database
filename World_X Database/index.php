<html>
<head>
  <title></title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <link rel="stylesheet"  href="style.css">
 <style>

 body{
  background-image: url(img/World.jpg);
  background-position: center center;
  background-repeat: no-repeat;
   background-attachment: fixed;
    background-size: cover;
      background-color: #464646;
 }
 .centered {
  position: fixed;
  top: 50%;
  left: 50%;
  margin-top: -50px;
  margin-left: -100px;
}
.wrapper {
    text-align: center;
}

.button {
    position: relative;
    top: 50%;
}
 </style>
 </head>
<body >
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Home</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="country.php?order=Name&num=0">Countries</a></li>
      <li><a href="city.php?order=Name&num=0">Cities</a></li>
      <li><a href="languages.php?num=0">Languages</a></li>
	  <li><a href="delete.php?name=">delete</a></li>
    </ul>
  </div>
</nav>

<div class="wrapper">
  <h1 style = "color:white">World_x</h1>
  <?php 
  $countryname = '';
  $xx='';
    echo "<a href=\"country_show.php?catagory=Highest&name=$countryname\" ><button class='button btn btn-success'>Highest Life expectancy </button>";
     echo "<a href=\"country_show.php?catagory=Capital&name=$countryname\" ><button class='button btn btn-success'>Countries and Capitals </button>";
	 echo "<a href=\"country_show.php?catagory=Spoken1&name=$xx\" ><button class='button btn btn-success'>Most spoken languages </button>";
	 echo "<a href=\"country_show.php?catagory=official1&name=$xx\" ><button class='button btn btn-success'>Official languages of countries </button>";
	 echo "<a href=\"country_show.php?catagory=head1&name=$xx\" ><button class='button btn btn-success'>Head Of States </button>";
	 echo"<br><br>";
	 echo "<a href=\"country_show.php?catagory=govt&name=$xx\" ><button class='button btn btn-success'>Types of governments </button>";
	  echo "<a href=\"country_show.php?catagory=popu&name=$xx\" ><button class='button btn btn-success'>Most Populated Cities </button>";
	   echo "<a href=\"country_show.php?catagory=gnp&name=$xx\" ><button class='button btn btn-success'>Gross National Product</button>";
	 
	 
	 
	 
	 
	 
	 
     ?>
</div>

	
</body>
</html>