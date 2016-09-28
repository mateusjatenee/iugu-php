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

    public function setVerificationInformation(array $data)
    {
        $this->name = "accounts/{$this->account_id}/request_verification";

        $this->attributes = [];

        foreach ($data as $key => $attribute) {
            $this->attributes['data'][$key] = $attribute;
        }

        return $this;
    }

    public function setSubAccountID($account_id)
    {
        $this->account_id = $account_id;
    }

    public function findSubAccount($account_id)
    {
        $this->name = 'accounts';

        return $this->find($this->account_id);
    }

    public function setWithDrawInformation($account_id, array $data)
    {
        $this->name = "accounts/{$account_id}/request_withdraw";

        $this->attributes = [];

        $this->amount = $data['amount'];
    }

    public function setSubAccountInformation(array $data)
    {
        $this->name = 'marketplace/create_account';

        foreach ($data as $key => $attribute) {
            $this->attributes[$key] = $attribute;
        }

        return $this;
    }

    public function verify()
    {
        return $this->save();
    }

}
