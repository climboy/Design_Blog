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
    <title>Accueil</title>
  </head>
  <body>
		<img class="coffee"src="css/coffee.jpg">
		<div class="head">
    <div class="container">
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
</div>
<nav class="navbar navbar-light" style="background-color: #1A1919E6;" role="navigation">
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
								<li class="col-sm-3"><img class="icon"src="css/house.png"><a href="Accueil.php">Accueil</a></li>
								<li class="col-sm-3"><img class="icon"src="css/web.png"><a href="Creation.php">Création</a></li>
								<li class="col-sm-3"><img class="icon"src="css/folder.png"><a href="Categories.php">Catégories</a></li>
								<li class="col-sm-3"><img class="icon"src="css/followers.png"><a href="Follow.php">Follow</a></li>
              </ul>
          </div>
        </div>
      </nav>
		</div>
		<?php foreach($reponses as $reponse){ ?>
			<div class="container article">
				<?php if (file_exists(__DIR__.'/picture/article'.$reponse['id'].'.png')) { ?>
  <img src="picture/article<?php echo $reponse['id']; ?>.png">
				<?php } ?>
				<div class="Contenu">
		<h3><?php echo $reponse['title']; ?></h3>
		<!-- <p id="text"><?php echo $reponse['text']; ?></p> -->

		<a id="comment"href="Commentaire.php?id=<?php echo $reponse['id']; ?>">Lire plus et laisser un commentaire</a>

		<p id="auteur">Ecrit par: <?php echo $reponse['author']; ?></p>

		<p id="date">Paru le: <?php echo date('d/m/Y', strtotime($reponse['date'])); ?></p>
  </div>
</div>


  		<?php } ?>

      <footer role="contentinfo">
        <p>Copyright (c) 2017  Thomas Clavier</p>

      </footer>
  </body>
</html>
