<?php

namespace App\Controller;

use App\Entity\PFE;
use App\Form\PfeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddpfeController extends AbstractController
{
    /**
     * @Route("/addpfe", name="app_addpfe")
     */
    public function add(Request $request, EntityManagerInterface $manager): Response
    {
        $pfe= new PFE();
        $form=$this->createForm(PfeType::class,$pfe);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $manager->persist($pfe);
            $manager->flush();
            return $this->redirectToRoute('affiche', ['pfe' => $pfe]);
        }
        return $this->render('addpfe/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/affichepfe", name="affiche")
     */
    public function affiche($pfe): Response

    {
        return $this->render('affiche/index.html.twig', ['pfe' => $pfe]);
    }
    }

