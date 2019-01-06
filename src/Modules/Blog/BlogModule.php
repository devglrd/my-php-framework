<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 17:49
 */

namespace App\Modules\Blog;

use Framework\Router;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class BlogModule
{


    public function __construct(Router $router)
    {
        $router->get('/blog', [$this, "index"], "blog.index");
        $router->get('/blog/{slug:[a-z\-]+}', [$this, "show"], "blog.show");
    }

    public function index(ServerRequestInterface $request): string
    {
        return '<h1>Bienvenue sur le blog</h1>';
    }

    public function show(ServerRequestInterface $request): string
    {

        return '<h1>Bienvenue sur l\'article '. $request->getAttribute('slug') .'</h1>';
    }
}
