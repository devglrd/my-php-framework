<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 17:10
 */

namespace Glrd\Framework;

use Glrd\Framework\Router\Route;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Router\FastRouteRouter;
use Zend\Expressive\Router\Route as ZendRoute;

class Router
{

    private $router;

    public function __construct()
    {
        $this->router = new FastRouteRouter();
    }

    /**
     * @param string $path
     * @param callable $callable
     * @param string $name
     */
    public function get(string $path, $callable, string $name)
    {
        $this->router->addRoute(new ZendRoute($path, $callable, ["GET"], $name));
    }

    /**
     * @param ServerRequestInterface $request
     * @return Route|null
     */
    public function match(ServerRequestInterface $request): ?Route
    {
        $result = $this->router->match($request);
        return $result->isSuccess() ? new Route($result->getMatchedRouteName(), $result->getMatchedMiddleware(), $result->getMatchedParams()) : null;
    }

    public function generateUri(string $name, array $params): ?string
    {
        return $this->router->generateUri($name, $params);
    }
}
