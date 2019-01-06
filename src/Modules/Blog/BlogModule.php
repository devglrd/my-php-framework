<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 17:49
 */

namespace App\Modules\Blog;

use App\Modules\Blog\Actions\BlogAction;
use Framework\Module;
use Framework\Renderer\RendererInterface;
use Framework\Router;

class BlogModule extends Module
{
    const DEFINITIONS = __DIR__ . '/config.php';

    private $renderer;

    public function __construct(string $prefix, Router $router, RendererInterface $renderer)
    {
        $renderer->addPath('blog', __DIR__ . '/views');
        $router->get($prefix, BlogAction::class, "blog.index");
        $router->get($prefix . '/{slug:[a-z\-0-9]+}', BlogAction::class, "blog.show");
    }
}
