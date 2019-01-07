<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 17:49
 */

namespace Glrd\App\Modules\Blog;

use Glrd\Framework\Module;
use Glrd\Framework\Renderer\RendererInterface;
use Glrd\Framework\Router;

use Glrd\App\Modules\Blog\Actions\BlogAction;


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
