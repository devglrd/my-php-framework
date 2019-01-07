<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 21:45
 */

namespace Glrd\Framework\Router;

use Glrd\Framework\Router;

class RouterTwigExtension extends \Twig_Extension
{

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('path', [$this, 'pathFor'])
        ];
    }

    public function pathFor(string $path, array $params = [])
    {
        return $this->router->generateUri($path, $params);
    }
}
