<?php

namespace Mateusjatenee\Iugu\Tests\Integration\Traits;

use Mateusjatenee\Iugu\Iugu;
use Mateusjatenee\Iugu\Resources\Customer;
use Mateusjatenee\Iugu\Resources\MarketPlace;
use Mateusjatenee\Iugu\Resources\Token;

trait HelpersTrait
{

    public function generateToken()
    {
        $token = new Token();

        $token->setCreditCardInfo([
            'account_id' => getenv('IUGU_ACCOUNT_ID'),
            'number' => '4111111111111111',
            'verification_value' => '123',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'month' => '11',
            'year' => '2016',
        ]);

        $token->save();

        return $token;
    }

    public function createCustomer($override = null)
    {
        if (is_null($override)) {
            $override = [
                'name' => 'John Doe',
                'email' => 'john@doe.com',
            ];
        }

        $customer = new Customer();

        $customer->setInformation($override);

        $customer->save();

        return $customer;
    }

    public function createSubAccount()
    {
        Iugu::setApiKey(getenv('IUGU_PRODUCTION_API_KEY'));

        $marketplace = new MarketPlace();

        $subaccount = $marketplace->setSubAccountInformation([
            'name' => 'Test subaccount',
            'comission_percent' => 10,
        ]);

        $subaccount->save();

        return $subaccount;
    }

}
