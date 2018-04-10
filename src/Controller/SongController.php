<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    /**
     * @Route("/api/songs")
     */
    public function apiWriteSong()
    {
        return $this->json([
            'I rode my truck, through some mud',
        ]);
    }
}
