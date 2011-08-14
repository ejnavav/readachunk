<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Read A Chunk. Read books small chunk at a time</title>

	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="images/jquery.quote_rotator.js" type="text/javascript" charset="utf-8"></script>
	<script src="images/defunkt-facebox-859adc2/src/facebox.js" type="text/javascript"></script>
	<script src="images/jquery.tweet.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://raw.github.com/malsup/form/master/jquery.form.js" type="text/javascript" charset="utf-8"></script>

	<link rel="stylesheet" href="images/style.css?version=4.2.0" type="text/css" media="screen" />
	<link href="/images/defunkt-facebox-859adc2/src/facebox.css" media="screen" rel="stylesheet" type="text/css"/>

	<link rel="shortcut icon" href="/images//favicon.ico" type="image/x-icon">
	<link rel="icon" href="/images/favicon.ico" type="image/x-icon">
	

	<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {

		// --Display quotes
		$('ul#quotes').quote_rotator();
		
		// --Facebox
		$('a[rel*=facebox]').facebox({
			loadingImage : '/images/defunkt-facebox-859adc2/src/loading.gif',
			closeImage   : '/images/defunkt-facebox-859adc2/src/closelabel.png'
		})


		// --Tweets response

		$("#tweets").tweet({
			avatar_size: 32,
			count: 4,
			query: "readachunk.com",
			loading_text: "searching twitter..."
		});


		//-- Form submit 
		$('form').submit(function(){


			// $('#response').facebox({
			// 	loadingImage : 'images/defunkt-facebox-859adc2/src/loading.gif',
			// 	closeImage   : 'images/defunkt-facebox-859adc2/src/closelabel.png'
			// })
			
			jQuery.facebox({ div: '#response' });
			 $('#loader').fadeIn('slow');

		});



			// bind form using ajaxForm
				$('form').ajaxForm({
					target: '#response',

					success: function() {
						$('#loader').fadeOut('slow');
						// $('#response').fadeIn('slow');
						jQuery.facebox({ div: '#response' });

					}




		// --validate emails

		// var emails = addresses.split(","); 
		// 			
		// var addresses = '...@foo.com, a...@foo.com, st...@bar.com';
		//   var valid;
		// 
		//   $(emails).each(
		//     (function() {
		//       var re = /^[^\s]+@[^\s]+$/;
		//       return function(i, s) {
		//         valid = re.test(jQuery.trim(s));
		//         return valid;
		//       };
		//     })());
		// 
		//   alert(valid);
		// 

				});




				// $("input#inputField").autoSuggest();
			});


			</script>

</head>
<body>
    <!--start contactable -->
    <div id="contactable"><!-- contactable html placeholder --></div>
    <script type="text/javascript" src="contact/jquery.validate.pack.js"></script>
    <script type="text/javascript" src="contact/jquery.contactable.js"></script>
    <link rel="stylesheet" href="contact/contactable.css" type="text/css" />
    <script>$(function(){$('#contactable').contactable({subject: 'feedback URL:'+location.href});});</script>
    <!--end contactable -->


	<div id="logo">
		<img src="images/logo.png" alt="Read a Chunk" border=0 > 


	</div>


	<div id="container">
		<form action="upload.php" method="POST" enctype="multipart/form-data">


			<div id="my_book">
				<label for="book">This is my book:</label><br / >
				<input type="file" name="book" id="book"><br / >
			</div>

			<div id="book_title">
				<label for="book_title">This the book's title:</label><br / >
				<input type="text" name="book_title" id="book_title"><br / >

			</div>
			
			<div id="my_email">
				<label for="email">This is my email:</label><br / >
				<input type="text" name="email" id="email"><br / >

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
			<div id="response">
				<div id="loader"><img src="images/loading.gif" alt="Loading" border=0 >	
					Loading..	
				</div>
			</div>



			<!-- <input type="submit"  id="submit" value="Go!"> -->
			<input type="submit"   id="submit_bnt" value="Go!">

		</form>
		<div id="help">

			<a href="#info" rel="facebox"><img src="images/help.png" alt="Help" border=0 ></a>
		</div>

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


	<li>
		<blockquote>"I like the readachunk idea. It's the promodoro of reading"</blockquote>
	</cite>Adam Meehan</cite>
</li>


</ul>







<div id="info">
	<strong>About this project:</strong><br /><hr />

	This project has made in 2 days for <strong>"Startup Hackathon"</strong> in Melbourne Australia 2011. <br /><hr />
	With <strong>"Read a Chunk"</strong> you can upload your pdf book and read it 
	in small chunks.
	Use comma for multiply emails
	<br /><br />
	Members:<ul>
		<li>	Victor Nava</li>
		<li>	Eduardo Nava</li>
		<li>	Emil  Kjer</li>
		<li>	John Kolovos</li>
	</ul>


</div>

<!-- <div id="tweets">
</div> -->






<div id="footer"></div>
</body>