<!DOCTYPE html>
<html>
<head>
<title>PLAYLIST</title>
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/form.css">
</head>
<body bgcolor="#FEE64A">
<?php 
$query = $_POST["find"];
?>




<div>
<div class="w3-bar w3-pink">
  <a class="w3-bar-item w3-button" href="index.php">Home</a>
  <a class="w3-bar-item w3-button" href="playlist.php">Playlist</a>
  <div class="w3-padding w3-right">
<form name="search" method="post" action="search.php" class="w3-padding w3-right">
	<input class="inputForm w3-input w3-display-position w3-padding" style="top:50px;right:50px;width: 400px;" placeholder="Search by Song Title or Artist" type="text" name="find" /> 
	<input class="inputForm w3-btn w3-white w3-padding w3-display-position" style="top:50px;right:20px;" type="submit" name="search" value="  | Search  " />
  </form>
</div>
</div>
</div>
<div class="w3-container">
<h2 align="center" style="color: #430A01;" class="w3-xlarge">-<b>  SEARCH RESULT  </b>-</h2>
 <div class="w3-panel w3-card w3-text-white" style="background: #E23544;" >
<?php 
$conn=mysqli_connect('localhost','root','','audiolibdb');
if(!$conn)
{
	die('Server not Reachable');
}

$query = "select * from audios WHERE FILENAME LIKE '%$query%' OR artist LIKE '%$query%'";

$r=mysqli_query($conn,$query);
$play = 'Play';
$delete = 'Delete';
while($row=mysqli_fetch_array($r))
{
	echo "</br>";
	echo '<img src="'.$row['art'].'" width="100px">';
	echo "<br/>";
	echo "<br/>";
	echo 'Play ','<a href="play.php?name='.$row['filename'].'" target="_blank"><img src=image/play.png width="30px"/></a>';
	echo "<br/>";
	echo "Title: ".substr($row['filename'], 4, -4);
	echo "<br/>";
	echo "Artist: ".$row['artist']."</br>";
	echo "Genre: ".$row['genre'];
	echo "<br/>";
	echo "Year: ".$row['year'];
	echo "<br/>";
	echo '<a href="'.$row['art'].'" target="_blank">'.'Album Art'.'</a>';
	echo "<br/>";
	echo "<button class=\"w3-button w3-black\" onclick=\"delete_js()\">Delete</button>";
	$curr_link = "manage.php?name=".$row['filename'];
	echo "<hr color= #000;>";
	echo "<br/>";
	echo "<br/>";
}
mysqli_close($conn);
?>
</div>
</div>
</body>
<script>
function delete_js() {
  var txt;
  if (confirm("Are You Sure!")) {
    
	window.location.href = '<?php echo $curr_link; ?>';
  } else {
    txt = "You pressed Cancel!";
  }
  document.getElementById("demo").innerHTML = txt;
}
</script>
</html>