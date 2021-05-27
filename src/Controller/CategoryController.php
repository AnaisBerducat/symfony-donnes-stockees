<?php

// src/Controller/CategoryController.php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController

{

   /**
    * Show all rows from Category's entity

    * @Route("/categories/", name="category_index")

    * @return Response A response instance

    */

   public function index(): Response

   {

       $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        return $this->render(
            'category/index.html.twig',
            ['category' => $category]
        );
   }

   /**

 * Getting a category by Name

 *

 * @Route("/categories/{categoryName}", name="category_show")

 * @return Response

 */

    public function show(string $categoryName):Response

    {

        $categoryName = $this->getDoctrine()

            ->getRepository(categoryName::class)

            ->findBy(['categoryName' => $categoryName], array('id' => 'DESC'),3,0);


        if (!$categoryName) {

            throw $this->createNotFoundException(

                'No program with categoryName : '.$categoryName.' found in program\'s table.'

            );

        }

        return $this->render('category/show.html.twig', [

            'categoryName' => $categoryName,

        ]);

    }

}