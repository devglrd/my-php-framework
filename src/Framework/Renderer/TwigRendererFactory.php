<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 20:31
 */

namespace Glrd\Framework\Renderer;

use Psr\Container\ContainerInterface;

class TwigRendererFactory
{
    /**
     * @param ContainerInterface $container
     * @return TwigRenderer
     */
    public function __invoke(ContainerInterface $container): TwigRenderer
    {
        $loader = new \Twig_Loader_Filesystem($container->get("views.path"));
        $twig = new \Twig_Environment($loader);
        if ($container->has("twig.extensions")) {
            foreach ($container->get('twig.extensions') as $extension) {
                $twig->addExtension($extension);
            }
        }
        return new TwigRenderer($loader, $twig);
    }
}
