<?php

namespace Mateusjatenee\Iugu\Resources;

use Artesaos\Restinga\Data\Resource;
use Artesaos\Restinga\Http\Format\Receive\ReceiveJson;
use Artesaos\Restinga\Http\Format\Receive\ReceiveJsonErrors;
use Artesaos\Restinga\Http\Format\Send\SendJson;

class SubAccount extends Resource
{
    use ReceiveJson, SendJson;

    use ReceiveJsonErrors;

    protected $service = 'iugu';

    protected $name = 'accounts';

    protected $identifier = 'id';

    protected $collection_root = 'items';

    protected $item_root = null;

    public function getAll()
    {
        $this->name = 'marketplace';

        return parent::getAll();
    }

}
