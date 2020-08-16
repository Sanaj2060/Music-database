<?php $Title = $_GET['name'];
$conn=mysqli_connect('localhost','root','','audiolibdb');
if(!$conn)
{
	die('Server not Reachable');
}
$audio_file_tar = $Title;

$query_album_art = "SELECT art from audios WHERE FILENAME = '$Title'";
$album_art = mysqli_query($conn,$query_album_art) or die($conn->error);

foreach($album_art as $aa){
	$album_art_tar = $aa['art'];
}

$query = "DELETE from audios WHERE FILENAME = '$Title'";
$result = mysqli_query($conn,$query) or die($conn->error);

if($result && unlink($audio_file_tar) && unlink($album_art_tar)){
	echo "Record Deleted!!";
}

$Back = "Back To Playlist";
mysqli_close($conn);

echo "</br>";
echo '<a href="playlist.php">'.$Back.'</a>';
echo "<script>window.location.href = \"playlist.php\";</script>";
?>