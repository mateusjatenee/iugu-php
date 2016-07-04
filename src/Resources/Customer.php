<?php

namespace Mateusjatenee\Iugu\Resources;

use Artesaos\Restinga\Data\Resource;
use Artesaos\Restinga\Http\Format\Receive\ReceiveJson;
use Artesaos\Restinga\Http\Format\Receive\ReceiveJsonErrors;
use Artesaos\Restinga\Http\Format\Send\SendJson;

class Customer extends Resource
{
    use ReceiveJson, SendJson;

    use ReceiveJsonErrors;

    protected $service = 'iugu';

    protected $name = 'customers';

    protected $identifier = 'id';

    protected $collection_root = 'customers';

    protected $item_root = null;

    public function addInformation(array $data)
    {
        $this->attributes['email'] = $data['email'];
        $this->attributes['name'] = isset($data['name']) ? $data['name'] : null;
        $this->attributes['notes'] = isset($data['notes']) ? $data['notes'] : null;
    }

}
