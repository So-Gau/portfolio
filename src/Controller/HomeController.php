<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\SkillRepository;
use App\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
   public function index(SkillRepository $skillRepository, ProjectRepository $projectRepository): Response
   {
       return $this->render('home/index.html.twig', [
            'skills' => $skillRepository->findAll(),
            'projects' => $projectRepository->findAll(),
       ]);
   }


}