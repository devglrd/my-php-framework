<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 18:18
 */

namespace Glrd\Framework\Renderer;

interface RendererInterface
{

    public function addPath(string $namespace, ?string $path = null): void;

    public function render(string $view, array $params = []): string;

    public function addGlobal(string $key, $value) : void;
}
