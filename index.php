<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Read A Chunk</title>

	<link rel="stylesheet" href="images/style.css" type="text/css" media="screen" />
	<link rel="shortcut icon" href="images/favicon.ico" type="image/favicon"/>

</head>
<body>


		<div id="logo">
			<img src="images/logo.png" alt="Read a Chunk" border=0 > 

		</div>


	<div id="container">
				<form action="upload.php" method="POST" enctype="multipart/form-data">


			<div id="my_book">
				<label for="book">This is my book</label><br / >
				<input type="file" name="book" id="book"><br / >
			</div>

			<div id="my_email">
				<label for="email">This is my email</label><br / >
				<input type="text" name="email"><br / >
			</div>

			<div id="i_want_to_read">
				I want to read 
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
				pages  &nbsp;
			</div>

			<div id="pages_every">
				   every  
				<select name ="frequency">
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
				days
			</div>
<br /><br />
			<input type="submit"  id="submit" value="Go!">
		</form>
	</div>
</body>