<?php

namespace App\Controller;

use App\Service\SongGenerator;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    /**
     * @Route("/api/songs")
     */
    public function apiWriteSong(SongGenerator $songGenerator)
    {
        return $this->json([
            $songGenerator->generateSong('truck'),
        ]);
    }

    /**
     * @Route("/another-song")
     */
    public function writeAnotherSong(LoggerInterface $logger, SongGenerator $songGenerator)
    {
        $song = $songGenerator->generateSong('CMS');
        $logger->info('Time to sing!', [
            'song' => $song,
        ]);

        return $this->render('song/anotherSong.html.twig', [
            'song' => $song,
        ]);
    }
}
