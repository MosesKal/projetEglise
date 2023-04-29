<?php

namespace App\Controller;

use App\Entity\Cellule;
use App\Form\CelluleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cellule')]
class CelluleController extends AbstractController
{
    #[Route('/', name: 'app_cellule_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $cellules = $entityManager
            ->getRepository(Cellule::class)
            ->findAll();

        return $this->render('cellule/index.html.twig', [
            'cellules' => $cellules,
        ]);
    }

    #[Route('/new', name: 'app_cellule_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cellule = new Cellule();
        $form = $this->createForm(CelluleType::class, $cellule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cellule);
            $entityManager->flush();

            return $this->redirectToRoute('app_cellule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cellule/new.html.twig', [
            'cellule' => $cellule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cellule_show', methods: ['GET'])]
    public function show(Cellule $cellule): Response
    {
        return $this->render('cellule/show.html.twig', [
            'cellule' => $cellule,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cellule_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cellule $cellule, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CelluleType::class, $cellule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_cellule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cellule/edit.html.twig', [
            'cellule' => $cellule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cellule_delete', methods: ['POST'])]
    public function delete(Request $request, Cellule $cellule, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cellule->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cellule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_cellule_index', [], Response::HTTP_SEE_OTHER);
    }
}
