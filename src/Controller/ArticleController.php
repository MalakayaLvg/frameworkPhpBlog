<?php
namespace App\Controller;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use Core\Http\Response;
class ArticleController extends \Core\Controller\Controller {
    public function index():Response
    {
        $articleRepository = new ArticleRepository();
        return $this->render("article/index", [
            "pageTitle"=>"Les articles",
            "articles"=>$articleRepository->findAll()
        ]);
    }

    public function create():Response
    {
        $title = null;
        $content = null;
        if(!empty($_POST['title'])){
            $title = $_POST['title'];
        }
        if(!empty($_POST['content'])){
            $content = $_POST['content'];
        }
        if($title && $content)
        {
            $article = new Article();
            $article->setTitle($title);
            $article->setContent($content);
            $articleRepository = new ArticleRepository();
            $article =  $articleRepository->save($article);
            return $this->redirect("?type=article&action=index");
        }
        return $this->render("article/create", [
            "pageTitle"=>"Nouvel Article"
        ]);
    }

}
