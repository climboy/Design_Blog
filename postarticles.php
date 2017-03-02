
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
    <div class="form-group">
    <button type="submit" name="button">S'inscrire</button>
    </div>
    <div class="form-group">
    <button type="submit" name="button">Connexion</button>
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
                <li class="col-sm-3"><a href="home.php">Accueil</a></li>
								<li class="col-sm-3"><a href="postarticles.php">Création</a></li>
								<li class="col-sm-3"><a href="Categories.php">Catégories</a></li>
								<li class="col-sm-3"><a href="Follow.php">Follow</a></li>
              </ul>
          </div>
        </div>
      </nav>
    </div>
    <script src="https://code.jquery.com/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <div class="container">


      	<form id="form" classs="form-group" action="?" method="post" name="formulaire" enctype="multipart/form-data">
      		<h1> Ecrire un article </h1>
      		<input class="form-control" placeholder="Nom de l'auteur" type="text" name="author" /><br/>
      		<input class="form-control" placeholder="Titre de l'article" type="text" name="title" /><br/>
      		<textarea type="text" placeholder="Contenu de l'article" class="form-control" name="text" rows="3"></textarea><br/>
          <input type="file" name="picture" accept="image/*">
      		<div class="buttons">
      	<button type="submit"  class="btn btn-success">Envoyer</button>
      </div>
      	</form>
      </div>
      <?php

      	try{
      		$bdd = new PDO('mysql:host=localhost;dbname=blog_thomas;charset=utf8', 'root', '');

      	}
      	catch (Exception $e){

      	}
        if(isset($_REQUEST['author']) && isset($_REQUEST['title']) && isset($_REQUEST['text'])){

          $author = $_REQUEST['author'];
          $title = $_REQUEST['title'];
          $text= $_REQUEST['text'];
          $req = $bdd->prepare('INSERT INTO articles(author, title, text, date) VALUES(:author, :title, :text, NOW())');

          $req->bindParam(':author', $author);
          $req->bindParam(':title', $title);
          $req->bindParam(':text', $text);
          $req->execute();

          $id = $bdd->lastInsertId();
          if (isset($_FILES['picture'])) {
            copy($_FILES['picture']['tmp_name'], __DIR__.'/picture/article'.$id.'.png');
          }


          header('Location: Categories.php');
        exit();
      }
       ?>
      <footer role="contentinfo">
        <p>Copyright (c) 2017  Thomas Clavier</p>
      </footer>
  </body>
</html>
