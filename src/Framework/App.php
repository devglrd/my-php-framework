<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 14:50
 */

namespace Framework;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class App
{


    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $uri = $request->getUri()->getPath();

        if (!empty($uri) && $uri[-1] === "/") {
            $response = (new Response())
                ->withStatus(301)
                ->withHeader("Location", substr($uri, 0, -1));
            return $response;
        }

        if ($uri === "/blog") {
            return new Response(200, [], "<h1>Bievenue sur le blog</h1>");
        }

        return $response = new Response(404, [], "<h1>Erreur 404</h1>");
    }
}
