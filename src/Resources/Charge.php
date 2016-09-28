<?php

namespace Mateusjatenee\Iugu\Resources;

use Artesaos\Restinga\Data\Resource;
use Artesaos\Restinga\Http\Format\Receive\ReceiveJson;
use Artesaos\Restinga\Http\Format\Receive\ReceiveJsonErrors;
use Artesaos\Restinga\Http\Format\Send\SendJson;

class Charge extends Resource
{
    use ReceiveJson, SendJson;

    use ReceiveJsonErrors;

    protected $service = 'iugu';

    protected $name = 'charge';

    protected $identifier = 'invoice_id';

    protected $item_root = null;

    public function charge(array $data)
    {
        $this->token = $data['token'];
        $this->email = $data['email'];
        $this->items = $data['items'];
        $this->payer = $data['payer'] ?? null;

        $this->save();
    }
}
