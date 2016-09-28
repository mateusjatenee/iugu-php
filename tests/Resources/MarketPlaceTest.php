<?php

namespace Mateusjatenee\Iugu\Tests\Resources;

use Mateusjatenee\Iugu\Resources\MarketPlace;
use Mateusjatenee\Iugu\Tests\TestCase;

class MarketPlaceTest extends TestCase
{

    public function setUp()
    {
        $this->marketPlace = new MarketPlace;
    }

    /** @test */
    public function it_sets_a_subaccount_information()
    {
        $this->marketPlace->setSubAccountInformation([
            'name' => 'foo',
            'commission_percent' => 10,
        ]);

        $this->assertEquals('marketplace/create_account', $this->marketPlace->getResourceName());

        $this->assertEquals('foo', $this->marketPlace->name);

        $this->assertEquals(10, $this->marketPlace->commission_percent);
    }

    /** @test */
    public function it_requests_an_account_verification()
    {
        $this->marketPlace->setSubAccountID('A1B2C3');

        $data = [
            'price_range' => 'Até R$ 100,00',
        ];

        $verification = $this->marketPlace->setVerificationInformation($data);

        $this->assertEquals($data, $verification->data);

        $this->assertEquals('accounts/A1B2C3/request_verification', $verification->getResourceName());
    }

    /** @test */
    public function it_sets_a_subaccount_id()
    {
        $this->marketPlace->setSubAccountID('A1B2C3');

        $this->assertEquals('A1B2C3', $this->marketPlace->account_id);
    }

    /** @test */
    public function it_requests_withdraw()
    {

        $this->marketPlace->setWithDrawInformation('A1B2C3', [
            'amount' => 500,
        ]);

        $this->assertEquals('accounts/A1B2C3/request_withdraw', $this->marketPlace->getResourceName());

        $this->assertEquals(500, $this->marketPlace->amount);
    }

}
