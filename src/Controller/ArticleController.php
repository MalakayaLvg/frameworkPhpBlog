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

    public function delete(): Response
    {
        $id = $_GET['id'] ?? null;

        if ($id && ctype_digit($id)) {
            $articleRepository = new ArticleRepository();
            $article = $articleRepository->find($id);

            if ($article) {
                $articleRepository->delete($article);
            }
        }

        return $this->redirect("?type=article&action=index");
    }

    public function edit(): Response
    {
        $id = $_POST['id'] ?? $_GET['id'] ?? null;

        if ($id && ctype_digit($id)) {
            $articleRepository = new ArticleRepository();
            $article = $articleRepository->find($id);

            if (!$article) {
                return $this->redirect();
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $title = $_POST['title'] ?? null;
                $content = $_POST['content'] ?? null;

                if ($title && $content) {
                    $article->setTitle($title);
                    $article->setContent($content);

                    $articleRepository->edit($article);

                    return $this->redirect("?type=article&action=index");
                }
            }

            return $this->render("article/edit", [
                "pageTitle" => $article->getTitle(),
                "article" => $article,
            ]);
        }

        return $this->redirect("?type=article&action=index");
    }

}
