<?php

namespace App\Controller;

use App\Service\VukhtantuGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class VukhtantuController extends AbstractController
{
    #[Route('/vukhtantu', name: 'vukhtantu')]
    public function titanrath(VukhtantuGenerator $vukhtantuGenerator): Response
    {
        return $this->json(
            ['data' => $vukhtantuGenerator->getIndex()],
            Response::HTTP_OK,
            [
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Headers' => '*',
            ]
        );
    }

    #[Route('/vukhtantu/description', name: 'vukhtantu-description')]
    public function titanrathDescription(VukhtantuGenerator $vukhtantuGenerator): Response
    {
        return $this->json(
            ['data' => $vukhtantuGenerator->getDescription()],
            Response::HTTP_OK,
            [
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Headers' => '*',
            ]);
    }
}
