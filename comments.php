
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=4">
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
          </div>
        </div>
      </nav>
    </div>
    <script src="https://code.jquery.com/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
		        $reponses = $bdd->query("SELECT * FROM articles where id=$id");
		        $articles = $reponses -> fetchAll(PDO::FETCH_ASSOC);

		    }

		    ?>


				<div class="container articles">

                  <h3><?php echo (isset($articles[0]['title'])) ? $articles[0]['title'] : "Article not exist" ; ?></h3>

									<span class="title-divider"></span>

                <p id="text">
                    <?php echo (isset($articles[0]['text'])) ? $articles[0]['text'] : "Article not exist"; ?>
                </p>

                <p id="auteur">Article de:
                    <?php echo (isset ($articles[0]['author'])) ? $articles[0]['author'] : "Article not exist"; ?>
                </p>

                <p id="date">Paru le:
                    <?php echo (isset($articles[0]['date'])) ? $articles[0]['date'] : "Article not exist"; ?>
                </p>
            </div>

						<?php
        $req = $bdd->query("SELECT * FROM comments where id_articles=".$_GET['id']." ORDER BY id DESC");
				// var_dump($req);

        $reponses = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach($reponses as $reponse){


            ?>
             <div class="container comments">
            <p id="auteur">Commentaire de : <?php echo $reponse['author']; ?></p>
            <p id="comment"><?php echo $reponse['comment']; ?></p>
            <p id="date">Paru le: <?php echo $reponse['date']; ?></p>

            </div>


            <?php }
            ?>

						<div class="container">


							<form id="form" classs="form-group" action="postcomments.php" method="post" name="formulaire" enctype="multipart/form-data">
								<h2> Poster un commentaire</h2>
								<input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
								<input class="form-control" placeholder="Pseudo" type="text" name="author" /><br/>
								<textarea type="text" placeholder="Commentaire" class="form-control" name="text" rows="3"></textarea><br/>
                <input type="file" id="hiddenfile" style="display:none" name="file" onChange="getvalue();"/>
                <input type="text" id="selectedfile" placeholder="Choisissez un fichier"/>
                <input type="button" id="file" value="Select a file" onclick="getfile();"/>
								<div class="buttons">
							<button type="submit"  class="btn btn-success">Envoyer</button>
						</div>
							</form>
						</div>

						<?php

						if(isset($_REQUEST['author']) && isset($_REQUEST['text']) && isset($_REQUEST['id'])){

						 $author = $_REQUEST['author'];
						  $comment= $_REQUEST['text'];
						  $id= $_REQUEST['id'];

						 $sql = 'INSERT INTO comments(author, comment, date, id_articles) VALUES(:author, :comment, NOW(), :id_articles)';
						 $req = $bdd->prepare($sql);

						 $req->bindParam(':author', $author);
						$req->bindParam(':comment', $comment);
						 $req->bindParam(':id_articles', $id);
						 $result = $req->execute();
						 }


						?>

      <footer role="contentinfo">
        <p>Copyright (c) 2017  Thomas Clavier</p>
      </footer>
  </body>
</html>
