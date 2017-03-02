
<?php

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=blog_thomas;charset=utf8', 'root', '');
	}

	catch (Exception $e){
		die('');
	}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Accueil</title>
  </head>
  <body>
		<img class="coffee"src="css/coffee.jpg">
		<div class="head">

<nav class="navbar navbar-light"  role="navigation">
          <div class="container-fluid">
      <div class="navbar-header">
   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
     <span class="sr-only">Toggle navigation</span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
   </button>
 </div>
 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
								<li class="col-sm-3"><img class="icone" src="css/home.png"><a href="home.php">Accueil</a></li>
								<li class="col-sm-3"><img class="icone" src="css/light.png"><a href="postarticles.php">Création</a></li>
								<li class="col-sm-3"><img class="icone" src="css/join.png"><a href="Categories.php">Devenir Membre</a></li>
								<li class="col-sm-3"><img class="icone" src="css/follow.png"><a href="Follow.php">Réseaux Sociaux</a></li>
              </ul>
          </div>
        </div>
      </nav>
		</div>
		<script src="https://code.jquery.com/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<div class="container">
			<div class="row">
			 <div class="col-xs-4 col-sm-4"><a href="https://www.facebook.com/thomas.martins.7712?fref=ts"><img class="social" src="css/facebook.svg"></a></div>
			 <div class="col-xs-4 col-sm-4"><a href="https://twitter.com/thomasmartins31"><img class="social" src="css/twitter.svg"></a></div>
			 <div class="col-xs-4 col-sm-4"><a href="https://github.com/climboy"><img class="social" src="css/git.svg"></a></div>
			</div>
		</div>
      <footer role="contentinfo">
        <p>Copyright (c) 2017  Thomas Clavier</p>
      </footer>
  </body>
</html>
