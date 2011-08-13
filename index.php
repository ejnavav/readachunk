<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Read A Chunk</title>

	<link rel="stylesheet" href="images/style.css" type="text/css" media="screen" />
	<link rel="shortcut icon" href="images/favicon.ico" type="image/favicon"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://github.com/coryschires/quote-rotator/raw/master/src/jquery.quote_rotator.js" type="text/javascript" charset="utf-8"></script>

 	<script type="text/javascript" charset="utf-8">
	        $(document).ready(function() {
	            $('ul#quotes').quote_rotator();
	        });
	    </script>

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
				minutes
			</div>
<br /><br />
			<input type="submit"  id="submit" value="Go!">
		</form>
		
			</div>
			
 <ul id="quotes">
<li><blockquote>"I like that i can read a book with my friends and when we catch up for a beer we are all the same page."</blockquote> 
	<cite>Richie @evolve2k</cite>
	</li>

<li><blockquote>"As a learning tool, reading a chunk is an effective mechanism for educating young learns"</blockquote> 
	<cite>Nathan</cite>
	</li>
<li>
	<blockquote>"Read a chunk means reading on my terms"</blockquote>
	</cite>Amir</cite>
	</li>
</ul>


 
</body>