<html>
<head>
  <title></title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <link rel="stylesheet"  href="style.css">
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
	  <li><a href="delete.php?name">delete</a></li>

    </ul>
  </div>
</nav>
	<div class="container-fluid">
		
  <?php 
 // $name = "";
    $link=@mysql_connect("localhost","root","admin");
    mysql_select_db("world_x");
	$name = $_GET['name'];
	echo "<h1 align = 'center'>"."Delete Country"."</h1>";
    echo "<div class='container-fluid'>
    <div id='tfheader'>
     <form>
            <input type='text' class='tftextinput' name='name' size='21' maxlength='120'><input type='submit' value='delete' class='tfbutton'>
    </form>
  <div class='tfclear'></div>
  </div>";
  
	
	$query = "delimiter //
	SET FOREIGN_KEY_CHECKS=0;
	delete from country where Name ="."'"."$name"."'
	delimiter ;";
	//$q="SET FOREIGN_KEY_CHECKS=0";
	//$p = mysql_query($q);
		$result = mysql_query($query);	
   echo '<br>';
  // if(is_resource($result)){
	 if(mysql_query($result)){
    echo "Records were deleted successfully.";
} 
   //}
	
   ?>
</div>
</body>
</html>