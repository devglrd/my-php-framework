<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 14:50
 */

namespace Glrd\Framework;

use GuzzleHttp\Psr7\Response;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class App
{

    private $modules = [];


    private $router;

    private $container;

    /**
     * App constructor.
     * @param ContainerInterface $container
     * @param array $modules Liste des modules à charger
     */
    public function __construct(ContainerInterface $container, array $modules = [])
    {
//        $this->router = new Router();
//        if (array_key_exists('renderer', $dependencies)) {
//            $dependencies['renderer']->addGlobal('router', $this->router);

        $this->container = $container;
        foreach ($modules as $module) {
            $this->modules[] = $container->get($module);
        }
    }

    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $uri = $request->getUri()->getPath();

        if (!empty($uri) && $uri[-1] === "/") {
            $response = (new Response())
                ->withStatus(301)
                ->withHeader("Location", substr($uri, 0, -1));
            return $response;
        }

        $router = $this->container->get(Router::class);
        $route = $router->match($request);
        if (is_null($route)) {
            return new Response(404, [], '<h1>Erreur 404</h1>');
        }
        $params = $route->getParams();

        $request = array_reduce(array_keys($params), function ($request, $key) use ($params) {
            return $request->withAttribute($key, $params[$key]);
        }, $request);


        $callback = $route->getCallback();
        if (is_string($callback)) {
            $callback = $this->container->get($callback);
        }
        $response = call_user_func_array($callback, [$request]);
        if (is_string($response)) {
            return $response = new Response(200, [], "$response");
        } elseif ($response instanceof ResponseInterface) {
            return $response;
        } else {
            throw new \Exception("The response is not a string or an instance of responseInterface");
        }
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }
}
