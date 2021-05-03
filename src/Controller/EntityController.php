<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Entity;
use App\Form\EntityType;
use App\Repository\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/entity")
 */
class EntityController extends AbstractController
{
    /**
     * @Route("/", name="entity_index", methods={"GET"})
     */
    public function index(EntityRepository $entityRepository): Response
    {
        
		$entity = $entityRepository->findAll();
		
		
		return $this->render('entity/index.html.twig', [
            'entities' => $entity,
        ]);
		
	}

    /**
     * @Route("/new", name="entity_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
		$entity = new Entity();
        $form = $this->createForm(EntityType::class, $entity);
        $form->handleRequest($request);
       
        if ($form->isSubmitted() && $form->isValid()) {
		
			// relates this entity to the category
            //$entity->setCategory($category);
			
            $entityManager = $this->getDoctrine()->getManager();
			//$entityManager->persist($category);
            $entityManager->persist($entity);
            $entityManager->flush();

            return $this->redirectToRoute('entity_index');
        }

        return $this->render('entity/new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="entity_show", methods={"GET"})
     */
    
	public function show(Entity $entity): Response
    {
       return $this->render('entity/show.html.twig', [
            'entity' => $entity,
			]);
	} 
	
    /**
     * @Route("/{id}/edit", name="entity_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Entity $entity): Response
    {
        $form = $this->createForm(EntityType::class, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entity_index');
        }

        return $this->render('entity/edit.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="entity_delete", methods={"POST"})
     */
    public function delete(Request $request, Entity $entity): Response
    {
        if ($this->isCsrfTokenValid('delete'.$entity->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($entity);
            $entityManager->flush();
        }

        return $this->redirectToRoute('entity_index');
    }
}
