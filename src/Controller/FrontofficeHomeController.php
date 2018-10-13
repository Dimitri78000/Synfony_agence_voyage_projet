<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ProgrammationCircuit;

class FrontofficeHomeController extends AbstractController
{
    /**
     * @Route("/home", name="frontoffice_home")
     */
    public function index()
    {
        // entityManager
        $em = $this->getDoctrine()->getManager();

        $prog_circuits = $em->getRepository(ProgrammationCircuit::class)->findAll();

        return $this->render('front/home.html.twig', [
            'prog_circuits' => $prog_circuits
        ]);
    }

    /**
     * Finds and displays a programmationCircuit entity.
     *
     * @Route("/circuit/{id}", name="front_circuit_show")
     */
    public function progCircuitShow($id)
    {
        $em = $this->getDoctrine()->getManager();

        $prog_circuit = $em->getRepository(ProgrammationCircuit::class)->find($id);


        return $this->render('front/circuit_show.html.twig', [
            'prog_circuit' => $prog_circuit
        ]);
    }
}
