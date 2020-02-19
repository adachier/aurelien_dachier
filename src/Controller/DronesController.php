<?php

namespace App\Controller;

use App\Entity\Drone;
use App\Form\DroneType;
use App\Repository\DroneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/")
 */
class DronesController extends AbstractController
{
    /**
     * @Route("/admin", name="drone_index", methods={"GET"})
     */
    public function index(DroneRepository $droneRepository): Response
    {
        return $this->render('drone/index.html.twig', [
            'drones' => $droneRepository->findAll(),
        ]);
    }
    /**
     * @Route("/new", name="drone_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $drone = new Drone();
        $form = $this->createForm(DroneType::class, $drone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($drone);
            $entityManager->flush();

            $this->addFlash('success',  'Le drône a bien été créé');

            return $this->redirectToRoute('drone_index');
        }

        return $this->render('drone/new.html.twig', [
            'drone' => $drone,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function accueil (DroneRepository $droneRepository): Response
    {
        return $this->render('blog/home.html.twig', [
            'drones' => $droneRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="single_drone", methods={"GET"})
     */
    public function single(Drone $drone): Response
    {
        return $this->render('blog/show.html.twig', [
            'drone' => $drone,
        ]);
    }


    /**
     * @Route("/{id}", name="drone_show", methods={"GET"})
     */
    public function show(Drone $drone): Response
    {
        return $this->render('drone/show.html.twig', [
            'drone' => $drone,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="drone_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Drone $drone): Response
    {
        $form = $this->createForm(DroneType::class, $drone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success',  'Le drône a bien été modifié');
            
            return $this->redirectToRoute('drone_index');
            
        }

        return $this->render('drone/edit.html.twig', [
            'drone' => $drone,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="drone_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Drone $drone): Response
    {
        if ($this->isCsrfTokenValid('delete'.$drone->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($drone);
            $entityManager->flush();
        }
        $this->addFlash('success',  'Le drône a bien été supprimé');

        return $this->redirectToRoute('drone_index');
    }
}
