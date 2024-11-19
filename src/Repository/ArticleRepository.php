<?php

namespace App\Repository;

use App\Entity\Article;
use Core\Attributes\TargetEntity;
use Core\Repository\Repository;


#[TargetEntity(name: Article::class)]
class ArticleRepository extends Repository
{
    public function save(Article $article): object
    {

        $query = $this->pdo->prepare("INSERT INTO $this->tableName (title, content) VALUES (:title, :content)");
        $query->execute([
            "title"=>$article->getTitle(),
            "content"=>$article->getContent()
        ]);

        return $this->find($this->pdo->lastInsertId());

    }

    public function edit(Article $article)
    {
        $query = $this->pdo->prepare("UPDATE $this->tableName SET name = :name, description = :description WHERE id = :id");
        $query->execute([
            "id"=>$article->getId(),
            "name"=>$article->getTitle(),
            "description"=>$article->getContent(),
        ]);

        return $this->find($article->getId());


    }

}
