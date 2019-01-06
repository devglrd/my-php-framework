<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 21:03
 */

use App\Modules\Blog\BlogModule;

return [
    'blog.prefix' => '/blog',
    'twig.extensions' => \DI\add([
        DI\get(\App\Modules\Blog\DemoExtension::class)
    ]),
    BlogModule::class => DI\autowire()->constructorParameter('prefix', \DI\get("blog.prefix"))
];
