<?php

namespace App\Controller;

use App\Entity\CountrySong;
use App\Form\CountrySongType;
use App\Repository\CountrySongRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/country/song")
 */
class CountrySongController extends Controller
{
    /**
     * @Route("/", name="country_song_index", methods="GET")
     */
    public function index(CountrySongRepository $countrySongRepository): Response
    {
        return $this->render('country_song/index.html.twig', ['country_songs' => $countrySongRepository->findAll()]);
    }

    /**
     * @Route("/new", name="country_song_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $countrySong = new CountrySong();
        $form = $this->createForm(CountrySongType::class, $countrySong);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($countrySong);
            $em->flush();

            return $this->redirectToRoute('country_song_index');
        }

        return $this->render('country_song/new.html.twig', [
            'country_song' => $countrySong,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="country_song_show", methods="GET")
     */
    public function show(CountrySong $countrySong): Response
    {
        return $this->render('country_song/show.html.twig', ['country_song' => $countrySong]);
    }

    /**
     * @Route("/{id}/edit", name="country_song_edit", methods="GET|POST")
     */
    public function edit(Request $request, CountrySong $countrySong): Response
    {
        $form = $this->createForm(CountrySongType::class, $countrySong);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('country_song_edit', ['id' => $countrySong->getId()]);
        }

        return $this->render('country_song/edit.html.twig', [
            'country_song' => $countrySong,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="country_song_delete", methods="DELETE")
     */
    public function delete(Request $request, CountrySong $countrySong): Response
    {
        if ($this->isCsrfTokenValid('delete'.$countrySong->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($countrySong);
            $em->flush();
        }

        return $this->redirectToRoute('country_song_index');
    }
}
