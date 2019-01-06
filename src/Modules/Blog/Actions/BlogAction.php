<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 21:31
 */

namespace App\Modules\Blog\Actions;

use Framework\Renderer\RendererInterface;
use Psr\Http\Message\ServerRequestInterface;

class BlogAction
{


    /**
     * @var RendererInterface
     */
    private $renderer;


    public function __invoke(ServerRequestInterface $request)
    {
        $slug = $request->getAttribute("slug");
        if ($slug) {
            return $this->show($slug);
        }
        return $this->index();
    }

    public function __construct(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    public function index(): string
    {
        return $this->renderer->render('@blog/index');
    }

    public function show(string $slug): string
    {

        return $this->renderer->render('@blog/show', [
            'slug' => $slug
        ]);
    }
}
