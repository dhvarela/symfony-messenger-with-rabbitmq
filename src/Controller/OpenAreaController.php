<?php

namespace App\Controller;

use App\Message\HappyMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\SerializerStamp;
use Symfony\Component\Routing\Annotation\Route;

class OpenAreaController extends AbstractController
{
    /**
     * @Route("/open/area", name="open_area")
     */
    public function index()
    {
        return $this->render('open_area/index.html.twig', [
            'controller_name' => 'OpenAreaController',
        ]);
    }

    /**
     * @Route("/msg", name="msg")
     * @param MessageBusInterface $bus
     * @return Response
     */
    public function msgAction(MessageBusInterface $bus)
    {
        $message = new HappyMessage( 'OMG, last night the DJ save my life', "A secret gift" );
        $envelope = new Envelope( $message );
        $bus->dispatch(
            $envelope->with(
                new SerializerStamp(
                    [
                        'groups' => ['happy_queue_group'],
                    ]
                )
            )
        );
        return new Response( "done" );
    }
}
