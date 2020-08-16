<!DOCTYPE html>
<html>

<?php $Title = $_GET['name'];
$conn=mysqli_connect('localhost','root','','audiolibdb');
if(!$conn)
{
	die('Server not Reachable');
}

$query = "SELECT * from audios WHERE FILENAME = '$Title'";
$result = mysqli_query($conn,$query) or die($conn->error);
while ($row=mysqli_fetch_array($result)) {
	$albumart = $row['art'];
}

mysqli_close($conn);

?>

<style>
body:before {
  content: '';
  z-index: -1;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  -webkit-filter: blur(10px);
  background-size: cover;
  background: url(<?php echo $albumart; ?>)
}
</style>
 <link rel="stylesheet" href="w3.css">
<body align="center" >
<div style="padding-top: 21vh; margin: auto;">
<img src="<?php echo $albumart; ?>" width="300vw", height='auto'></br></br>
<audio controls autoplay>
<source src="<?php echo $_GET['name']; ?>" type="audio/mpeg">
</source>
</audio>
</br>
</div>
</body>
</html>