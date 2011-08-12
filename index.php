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
			
			I want to read <br/>
			<select name = "pages">
				<option value = "1">1</option>
				<option value = "2">2</option>
				<option value = "3">3</option>
				<option value = "4">4</option>
				<option value = "5">5</option>
				<option value = "6">6</option>
				<option value = "7">7</option>
				<option value = "8">8</option>
				<option value = "9">9</option>
				<option value = "10">10</option>				
			</select>
			Pages Every
			<select name = "frequency">
				<option value = "1">1</option>
				<option value = "2">2</option>
				<option value = "3">3</option>
				<option value = "4">4</option>
				<option value = "5">5</option>
				<option value = "6">6</option>
				<option value = "7">7</option>
				<option value = "8">8</option>
				<option value = "9">9</option>
				<option value = "10">10</option>				
			</select>
			Minutes<br/>
			
			<input type="submit" value="Go!">
		</form>
	</div>
</body>