<?php

namespace Framework;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 *
 */
class App
{

    /**
     * Lance l'application
     */
    public function run(ServerRequestInterface $request): ResponseInterface
    {

        $uri = $request->getUri()->getPath();

        if (!empty($uri) && $uri[-1] === "/") {
            $response = new Response();

            $response = $response->withStatus(301);

            $response = $response->withHeader('Location', substr($uri, 0, -1));

            return $response;
        }

        $response = new Response();

        $response->getBody()->write('Bonjour les amis');

        return $response;
    }
}
