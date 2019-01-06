<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 22:01
 */

namespace App\Modules\Blog;

class DemoExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('demo', [$this, 'demo'])
        ];
    }

    public function demo()
    {
        return 'Salut';
    }
}
