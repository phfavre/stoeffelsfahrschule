<?php

session_start();

if(isset($_SESSION['is_admin']))
{
  // go to home page
  header("location: courseschedule.php");
}

$jsonstring = file_get_contents("../admin/config_sf.json");
$config = json_decode($jsonstring, true);

$true_un = $config["admin_username"];
$true_pw = $config["admin_password"];
$is_admin = false;

if (isset($_POST['username']) && isset($_POST['password']))
{
  $input_username = htmlspecialchars($_POST['username']);
  $input_password = htmlspecialchars($_POST['password']);
  if($input_username == $true_un && $input_password == $true_pw)
  {
    $is_admin = true;
  }
}

if ($is_admin)
{
  $_SESSION['is_admin'] = 1;
  session_regenerate_id();
  header("location: courseschedule.php");
}
else
{
?>

<html>
	<head>
		<title>Steoffels Fahrschule - Login</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media
		queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file://
		-->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<link href="ext/bootstrap/bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="ext/bootflat/2.0.4/bootflat.github.io-master/bootflat/css/bootflat.css" rel="stylesheet">
		<link href="css/general.css" rel="stylesheet">
		<link href="css/login.css" rel="stylesheet">
		<!--<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />-->
		<link rel="apple-touch-icon" sizes="57x57" href="img/icon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="img/icon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="img/icon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/icon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="img/icon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/icon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="img/icon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/icon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="img/icon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="img/icon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="img/icon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="img/icon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/icon/favicon-16x16.png">
		<link rel="manifest" href="img/icon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="img/icon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
	</head>
	<body>
	

	
		<div class="page_bloc">
			<header>
				<div id="login_title">Admin Login</div>
			</header>
			<div class="section">
				<div class="container">
					<div class="col-md-4 col-md-offset-4">
							<div class="login-page">
								<div class="form">
									<form class="login-form" role="form" action="login.php" method="post">
										<input type="text" name="username" id="username" placeholder="Username" autocomplete="off"/>
										<input type="password" name="password" id="password" placeholder="Password" autocomplete="off"/>
										<button>Login</button>
									</form>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</body>


	<script src="ext/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/footer.js"></script>
</html>

<?php
}
?>