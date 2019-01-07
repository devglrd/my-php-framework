<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 21:03
 */


return [
    'blog.prefix' => '/blog',
    'twig.extensions' => \DI\add([
        DI\get(\Glrd\App\Modules\DemoExtension::class)
    ]),
    Glrd\App\Modules\Blog\BlogModule::class => DI\autowire()->constructorParameter('prefix', \DI\get("blog.prefix")),

];
