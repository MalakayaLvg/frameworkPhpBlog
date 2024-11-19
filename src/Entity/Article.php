<?php
namespace App\Entity;
use App\Repository\ArticleRepository;
use Core\Attributes\Table;
use Core\Attributes\TargetRepository;
#[TargetRepository(name: ArticleRepository::class)]
#[Table(name: "articles")]
class Article
{
    private int $id;
    private string $title;
    private string $content;
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}
