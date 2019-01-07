<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 14:46
 */


require dirname(__DIR__) . '/vendor/autoload.php';


$modules = [
    \Glrd\App\Modules\Blog\BlogModule::class
];

$builder = new \DI\ContainerBuilder();
$builder->addDefinitions(dirname(__DIR__) . "/config/config.php");


foreach ($modules as $module) {
    var_dump($module);
    var_dump(class_exists($module)); //Why class not exists ?
    die();
    if ($module::DEFINITIONS) {
        $builder->addDefinitions($module::DEFINITIONS);
    }
}

$builder->addDefinitions(dirname(__DIR__) . "/config.php");

$container = $builder->build();


$app = new Glrd\Framework\App($container, $modules);

if (php_sapi_name() !== "cli") {
    $response = $app->run(\GuzzleHttp\Psr7\ServerRequest::fromGlobals());
    \Http\Response\send($response);
}
