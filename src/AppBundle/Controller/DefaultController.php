<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Mention;
use AppBundle\Twitter\Statuses;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     * @param Statuses $statuses
     * @return Response
     */
    public function indexAction(Request $request, Statuses $statuses)
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            $reply = $request->request->get('reply');
            $userName = $request->request->get('user_name');

            $message = sprintf("@%s %s", $userName, $reply);
            $statuses->postStatus($message);
        }

        $mentionRepository = $this->getDoctrine()->getRepository(Mention::class);
        $mentionUsers = $mentionRepository->getUsers();

        foreach ($mentionUsers as $k => $userData) {
            $mentions = $mentionRepository->findBy(['userId' => $userData['userId']]);
            $mentionUsers[$k]['mentions'] = $mentions;
        }

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'users' => $mentionUsers,
        ]);
    }
}
