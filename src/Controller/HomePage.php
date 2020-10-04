<?php
/**
 * Created by IntelliJ IDEA.
 * User: hp
 * Date: 02/10/2020
 * Time: 07:18
 */

namespace App\Controller;

use App\Repository\AgentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePage extends AbstractController
{
    /**
     * @Route("/",name="home.index")
     * @param AgentRepository $repository
     * @return Response
     */
    public function index(AgentRepository $repository):Response
    {
        $agents = $repository->findLatest();
        return $this->render('pages/home.html.twig',['agents' => $agents ]);
    }

}