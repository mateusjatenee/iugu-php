<?php

namespace Mateusjatenee\Iugu\Resources;

use Artesaos\Restinga\Data\Resource;
use Artesaos\Restinga\Http\Format\Receive\ReceiveJson;
use Artesaos\Restinga\Http\Format\Receive\ReceiveJsonErrors;
use Artesaos\Restinga\Http\Format\Send\SendJson;

class Token extends Resource
{
    use ReceiveJson, SendJson;

    use ReceiveJsonErrors;

    protected $service = 'iugu';

    protected $name = 'payment_token';

    protected $identifier = 'id';

    protected $item_root = null;

    public function setCreditCardInfo(array $data)
    {
        $this->account_id = $data['account_id'];
        $this->method = 'credit_card';
        $this->data = [
            'number'             => $data['number'],
            'verification_value' => $data['verification_value'],
            'first_name'         => $data['first_name'],
            'last_name'          => $data['last_name'],
            'month'              => $data['month'],
            'year'               => $data['year'],
        ];
    }
}
