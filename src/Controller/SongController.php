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

    /**
     * @Route("/another-song")
     */
    public function writeAnotherSong()
    {
        $song = 'Back-road, boot-scooting, honkey-tonkin CMS';

        return $this->render('song/anotherSong.html.twig', [
            'song' => $song,
        ]);
    }
}
