<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <link rel="stylesheet"  href="style.css">
</head>
<body>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Home</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="country.php?order=Name&num=0">Countries</a></li>
      <li><a href="city.php?order=Name&num=0">Cities</a></li>
      <li><a href="languages.php?num=0">Languages</a></li>
	  <li><a href="delete.php?name=">delete</a></li>
    </ul>
</nav>
 <?php 
    @mysql_connect("localhost","root","admin");
    mysql_select_db("world_x");
    $order ="Language" ;
    $pages = $_GET['num'];
    $limit = 5;
    $next = $pages + 1;
    echo "<h1 align = 'center'>"."Countries"."</h1>";
    echo "<div class='container-fluid'>
    <div id='tfheader'>
     <a href='languages.php?order=$order&num=$next'> <button>Next page</button></a>
    <form id='tfnewsearch' method='get' action='country_show.php'>

            <input type='hidden' name='catagory' value='Language'>
            <input type='text' class='tftextinput' name='name' size='21' maxlength='120'><input type='submit' value='search' class='tfbutton'>
    </form>
  <div class='tfclear'></div>
  </div>";
 /* $a = mysql_query(SELECT COUNT(DISTINCT Language)FROM CountryLanguage);
  echo "<br>";
  while($row = mysql_fetch_array($a)){
  echo "<h2 align='center'>'.$row.'</h2>"
  
  }*/
  
    $rows = mysql_query('select * from countrylanguage order by '. $order.' limit '.$pages*$limit.','.$limit );
    echo '<br>';
    while($row = mysql_fetch_array($rows)){
      $countryname = $row['Language'];
    	echo  "<div class = 'well'>"."<h3 align = 'center'>"."<a href=\"country_show.php?catagory=Language&name=$countryname\" >".$row['Language']."</a>"."</h3>"."</div>";
    }
   ?>

</body>
</html>