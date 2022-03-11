<?php

namespace App\Controller;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
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
        $tables = ["affaire","client","equipement","composant","fabricant","distributeur"];
        return $this->render('home/homepage.html.twig',[
            'tables' => $tables
        ]);
    }

    /**
     * @Route("/test/{text}", name="app_question_show")
     */
    public function show($text, MarkdownParserInterface $markdownParser): Response
    {

        $questionText = "How do i make **you** love me ?";
        $parsedQuestionText = $markdownParser->transformMarkdown($questionText);
        $answers = ["toto","tata","j'aime les `pâtes`","et puis voilà"];
        return $this->render('home/show.html.twig',[
            'question'=> ucwords(str_replace('-',' ', $text)),
            'questionText' => $parsedQuestionText,
            'answers'=> $answers,
        ]);
    }
}