<?php

namespace Mateusjatenee\Iugu\Tests\Traits;

use Mateusjatenee\Iugu\Resources\Customer;
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

    public function createCustomer()
    {
        $customer = new Customer();

        $customer->setInformation([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
        ]);

        $customer->save();

        return $customer;
    }
}
