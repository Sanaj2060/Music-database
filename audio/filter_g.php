<!DOCTYPE html>
<html>
<head>
<title>PLAYLIST</title>
<link rel="stylesheet" href="css/w3.css">
</head>
<body bgcolor="#FEE64A">
<?php 
$genre = $_POST["genre"];
?>




<div>
<div class="w3-bar w3-pink">
  <a class="w3-bar-item w3-button" href="index.php">Home</a>
  <a class="w3-bar-item w3-button" href="playlist.php">Playlist</a>
</div>
</div>
<div class="w3-container">
<h2 align="center" style="color: #430A01;" class="w3-xxlarge">-<b>  P L A Y L I S T  </b>-</h2>
 <div class="w3-panel w3-card w3-text-white" style="background: #E23544;" >
<?php 
$conn=mysqli_connect('localhost','root','','audiolibdb');
if(!$conn)
{
	die('Server not Reachable');
}

$query = "select * from audios WHERE genre = '$genre'";

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