<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 20:23
 */

use Framework\Renderer\RendererInterface;
use Framework\Router;

return [
    'views.path' => dirname(__DIR__) . "/views",
    'twig.extensions' => [
        DI\get(Router\RouterTwigExtension::class)
    ],
    RendererInterface::class => DI\factory(\Framework\Renderer\TwigRendererFactory::class),
    Router::class => function ()
{
    return new Router();
}
];