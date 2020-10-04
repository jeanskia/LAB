<?php
/**
 * Created by IntelliJ IDEA.
 * User: hp
 * Date: 02/10/2020
 * Time: 09:06
 */

namespace App\Controller;


use App\Entity\Agent;
use App\Repository\AgentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgentsController extends  AbstractController
{
    /**
     * @var AgentRepository
     */
    private $repository;

    public function __construct(AgentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/agent",name="agents.index")
     * @return Response
     */
    public function index():Response
    {
        $agents = $this->repository->findAllVisibleQuery();
        return $this->render('agent/index.html.twig',[
            'current_menu'=> 'agents',
            'agents' => $agents
            ]);
    }

    /**
     * @Route("/agent/{slug}-{id}",name="agent.show",requirements={"slug"="[a-z0-9\-]*"})
     * @param Agent $agent
     * @return Response
     */
    public function show(Agent $agent,string $slug):Response
    {
        if($agent->getSlug() !== $slug){
            return $this->redirectToRoute('agent.show',[
                'id' => $agent->getId(),
                'slug' => $agent->getSlug()
            ], 301);
        }
        //$agent = $this->repository->find($id);
        return $this->render('agent/show.html.twig',[
            'current_menu'=> 'agents',
            'agent' => $agent
        ]);
    }

}