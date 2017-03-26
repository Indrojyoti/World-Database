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
	  <li><a href="delete.php?name=">delete</a></li>

    </ul>
  </div>
</nav>
	<div class="container-fluid">
		
  <?php 
  //$name = "";
    @mysql_connect("localhost","root","admin");
    mysql_select_db("world_x");
    $cato = $_GET['catagory'];
    $name = $_GET['name']; 
	if($cato == 'city') {
		$query = "SELECT * from ".$cato." where Name ="."'"."$name"."'";
		$result = mysql_query($query);	
		while ($row=mysql_fetch_array($result)) {
			
			echo "<table class='table'>";
			echo "<tr><td>Name</td><td>".$row['Name']."</td></tr>";
			echo "<tr><td>ID</td><td>".$row['ID']."</td></tr>";
			echo "<tr><td>Country code</td><td>".$row['CountryCode']."</td></tr>";
			echo "<tr><td>District</td><td>".$row['District']."</td></tr>";
			echo "<tr><td>Populaton</td><td>".$row['Population']."</td></tr>";
			echo "</table>";
		}
		
	}
	else if($cato=='country'){
		$query = "SELECT * from ".$cato." where Name ="."'"."$name"."'";
		$result = mysql_query($query);	
		$str="";
		while ($row=mysql_fetch_array($result)) {
		echo "<table class='table'>";
			echo "<tr><td>Name</td><td>".$row['Name']."</td></tr>";
			$str=$row['Code'];
			echo "<tr><td>Code</td><td>".$row['Code']."</td></tr>";
			echo "<tr><td>Continent</td><td>".$row['Continent']."</td></tr>";
			echo "<tr><td>Region</td><td>".$row['Region']."</td></tr>";
			echo "<tr><td>SurfaceArea</td><td>".$row['SurfaceArea']."</td></tr>";
			echo "<tr><td>Population</td><td>".$row['Population']."</td></tr>";
			echo "<tr><td>Life Expectancy</td><td>".$row['LifeExpectancy']."</td></tr>";
			echo "<tr><td>Local Name</td><td>".$row['LocalName']."</td></tr>";
			echo "<tr><td>Government Form</td><td>".$row['GovernmentForm']."</td></tr>";
			echo "<tr><td>Head Of State</td><td>".$row['HeadOfState']."</td></tr>";
		echo "</table>";
		}
		$q="SELECT * from city where CountryCode="."'"."$str"."'";
		$res = mysql_query($q);
		echo "<h1 align='center'>Cities</h1>"; 
		while ($row = mysql_fetch_array($res)) {
			 $countryname = $row['Name'];
			echo  "<div class = 'well'>"."<h3 align = 'center'>"."<a href=\"country_show.php?catagory=city&name=$countryname\" >".$row['Name']."</a>"."</h3>"."</div>";
		}
	}
	elseif ($cato == 'Highest') {
		//$q = "SELECT Continent,Name from highLife";
		$q= "SELECT * FROM highest_expectancy";
		echo "<h1 align='center'>Countries with highest LifeExpectancy </h1>";
		$res = mysql_query($q);
			echo "<table class='table'>";
			echo "<tr><th>Country</th><th>Continent</th><th>Life Expectancy</th></tr>";

		while ($row=mysql_fetch_array($res)) {
				echo "<tr><td>".$row['Name']."</td><td>".$row['Continent']."</td><td>".$row['LifeExpectancy']."</td></tr>";
			}
				echo "<table>";
	}
	elseif ($cato == 'popu') {
		//$q = "SELECT Continent,Name from highLife";
		$q= "SELECT p1.Country,p2.Name,p1.N from p1,p2 where p1.Country=p2.Country order by N desc";
		echo "<h1 align='center'>most populated city for countries with at least 10 cities</h1>";
		$res = mysql_query($q);
			echo "<table class='table'>";
			echo "<tr><th>Country</th><th>City</th><th>Population</th></tr>";

		while ($row=mysql_fetch_array($res)) {
				echo "<tr><td>".$row['Country']."</td><td>".$row['Name']."</td><td>".$row['N']."</td></tr>";
			}
				echo "<table>";
	}
	
	elseif ($cato == 'govt') {
		$q= "SELECT GovernmentForm, COUNT(Code) as count FROM Country GROUP BY GovernmentForm order by count DESC";
		echo "<h1 align='center'>Types of Governments </h1>";
		$res = mysql_query($q);
			echo "<table class='table'>";
			echo "<tr><th>Government Forms</th><th>Number of Countries</th></tr>";
		if($res){
		while ($row=mysql_fetch_array($res)) {
				echo "<tr><td>".$row['GovernmentForm']."</td><td>".$row['count']."</td></tr>";
			}
				echo "<table>";
	}
	}
	elseif ($cato == 'gnp') {
		$q= "SELECT Country.Name AS Country, City.Name AS Capital, GNP - GNPOld AS `Difference in GNP` FROM Country JOIN City ON Country.Capital = City.ID WHERE Country.Population > 100000000 ORDER BY 3 DESC";
		echo "<h1 align='center'>GNP of Countries with population more than 100 million  </h1>";
		$res = mysql_query($q);
			echo "<table class='table'>";
			echo "<tr><th>Country</th><th>Capital</th><th>Difference in GNP</th></tr>";
		if($res){
		while ($row=mysql_fetch_array($res)) {
				echo "<tr><td>".$row['Country']."</td><td>".$row['Capital']."</td><td>".$row['Difference in GNP']."</td></tr>";
			}
				echo "<table>";
	}
	}
	elseif ($cato == 'Capital') {
		//$q = "SELECT * from capital";
		$q = "call capitals()";
		echo "<h1 align='center'>Countries and Capitals</h1>";
		$res = mysql_query($q);
			echo "<table class='table'>";
			echo "<tr><th>Country</th><th>Capital</th></tr>";
		while ($row=mysql_fetch_array($res)) {
				echo "<tr><td>".$row['Country']."</td><td>".$row['Capital']."</td></tr>";
			}
				echo "<table>";
	
	}
	elseif ($cato == 'official1') {
		$q = "select * from officialcountrylanguage";  //left outer join
		echo "<h1 align='center'>Official Country Languages</h1>";
		$res = mysql_query($q);
			echo "<table class='table'>";
			echo "<tr><th>Country</th><th>Official Language</th></tr>";

		while ($row=mysql_fetch_array($res)) {
			
				echo "<tr><td>".$row['CountryName']."</td><td>".$row['lang']."</td></tr>";
			}
				echo "<table>";
				
	}  //left outer join
	elseif ($cato == 'head1') {
		$q = "SELECT name, headofstate from country";  //left outer join
		echo "<h1 align='center'>Head Of States</h1>";
		$res = mysql_query($q);
			echo "<table class='table'>";
			echo "<tr><th>Country</th><th>Head Of State</th></tr>";

		while ($row=mysql_fetch_array($res)) {
			
				echo "<tr><td>".$row['name']."</td><td>".$row['headofstate']."</td></tr>";
			}
				echo "<table>";
	}
	elseif ($cato == 'maxp1') {
		$q = "SELECT C.Name AS Country, MAX(T.Population) AS N FROM Country C LEFT OUTER JOIN City T ON C.Code = T.CountryCode GROUP BY C.Name ORDER BY N DESC";  //left outer join
		echo "<h1 align='center'>Max population of a city for each country</h1>";
		$res = mysql_query($q);
			echo "<table class='table'>";
			echo "<tr><th>Country</th><th>Max population</th></tr>";

		while ($row=mysql_fetch_array($res)) {
			
				echo "<tr><td>".$row['Country']."</td><td>".$row['N']."</td></tr>";
			}
				echo "<table>";
	}
	elseif ($cato == 'Spoken1') {
		//$q = "SELECT * from capital";
		$q = "call mostspoken()";
		echo "<h1 align='center'>Most Spoken Languages</h1>";
		$res = mysql_query($q);
			echo "<table class='table'>";
			echo "<tr><th>Language</th><th>Total Population</th><th>Number of Countries</th></tr>";

		while ($row=mysql_fetch_array($res)) {
			
				echo "<tr><td>".$row['language']."</td><td>".$row['total_population']."</td><td>".$row['number_of_countries']."</td></tr>";
			}
				echo "<table>";
				
	}elseif ($cato='Language') {
		$q = "call getLang('$name')";
		echo "<h1 align='center'>Countries speaking ".$name."</h1>";
		$res = mysql_query($q);
			echo "<table class='table'>";

		while ($row=mysql_fetch_array($res)) {
			$countryname = $row['Name'];
			echo  "<div class = 'well'>"."<h3 align = 'center'>"."<a href=\"country_show.php?catagory=country&name=$countryname\" >".$row['Name']."</a>"."</h3>"."</div>";
		
			}
			echo "<table>";
	}
	
	
	
   ?>
</div>
</body>
</html>