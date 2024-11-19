
<div class="container mt-5">
    <form action="?type=article&action=edit" method="post" class="form-control p-4 border rounded shadow-sm">
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?= htmlspecialchars($article->getTitle()) ?>" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" rows="4" placeholder="Content" required><?= htmlspecialchars($article->getContent()) ?></textarea>
        </div>

        <input type="hidden" name="id" value="<?= $article->getId() ?>">

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Modifier l'article'</button>
        </div>
    </form>
</div>
