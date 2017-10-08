<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Mention;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $mentionRepository = $this->getDoctrine()->getRepository(Mention::class);
        $mentions = $mentionRepository->findAll();
        dump($mentions);die;
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'mentions' => $mentions,
        ]);
    }
}
