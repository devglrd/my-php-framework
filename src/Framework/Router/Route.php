<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 17:11
 */

namespace Framework\Router;

class Route
{

    /**
     * @var string
     */
    private $name;
    /**
     * @var callable
     */
    private $callback;
    /**
     * @var array
     */
    private $param;

    public function __construct(string $name, callable $callback, array $param)
    {

        $this->name = $name;
        $this->callback = $callback;
        $this->param = $param;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return callable
     */
    public function getCallback(): callable
    {
        return $this->callback;
    }

    /**
     * Get Url Parameter
     * @return array
     */
    public function getParams(): array
    {
        return $this->param;
    }
}
