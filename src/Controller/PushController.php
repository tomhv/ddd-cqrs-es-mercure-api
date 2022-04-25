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
     * @Route("/push/{message}", name="app_push")
     */
    public function push(string $message = 'hello'): Response
    {
        $this->hub->publish(new Update(
            'https://localhost/messages',
            json_encode(['body' => $message])
        ));

        return new Response('Published!');
    }
}
