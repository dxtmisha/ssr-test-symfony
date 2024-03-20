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
        $item = $titanrathGenerator->getIndex();

        return new Response(
            $this->getHtml('titanrath', $item)
        );
    }

    #[Route('/description', name: 'description')]
    public function description(TitanrathGenerator $titanrathGenerator): Response
    {
        $item = $titanrathGenerator->getDescription();

        return new Response(
            $this->getHtml('titanrath/description', $item)
        );
    }

    /**
     * Возвращает код HTML с добавленным кодом JSON
     * @param string $path
     * @param array $item
     * @return string
     */
    private function getHtml(string $path, array $item): string
    {
        $data = [
            [
                'path' => $path,
                'method' => 'GET',
                'response' => [
                    'data' => $item
                ]
            ]
        ];

        $html = file_get_contents(__DIR__ . '/../../public/main.html');
        $html = preg_replace('/(<body)/', '$1 data-api="' . htmlentities(json_encode($data)) . '"', $html);
        $html = preg_replace('/(?<=<title>)([^<]+)(?=<)/', $item['title'], $html);

        return preg_replace('/(<\/head>)/', '<meta name="description" content="' . htmlentities(json_encode($item['description'])) . '">$1', $html);
    }
}
