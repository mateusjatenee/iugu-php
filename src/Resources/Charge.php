<?php

namespace Mateusjatenee\Iugu\Resources;

use Artesaos\Restinga\Data\Resource;
use Artesaos\Restinga\Http\Format\Receive\ReceiveJson;
use Artesaos\Restinga\Http\Format\Receive\ReceiveJsonErrors;
use Artesaos\Restinga\Http\Format\Send\SendJson;
use Mateusjatenee\Iugu\Exceptions\InvalidPayerException;

class Charge extends Resource
{
    use ReceiveJson, SendJson;

    use ReceiveJsonErrors;

    protected $service = 'iugu';

    protected $name = 'charge';

    protected $identifier = 'invoice_id';

    protected $item_root = null;

    protected $bank_slip = false;

    public function setInformation(array $data)
    {
        if ($this->bank_slip) {
            $this->method = 'bank_slip';
        } else {
            $this->token = $data['token'];
        }

        $this->email = $data['email'];
        $this->items = $data['items'];

        if (!isset($data['payer']) && $this->bank_slip) {
            throw new InvalidPayerException('The payer array is required because of bank slip');
        }

        $this->payer = $data['payer'] ?? null;

        return $this;
    }

    public function setBankSlip()
    {
        $this->bank_slip = true;
    }

    public function charge()
    {
        return $this->save();
    }
}
