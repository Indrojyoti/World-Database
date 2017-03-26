<html>
<head>
  <title></title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <link rel="stylesheet"  href="style.css">
  <style type="text/css">
  #tfheader{
    background-color:#c3dfef;
  }
  #tfnewsearch{
    float:right;
    padding:20px;
  }
  .tftextinput{
    margin: 0;
    padding: 5px 15px;
    font-family: Arial, Helvetica, sans-serif;
    font-size:14px;
    border:1px solid #0076a3; border-right:0px;
    border-top-left-radius: 5px 5px;
    border-bottom-left-radius: 5px 5px;
  }
  .tfbutton {
    margin: 0;
    padding: 5px 15px;
    font-family: Arial, Helvetica, sans-serif;
    font-size:14px;
    outline: none;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    color: #ffffff;
    border: solid 1px #0076a3; border-right:0px;
    background: #0095cd;
    background: -webkit-gradient(linear, left top, left bottom, from(#00adee), to(#0078a5));
    background: -moz-linear-gradient(top,  #00adee,  #0078a5);
    border-top-right-radius: 5px 5px;
    border-bottom-right-radius: 5px 5px;
  }
  .tfbutton:hover {
    text-decoration: none;
    background: #007ead;
    background: -webkit-gradient(linear, left top, left bottom, from(#0095cc), to(#00678e));
    background: -moz-linear-gradient(top,  #0095cc,  #00678e);
  }
  /* Fixes submit button height problem in Firefox */
  .tfbutton::-moz-focus-inner {
    border: 0;
  }
  .tfclear{
    clear:both;
  }
</style>

 </head>
<body >
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
  </div>
</nav>
	<div class="container-fluid">
		
  <?php 
    @mysql_connect("localhost","root","admin");
    mysql_select_db("world_x");
    $order = $_GET['order'];
    $pages = $_GET['num'];
    $limit = 5;
    $next = $pages + 1;
    echo "<h1 align = 'center'>"."Cities"."</h1>";
    echo "<div class='container-fluid'>
    <div id='tfheader'>
    <select name='forma' onchange='location = this.value'>
  <option value = 'city.php?order=Name'>Order by CityName</option>
  <option value = 'city.php?order=Population&num=0'>Order by Population</option>
  </select> 
  <a href='city.php?order=$order&num=$next'> <button>Next page</button></a>
    <form id='tfnewsearch' method='get' action='country_show.php'>
            <input type='hidden' name='catagory' value='city''>
            <input type='text' class='tftextinput' name='name' size='21' maxlength='120'><input type='submit' value='search' class='tfbutton'>
    </form>
  <div class='tfclear'></div>
  </div>";
    $rows = mysql_query('select * from city order by '. $order.' limit '.$pages*$limit.','.$limit);
    echo '<br>';
	if(is_resource($rows)){
    while($row = mysql_fetch_array($rows)){
      $countryname = $row['Name'];
    	echo  "<div class = 'well'>"."<h3 align = 'center'>"."<a href=\"country_show.php?catagory=city&name=$countryname\" >".$row['Name']."</a>"."</h3>"."</div>";
    }
	}
   ?>
</div>
</body>
</html>