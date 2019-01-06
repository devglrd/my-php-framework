<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 18:07
 */

namespace Tests\Framework\Modules;
use Framework\Router;
use stdClass;


/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 18:02
 */

class StringModule
{
    public function __construct(Router $router)
    {
        $router->get('/demo', function(){
            return "DEMO";
        }, 'demo');
    }
}