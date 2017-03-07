<?php
  	try{
  		$bdd = new PDO('mysql:host=localhost;dbname=blog_thomas;charset=utf8', 'root', '');
  	}

  	catch (Exception $e){
  		die('Erreur : ' . $e->getMessage());
  	}

  	$reponses = $bdd->query('SELECT * FROM articles ORDER BY id DESC');



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
    <!-- <div class="container">
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
    <div class="form-group">
    <a class="join" href="Inscription.php">S'inscrire</a>
  </div>
  <div class="form-group">
    <a class="join" href="#">Connexion</a>
  </div>
</div>
</div>
</div> -->
<nav class="navbar navbar-light navbar-fixed-top" role="navigation">
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
  <div class="container-fluid">

<!-- <div class="row"> -->
		<?php foreach($reponses as $reponse){ ?>
			<!-- <div class="container"> -->

          <div class="col-sm-4">

				<?php if (file_exists(__DIR__.'/picture/article'.$reponse['id'].'.png')) { ?>
  <img  class="picture" src="picture/article<?php echo $reponse['id']; ?>.png">
  <div class="contenu">
				<?php }
else { ?>
  <div class="contenu fail">

<?php } ?>


		<h3><?php echo $reponse['title']; ?></h3>

		<span class="title-divider"></span>

		<p id="text"><?php $text= $reponse['text'];
    $rest= substr($text, 0,25)."...";echo $rest; ?></p>
    <div class="text-center">


		<a class="btn btn-warning read"  href="comments.php?id=<?php echo $reponse['id']; ?>">Lire plus </a>
    </div>
		<p id="auteur">Ecrit par: <strong><?php echo $reponse['author']; ?></strong></p>

		<p id="date">Publié le: <?php echo date('d/m/Y', strtotime($reponse['date'])); ?></p>
  </div>
  </div>
  <!-- </div> -->


  		<?php } ?>
</div>
<!-- </div> -->
      <footer role="contentinfo">
        <p>Copyright (c) 2017  Thomas Clavier</p>

      </footer>
  </body>
</html>
