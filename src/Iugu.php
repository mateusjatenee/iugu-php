<?php

namespace Mateusjatenee\Iugu;

use Artesaos\Restinga\Container;

class Iugu
{
    /**
     * @param $key
     */
    public static function setApiKey($key)
    {
        $descriptor = new ServiceDescriptor($key);
        Container::register($descriptor);
    }
}
