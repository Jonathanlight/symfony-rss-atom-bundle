<?php

namespace App\Controller;

use App\Feed\Consumer;
use App\Form\RssType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param Consumer $consumer
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function index(Consumer $consumer, Request $request)
    {
        $form = $this->createForm(RssType::class, null);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $feed = $consumer->read($data['url']);
            dump($feed);
        }

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'form' => $form->createView(),
        ]);
    }
}
