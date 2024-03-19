<?php

namespace App\Controller;

use App\Service\TitanrathGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function titanrath(TitanrathGenerator $titanrathGenerator): Response
    {
        $data = [
            [
                'path' => 'titanrath',
                'method' => 'GET',
                'response' => [
                    'data' => $titanrathGenerator->getIndex()
                ]
            ]
        ];
        $html = file_get_contents(__DIR__ . '/../../public/main.html');
        $html = preg_replace('/(body)/', '$1 data-api="' . htmlentities(json_encode($data)) . '"', $html);

        return new Response($html);
    }

    #[Route('/description', name: 'description')]
    public function description(TitanrathGenerator $titanrathGenerator): Response
    {
        $data = [
            [
                'path' => 'titanrath/description',
                'method' => 'GET',
                'response' => [
                    'data' => $titanrathGenerator->getDescription()
                ]
            ]
        ];
        $html = file_get_contents(__DIR__ . '/../../public/main.html');
        $html = preg_replace('/(body)/', '$1 data-api="' . htmlentities(json_encode($data)) . '"', $html);

        return new Response($html);
    }
}
