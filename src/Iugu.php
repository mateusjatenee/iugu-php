<?php

namespace Mateusjatenee\Iugu;

use Artesaos\Restinga\Container;
use Mateusjatenee\Iugu\ServiceDescriptor;

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
