<?php

namespace App\Controller;

use App\Service\TitanrathGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TitanrathController extends AbstractController
{
    #[Route('/titanrath', name: 'titanrath')]
    public function titanrath(TitanrathGenerator $titanrathGenerator): Response
    {
        return $this->json([
            'data' => $titanrathGenerator->getIndex()
        ]);
    }

    #[Route('/titanrath/description', name: 'titanrath-description')]
    public function titanrathDescription(TitanrathGenerator $titanrathGenerator): Response
    {
        return $this->json([
            'data' => $titanrathGenerator->getDescription()
        ]);
    }
}
