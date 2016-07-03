<?php

namespace Mateusjatenee\Iugu;

use Artesaos\Restinga\Authorization\Basic;
use Artesaos\Restinga\Service\Descriptor;

class ServiceDescriptor extends Descriptor
{

    protected $service = 'iugu';

    protected $prefix = 'https://api.iugu.com/v1';

    protected $key;

    public function __construct($key)
    {
        $this->key = $key;

    }

    public function authorization()
    {
        return new Basic($this->key, '');
    }
}
