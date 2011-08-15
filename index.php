<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Read A Chunk.com Read books small chunk at a time</title>


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
						<div id="help">

							<a href="#info" rel="facebox">Need help?</a>
						</div>
						<form action="upload.php" method="POST" enctype="multipart/form-data">


							<div id="my_book">
								<label for="book">The PDF book to chunk:</label><br / >
								<input type="file" name="book" id="book"><br / >
							</div>

							<div id="book_title">
								<label for="book_title">Does the book have a title? Type it here:</label><br / >
								<input type="text" name="book_title" id="book_title"><br / >

							</div>

							<div id="my_email">
								<label for="email">This is my email <font size="2">(Feel free to send it to more just separate them with a comma)</font></label><br / >
								<input type="text" name="email" id="email"><br / >

							</div>

							<div id="i_want_to_read">
								I want to read&nbsp; 
								<select name = "pages">
									<?php for ($i=1; $i <= 10; $i++) : ?>
									<option value ="<?php echo "$i" ?>"><?php echo "$i" ?></option>
									<?php endfor ?>		
								</select>
								&nbsp;pages&nbsp;
							</div>

							<div id="pages_every">
								every  
								<select name ="frequency">
									<?php for ($i=1; $i <= 10; $i++) : ?>
									<option value ="<?php echo "$i" ?>"><?php echo "$i" ?></option>
									<?php endfor ?>
								</select>
								&nbsp;days&nbsp;<br />
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


					</div>

					<ul id="quotes">
						<li><blockquote>"I like that I can read a book with my friends and when we catch up for a beer we are all the same page."</blockquote><cite>Richie @evolve2k</cite>
						</li>

						<li>
                                                    <blockquote>"As a learning tool, reading a chunk is an effective mechanism for educating young learnes."</blockquote><cite>Nathan</cite>
						</li>
						<li>
                                                    <blockquote>"Reading a book made socialized."</blockquote></cite>James Hansen</cite>
                                                </li>
						<li>
                                                    <blockquote>"I love the "chunk player"."</blockquote></cite>Mike Scholes</cite>
                                                </li>
						<li>
                                                    <blockquote>"Read a chunk means reading on my terms."</blockquote></cite>Amir Nissen</cite>
                                                </li>
          					<li>
                                                    <blockquote>"I'm now learning a new language in small chunks at a time."</blockquote></cite>Emil Kjer</cite>
				                </li>
          					<li>
                                                    <blockquote>"I like the readachunk idea. It's the promodoro of reading."</blockquote></cite>Adam Meehan</cite>
				                </li>
          					<li>
                                                    <blockquote>"Resuming my readings with the chunk player after the holiday was great!"</blockquote></cite>Ben Toole</cite>
				                </li>
                                        </ul>







			<div id="info">
				<strong>Info and hints</strong><br /><hr />

				With <strong>Read a Chunk . com</strong> you can upload your pdf books and read them 
				in small chunks. The chunks are send to your mailbox in the beginning of the day so you can read them whenever it suites you!
				<br /><br />To enjoy the readings with your friends, just add multiple emails separated by comma. Simple and easy.
				<br /><br />The <strong>chunk player</strong> in the bottom of the email gives you the ability to <strong>pause</strong> the readings when you for instance are on holiday. For resume just click <strong>play</strong>.
				<br /><br />Don't want to receive more chunks? Just hit <strong>stop</strong> in the <strong>chunk player</strong>.
                                <br /><br />Need another chunk? Hit the <strong>next chunk</strong>-button in the <strong>chunk player</strong>.
                                <br /><br />
				The brains behind this:<ul>
					<li>	Victor Nava</li>
					<li>	Eduardo Nava</li>
					<li>	Emil Kjer</li>
					<li>	John Kolovos</li>
				</ul>


			</div>

<!-- <div id="tweets">
</div> -->

<div id="footer"></div>
</body>
