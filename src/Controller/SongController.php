<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SongController extends AbstractController
{
    public function apiWriteSong()
    {
        return $this->json([
            'I rode my truck, through some mud',
        ]);
    }
}
