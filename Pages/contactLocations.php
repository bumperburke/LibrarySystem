<?php
session_start();
if( !isset($_SESSION['loggedInUser']) && !empty($_SESSION['loggedInUser']) )
{
	header("location:index.html");
	exit();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DIT Kevin Street Library</title>
<link href="home.css" type="text/css" rel="stylesheet" />

<script 
src="http://maps.googleapis.com/maps/api/js">
</script>

</head>
<style>
#contents {
	margin-top:100px;
}

form {
	margin-left:200px;
	margin-top: 50px;
}

#para1{
	position:absolute;
	line-height:15px;
	left:380px;
	font-size:18px;
    font-style: normal;
	text-align: left;

}
#para2{
	position:absolute;
	top:230px; 
	left:200px;
	font-size:15px;
	font-style:normal;
}
h3{
    text-align: center;
}

</style>
<body>
	<div id="container">
    	<div id="header">
        	<h1>DIT Kevin Street Library Service</h1>
            <img src="book.png" width="100" height="100" alt="Book" class="book"/>
            <p>Welcome, <?php echo $_SESSION['loggedInUser']; ?></p>
        </div>
        <div id="main">
        	<div id="cssmenu">
            	<ul>
                	<li><a href="home.php">Home</a></li>
                	<?php
                		if($_SESSION['userLevel'] == "a" || $_SESSION['userLevel'] == "l")
                		{
                			echo '<li><a href="manage.php">Manage</a></li>';
                		}
                    ?>
                    <li><a href="books.php">Books</a></li>
                    <li class="active"><a href="contactLocations.php">Contact</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
           	</div>
			
			<div id="para1">
                   <h3> Locations </h3>
				   <div id="map" style="width: 750px; height: 310px;"></div>
			</div>
				
            <div id="para2">
				<ul class="links"><li><a href="contactStaff.php">Contact Staff</a></li></ul>
				<ul class="links"><li><a href="contactLibraries.php">Contact Libraries</a></li></ul>
				<ul class="links"><li><a href="contactLocations.php">Locate Us</a></li></ul>
            </div>
			
        </div>
	</div>

  <script type="text/javascript">
    var locations = [
      ['Kevin Street Library', 53.337306, -6.267333, 4],
      ['Aungier Street Library', 53.338662, -6.267650, 5],
      ['Cathal Brugha Street Library', 53.352141, -6.259521, 3],
      ['Grangegorman Library', 53.354819, -6.278204, 2],
      ['Rathmines Library', 53.338661, -6.267646, 1],
      ['Bolton Street Library', 53.351507, -6.269396, 6]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: new google.maps.LatLng(53.34, -6.26),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();
    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
		  map.setZoom(14);
		  map.setCenter(marker.getPosition());
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>

</body>
</html>