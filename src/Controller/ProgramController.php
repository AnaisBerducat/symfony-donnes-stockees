<?php

// src/Controller/ProgramController.php

namespace App\Controller;

use App\Entity\Program;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;


class ProgramController extends AbstractController

{

   /**
    * Show all rows from Program's entity

    * @Route("/", name="app_index")

    * @return Response A response instance

    */

   public function index(): Response

   {

       $programs = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findAll();

        return $this->render(
            'program/index.html.twig',
            ['programs' => $programs]
        );
   }

   /**

 * Getting a program by id

 *

 * @Route("/show/{id<^[0-9]+$>}", name="show")

 * @return Response

 */

    public function show(int $id):Response

    {

        $program = $this->getDoctrine()

            ->getRepository(Program::class)

            ->findOneBy(['id' => $id]);


        if (!$program) {

            throw $this->createNotFoundException(

                'Aucune série trouvée.'

            );

        }

        return $this->render('program/show.html.twig', [

            'program' => $program,

        ]);

    }

}