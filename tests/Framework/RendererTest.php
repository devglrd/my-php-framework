<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 18:18
 */

namespace Tests\Framework;


use Framework\Renderer;
use PHPUnit\Framework\TestCase;

class RendererTest extends TestCase
{

    private $renderer;

    public function setUp()
    {
        $this->renderer = new Renderer();
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