<?php

namespace Mateusjatenee\Iugu\Resources;

use Artesaos\Restinga\Data\Resource;
use Artesaos\Restinga\Http\Format\Receive\ReceiveJson;
use Artesaos\Restinga\Http\Format\Receive\ReceiveJsonErrors;
use Artesaos\Restinga\Http\Format\Send\SendJson;

class Transfer extends Resource
{
    use ReceiveJson, SendJson;

    use ReceiveJsonErrors;

    protected $service = 'iugu';

    protected $name = 'transfers';

    protected $identifier = 'id';

    protected $collection_root = null;

    protected $item_root = null;

    public function setInformation(array $data)
    {
        $this->attributes['receiver_id'] = $data['receiver_id'];

        $this->attributes['amount_cents'] = $data['amount_cents'];

        return $this;
    }

}
