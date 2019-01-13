<?php

namespace Tests\Framework\Renderer;

use Glrd\Framework\Renderer\PHPRenderer;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 20:05
 */
class PHPRendererTest extends TestCase
{
    private $renderer;

    public function setUp()
    {
        $this->renderer = new PHPRenderer();
        $this->renderer->addPath(__DIR__ . "/views");
    }

    public function testRendererTheRigthPath()
    {
        $this->renderer->addPath('blog', __DIR__ . "/views");
        $content = $this->renderer->render("@blog/demo");
        $this->assertEquals('Salut les gens', $content);
    }

    public function testRendererTheDefaultPath()
    {
        $content = $this->renderer->render("demo");
        $this->assertEquals('Salut les gens', $content);
    }

    public function testRenderWithParams()
    {
        $content = $this->renderer->render("demoparams", ['nom' => 'Jean']);
        $this->assertEquals('Salut toi Jean', $content);
    }

    public function testGlobalParameters()
    {
        $this->renderer->addGlobal('nom', 'Marc');
        $content = $this->renderer->render('demoparams');
        $this->assertEquals('Salut toi Marc', $content);
    }
}