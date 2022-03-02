<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(): Response
    {
        return new Response("<html><h1>Salut la team bien ou quoi ?</h1></html>");
    }

    /**
     * @Route("/test/{text}")
     */
    public function show($text): Response
    {
        $answers = ["toto","tata","j'aime les pâtes","et puis voilà"];
        return $this->render('home/show.html.twig',[
            'text'=> ucwords(str_replace('-',' ', $text)),
            'answers'=> $answers,
        ]);
    }
}