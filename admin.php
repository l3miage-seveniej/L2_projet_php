<?php

require_once('_config.php');

$articles = $pdo->query('SELECT * FROM article');
$articles_categories = $pdo->query('SELECT * FROM article_categorie');
$articles_commentaires = $pdo->query('SELECT * FROM article_commentaire');
$auteurs = $pdo->query('SELECT * FROM auteur');
$utilisateurs = $pdo->query('SELECT * FROM utilisateur');


?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TP4 database</title>
    <?php include('_head.php') ?>
  </head>
  <body>
    <?php include('_header.php') ?>

    <div class="container" >
      <article>
        <div class="card mb-3 border-info">
            <div class="card-header text-white bg-info">Categories</div>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($articles_categories as $categorie): ?>
                        <tr>
                          <th scope="row"><?php echo $categorie['id'] ?></th>
                          <td>
                              <a href="categorie.php?id=<?php echo $categorie['id'] ?>">
                                  <?php echo $categorie['categorie'] ?>
                              </a>
                          </td>
                        </tr>
                    <?php endforeach; ?>
              </tbody>
            </table>
        </div>
      </article>



        <article>
          <div class="card mb-3 border-info">
              <div class="card-header text-white bg-info">Articles</div>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article): ?>
                          <tr>
                            <th scope="row"><?php echo $article['id'] ?></th>
                            <td>
                                <a href="post.php?id=<?php echo $article['id'] ?>">
                                    <?php echo $article['titre'] ?>
                                </a>
                            </td>
                            <td><?php echo $article['id_auteur'] ?></td>
                            <td><?php echo $article['auteur'] ?></td>
                            <td><?php echo $article['id_categorie'] ?></td>
                            <td><?php echo $article['date_publication'] ?></td>
                          </tr>
                      <?php endforeach; ?>
                </tbody>
              </table>
          </div>
        </article>



          <article>
            <div class="card mb-3 border-info">
                <div class="card-header text-white bg-info">Commentaires</div>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Article</th>
                      <th scope="col">Auteur</th>
                      <th scope="col">Commentaire</th>
                      <th scope="col">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($articles_commentaires as $commentaire): ?>
                            <tr>
                              <th scope="row"><?php echo $commentaire['id'] ?></th>
                              <td>
                                  <a href="post.php?id=<?php echo $commentaire['id_article'] ?>">
                                      <?php echo $commentaire['id_article'] ?>
                                  </a>
                              </td>
                              <td><?php echo $commentaire['auteur'] ?></td>
                              <td><?php echo $commentaire['commentaire'] ?></td>
                              <td><?php echo $commentaire['date_publication'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                  </tbody>
                </table>
            </div>
          </article>



            <article>
              <div class="card mb-3 border-info">
                  <div class="card-header text-white bg-info">Utilisateurs</div>
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($utilisateurs as $utilisateur): ?>
                              <tr>
                                <th scope="row"><?php echo $utilisateur['id'] ?></th>
                                <td><?php echo $utilisateur['nom'] ?></td>
                                <td><a href="mailto:<?php echo $utilisateur['email'] ?>"><?php echo $utilisateur['email'] ?></a></td>
                              </tr>
                          <?php endforeach; ?>
                    </tbody>
                  </table>
              <?php foreach ($articles_categories as $categorie): ?>
               <li class="nav-item">
                   <a class="nav-link" href="categorie.php?id=<?php echo $categorie['id'] ?>">
                       <?php echo $categorie['nom'] ?>
                       <span class="badge">0</span>
                   </a>
               </li>
              <?php endforeach; ?>
              </div>
            </article>



    </div>

    <?php include('_footer.php') ?>
  </body>
</html>
