<?php

namespace Mateusjatenee\Tests\Iugu\Resources;

use Mateusjatenee\Iugu\Exceptions\InvalidPayerException;
use Mateusjatenee\Iugu\Resources\Charge;
use Mateusjatenee\Iugu\Tests\TestCase;

class ChargeTest extends TestCase
{

    public function setUp()
    {
        $this->charge = new Charge;
        parent::setUp();
    }

    /** @test */
    public function it_throws_an_exception_if_no_payer_is_provided_to_bank_slip()
    {
        $this->expectException(InvalidPayerException::class);

        $this->charge->setBankSlip();

        $this->charge->setInformation([
            'token' => 'FOOBAR',
            'email' => 'teste@superteste.abc',
            'items' => [
                'description' => 'Item Teste',
                'quantity' => '1',
                'price_cents' => '100',
            ],
        ]);
    }

    /** @test */
    public function it_sets_information_without_a_payer()
    {
        $charge = $this->charge->setInformation([
            'token' => 'FOOBAR',
            'email' => 'teste@superteste.abc',
            'items' => [
                'description' => 'Item Teste',
                'quantity' => '1',
                'price_cents' => '100',
            ],
        ]);

        $this->assertInstanceOf(Charge::class, $charge);
    }

    /** @test */
    public function it_sets_payer_information()
    {
        $payer = [
            'name' => 'John Doe',
            'phone_prefix' => '11',
            'phone' => '1000',
            'email' => 'john@doe.com',
            'address' => [
                'street' => 'Rua Tal',
                'number' => '700',
                'city' => 'São Paulo',
                'state' => 'SP',
                'country' => 'Brasil',
                'zip_code' => '12122-00',
            ],
        ];

        $charge = $this->charge->setInformation([
            'token' => 'FOOBAR',
            'email' => 'teste@superteste.abc',
            'items' => [
                'description' => 'Item Teste',
                'quantity' => '1',
                'price_cents' => '100',
            ],
            'payer' => $payer,
        ]);

        $this->assertEquals($payer, $charge->payer);
    }
}
