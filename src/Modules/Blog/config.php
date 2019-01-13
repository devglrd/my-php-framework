<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 21:03
 */


use Glrd\App\Modules\Blog\BlogModule;

return [
    'blog.prefix' => '/blog',
    'twig.extensions' => \DI\add([
        DI\get(\Glrd\App\Modules\Blog\BlogExtension::class)
    ]),
    BlogModule::class => DI\autowire()->constructorParameter('prefix', \DI\get("blog.prefix")),

];
