<?php
namespace App\Controller;
use Core\Controller\Controller;
use Core\View\View;

class HomeController extends Controller
{
   public function index()
   {
       return $this->render("home/index",["pageTitle"=>"Welcome to the framework"]);
   }
}
