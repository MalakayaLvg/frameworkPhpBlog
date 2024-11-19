<h1>Les articles</h1>
<?php foreach ($articles as $article) : ?>
    <div class="border border-dark">
        <h2>Titre : <?= $article->getTitle() ?></h2>
        <p>Contenu : <?= $article->getContent() ?></p>
        <a class="btn btn-danger" href="?type=article&action=delete&id=<?= $article->getId() ?>">delete</a>
        <a class="btn btn-warning" href="?type=article&action=edit&id=<?= $article->getId() ?>">edit</a>
    </div>
<?php endforeach; ?>
<a href="?type=article&action=create" class="btn btn-success mt-5">Poster un article</a>
