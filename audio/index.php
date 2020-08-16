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
<style>
  .inputForm{
      border-radius:25px;
      -moz-border-radius:25px;
      -webkit-border-radius:25px;
   }
</style>

 <link rel="stylesheet" href="css/w3.css">
 <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div>
<div class="w3-bar w3-pink">
  <a class="w3-bar-item w3-button" href="#">Home</a>
  <a class="w3-bar-item w3-button" href="playlist.php">Playlist</a>  
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-blue w3-right w3-padding">Upload</button>
</div>
</div>

<div class="image-container">
<div class="w3-padding">
<form name="search" method="post" action="search.php" class="w3-padding w3-right">
	<input class="inputForm w3-input w3-display-position w3-padding" style="top:16px;right:50px;width: 400px;" placeholder="Search by Song Title or Artist" type="text" name="find" /> 
	<input class="inputForm w3-btn w3-white w3-padding w3-display-position" style="top:16px;right:20px;" type="submit" name="search" value="  | Search  " />
  </form>
</div>
  <div class="w3-padding w3-left">
<form action="filter_g.php" method="post">
<select class="w3-select" name="genre">
				<option value="" disabled selected>Choose Genre</option>
				<option value="Rock">Rock</option>
				<option value="Folk">Folk</option>
				<option value="Classical">Classical</option>
				<option value="RnB">RnB</option>
				<option value="Pop">Pop</option>
</select>
<input class="w3-btn w3-black" type = "submit" value="Filter Mp3" name="filter_g"/>
</form>
</div>
</br>
</br>
  <div class="text">Music Database Management System</div>
</div>

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-blue"> 
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <h2>UPLOAD SONGS AND DETAILS IN DB</h2>
      </header>
      <div class="w3-container">
        <form class="w3-panel w3-card-4" action="upload.php" method="POST" enctype="multipart/form-data">
			<p>Choose Audio File</p>
			<input class="w3-input" type = "file" name="audioFile"/></br>
			<select class="w3-select" name="genre">
				<option value="" disabled selected>Choose Genre</option>
				<option value="Rock">Rock</option>
				<option value="Folk">Folk</option>
				<option value="Classical">Classical</option>
				<option value="RnB">RnB</option>
				<option value="Pop">Pop</option>
			</select>
			<input class="w3-input" type="text" name="artist" placeholder="Artist"><br>
			<input class="w3-input" type="text" name="year" placeholder="Year"><br>
			<p>Choose Album Art</p>
			<input class="w3-input" type="file" name="art"/></br></br>
			<p><input class="w3-btn w3-black" type = "submit" value="Upload Audio" name="save_audio"/></p>
			</form>
      </div>
</div>
</div>
<div class="w3-container w3-black">
<p align="middle">Made with <img src="image/hearts.png" width="18px;"> in B-R7</p>
</div>
</body>
</html>