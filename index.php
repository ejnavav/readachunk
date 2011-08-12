<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Read A Chunk</title>
</head>
<body>
	<div id="container" class ="container">
		<h1>Read a Chunk</h1>
	</div>
	<div>
		<form action="upload.php" method="POST" enctype="multipart/form-data">
			<label for="book">This is my book</label><br / >
			<input type="file" name="book" id="book"><br / >
			<label for="email">This is my email</label><br / >
			<input type="text" name="email"><br / >
			<input type="submit" value="Go!">
		</form>
	</div>
</body>