<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
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
    public function writeAnotherSong(LoggerInterface $logger)
    {
        $song = 'Back-road, boot-scooting, honkey-tonkin CMS';
        $logger->info('Time to sing!', [
            'song' => $song,
        ]);

        return $this->render('song/anotherSong.html.twig', [
            'song' => $song,
        ]);
    }
}
