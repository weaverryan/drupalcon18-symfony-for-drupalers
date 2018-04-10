<?php

namespace App\Controller;

use App\Entity\CountrySong;
use App\Service\SongGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    /**
     * @Route("/api/songs", methods="POST")
     */
    public function apiWriteSong(SongGenerator $songGenerator, EntityManagerInterface $em)
    {
        $song = new CountrySong();
        $song->setTitle($songGenerator->generateSong('truck'));
        $em->persist($song);
        $em->flush();

        return $this->json([
            'title' => $song->getTitle(),
            'id' => $song->getId(),
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
