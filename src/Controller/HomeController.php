<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(Environment $twigEnvironment): Response
    {
        /*
        //exemple plus long qui permet d'identifier comment fonctionne les raccourcis de services dans symfony (avec l'exemple de Twig)
        $html = $twigEnvironment->render('home/homepage.html.twig');
        return new Response($html);
        */
        return $this->render('home/homepage.html.twig');
    }

    /**
     * @Route("/test/{text}", name="app_question_show")
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