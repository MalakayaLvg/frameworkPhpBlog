<h1>Les articles</h1>
<?php foreach ($articles as $article) : ?>
    <div class="border border-dark">
        <h2>Titre : <?= $article->getTitle() ?></h2>
        <p>Contenu : <?= $article->getContent() ?></p>
    </div>
<?php endforeach; ?>
<a href="?type=article&action=create" class="btn btn-success mt-5">Poster un article</a>
