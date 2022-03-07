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
        return $this->render('home/homepage.html.twig');
    }

    /**
     * @Route("/test/{text}")
     */
    public function show($text): Response
    {
        $answers = ["toto","tata","j'aime les pâtes","et puis voilà"];
        return $this->render('home/show.html.twig',[
            'question'=> ucwords(str_replace('-',' ', $text)),
            'answers'=> $answers,
        ]);
    }
}