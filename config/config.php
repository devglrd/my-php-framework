<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 20:23
 */

use Glrd\Framework\Renderer\RendererInterface;
use Glrd\Framework\Router;

return [
    'views.path' => dirname(__DIR__) . "/views",
    'twig.extensions' => [
        DI\get(\Framework\Router\RouterTwigExtension::class)
    ],
    RendererInterface::class => DI\factory(\Glrd\Framework\Renderer\TwigRendererFactory::class),
    Router::class => function () {
        return new Router();
    },
    "database.host" => '127.0.0.1',
    "database.username" => 'root',
    "database.password" => '',
    "database.name" => "php-fw",
];