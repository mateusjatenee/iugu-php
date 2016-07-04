<?php

namespace Mateusjatenee\Iugu\Resources;

use Artesaos\Restinga\Data\Resource;
use Artesaos\Restinga\Http\Format\Receive\ReceiveJson;
use Artesaos\Restinga\Http\Format\Receive\ReceiveJsonErrors;
use Artesaos\Restinga\Http\Format\Send\SendJson;

class MarketPlace extends Resource
{
    use ReceiveJson, SendJson;

    use ReceiveJsonErrors;

    protected $service = 'iugu';

    protected $name = 'marketplace';

    protected $identifier = 'account_id';

    protected $collection_root = 'items';

    protected $item_root = null;

    public function setSubAccountInformation(array $data)
    {
        $this->name = 'marketplace/create_account';

        foreach ($data as $key => $attribute) {
            $this->attributes[$key] = $attribute;
        }

        return $this;
    }

}
