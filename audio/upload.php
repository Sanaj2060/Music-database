<!DOCTYPE html>
<html>
<head>
<title>Audio Library Management System</title>

<style>
body {font-family: Arial, Helvetica, sans-serif;}

.image-container {
  background-image: url("image/bg.jpg");
  background-size: cover;
  position: relative;
  height: 100vh;
}

.text {
  background-color: white;
  color: black;
  font-size: 5vw; 
  font-weight: bold;
  margin: 0 auto;
  padding: 10px;
  width: 50%;
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  mix-blend-mode: screen;
}
</style>

 <link rel="stylesheet" href="css/w3.css">
 <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div>
<div class="w3-bar w3-pink">
  <a class="w3-bar-item w3-button" href="index.php">Home</a>
  <a class="w3-bar-item w3-button" href="playlist.php">Playlist</a>
</div>
</div>

<?php
if(isset($_POST['save_audio']) && $_POST['save_audio']=="Upload Audio")
{
	$dir='mp3/';
	$dirart='albumart/';
	$audio_path=$dir.basename($_FILES['audioFile']['name']);
	$art_path=$dirart.basename($_FILES['art']['name']);
	$artist= $_POST['artist'];
	$year= $_POST['year'];
	$genre= $_POST['genre'];
	
	if(move_uploaded_file($_FILES['audioFile']['tmp_name'],$audio_path) && move_uploaded_file($_FILES['art']['tmp_name'],$art_path))
	{
		echo 'Uploaded Successfully.';
		echo '</br>';
		
		saveAudio($audio_path,$art_path,$artist,$year,$genre);
		echo "<script>window.location.href = \"playlist.php\";</script>";
		
	}
}

function displayAudios()
{
	$conn=mysqli_connect('localhost','root','','audiolibdb');
	if(!$conn)
	{
		die('Server not Reachable');
	}
	
	$query = "select * from audios";
	
	$r=mysqli_query($conn,$query);
	
	while($row=mysqli_fetch_array($r))
	{
		echo '<a href="play.php?name='.$row['FILENAME'].'" target="_blank">'.$row['FILENAME'].'</a>';
		echo "<br/>";
	}
	mysqli_close($conn);
	echo '<a href="index.php">'.'Home'.'</a>';
}

function saveAudio($fileName,$fileArt,$artist,$year,$genre)
{
	$conn=mysqli_connect('localhost','root','','audiolibdb');
	if(!$conn)
	{
		die('Server not Reachable');
	}
	
	$query="insert into audios(filename,art,artist,year,genre)values('{$fileName}','{$fileArt}','{$artist}','{$year}','{$genre}')";
	
	mysqli_query($conn,$query);
	
	if(mysqli_affected_rows($conn)>0)
	{
		echo "audio file path saved in database";
		echo '</br>';
	}
	$home = 'Home';
	mysqli_close($conn);
}
?>

</body>
</html>