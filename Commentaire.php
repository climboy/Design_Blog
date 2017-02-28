
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
                <li class="col-sm-3"><img class="icon"src="css/house.png"><a href="Accueil.php">Accueil</a></li>
                <li class="col-sm-3"><img class="icon"src="css/web.png"><a href="Creation.php">Création</a></li>
                <li class="col-sm-3"><img class="icon"src="css/folder.png"><a href="Categories.php">Catégories</a></li>
                <li class="col-sm-3"><img class="icon"src="css/followers.png"><a href="Follow.php">Follow</a></li>
          </div>
        </div>
      </nav>
    </div>

		<?php
		    try{
		        $bdd = new PDO('mysql:host=localhost;dbname=blog_thomas;charset=utf8', 'root', '');
		    }

		    catch (Exception $e)
		    {
		        die('Erreur : ' . $e->getMessage());
		    }

		    if(isset($_GET['id']))
		    {
		        // On récupère le contenu de la table articles
						$id = $_GET['id'];
		        $reponses = $bdd->query('SELECT * FROM articles where id=$id');
		        $articles = $reponses -> fetch(PDO::FETCH_ASSOC);
		    }

		    ?>

				<div class="container articles">

                  <h3><?php echo (isset($articles['title'])) ? $articles['title'] : "Article not exist" ; ?></h3>

                <p id="text">
                    <?php echo (isset($articles['text'])) ? $articles['text'] : "Article not exist"; ?>
                </p>

                <p id="auteur">Article de:
                    <?php echo (isset ($articles['author'])) ? $articles['author'] : "Article not exist"; ?>
                </p>

                <p id="date">Paru le:
                    <?php echo (isset($articles['date'])) ? $articles['date'] : "Article not exist"; ?>
                </p>
            </div>

						<?php
        $req = $bdd->query("SELECT * FROM comments where id_articles=".$_GET['id']." ORDER BY id DESC");
				var_dump($req);

        $reponses = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach($reponses as $reponse){


            ?>
             <div class="container comments">
            <p id="auteur">Commentaire de : <?php echo $reponse['author']; ?></p>
            <p id="date">Paru le: <?php echo $reponse['date']; ?></p>

            <p id="comment"><?php echo $reponse['comment']; ?></p>

            </div>


            <?php }
            ?>

						<div class="container">


							<form id="form" classs="form-group" action="?" method="post" name="formulaire" enctype="multipart/form-data">
								<h2> Poster un commentaire</h2>
								<input class="form-control" placeholder="Pseudo" type="text" name="author" /><br/>
								<textarea type="text" placeholder="Commentaire" class="form-control" name="text" rows="3"></textarea><br/>
								<input type="file" name="picture" accept="image/*">
								<div class="buttons">
							<button type="submit"  class="btn btn-success">Envoyer</button>
							<button class="btn btn-info" type="reset">Reset</button>
						</div>
							</form>
						</div>


						<?php

  if(isset($_REQUEST['author']) && isset($_REQUEST['comment'])){

    $author = $_REQUEST['author']; $comment= $_REQUEST['comment'];
    $sql = 'INSERT INTO comments(author, comment, date, id_articles) VALUES(:author, :comment, NOW(), :id_articles)';
    $req = $bdd->prepare($sql);
    // var_dump($req);
    $req->bindParam(':author', $author);
    $req->bindParam(':comment', $comment);
    $req->bindParam(':id_articles', $_GET["id"]);
    $result = $req->execute();
}


?>

      <footer role="contentinfo">
        <p>Copyright (c) 2017  Thomas Clavier</p>
      </footer>
  </body>
</html>
