<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Routing\Annotation\Route;

class PushController
{
    public function __construct(private readonly HubInterface $hub) {}

    /**
     * @Route("/push", name="app_push")
     */
    public function push(): Response
    {
        $this->hub->publish(new Update(
            'foo',
            json_encode(['status' => 'OutOfStock'])
        ));

        return new Response('Published!');
    }
}
