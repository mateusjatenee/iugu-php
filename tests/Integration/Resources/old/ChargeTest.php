<?php

use Mateusjatenee\Iugu\Iugu;
use Mateusjatenee\Iugu\Resources\Charge;
use Mateusjatenee\Iugu\Tests\Integration\Traits\HelpersTrait;

class ChargeTest extends \PHPUnit_Framework_TestCase
{
    use HelpersTrait;

    /** @test */
    public function it_can_charge_an_user()
    {
        Iugu::setApiKey(getenv('IUGU_API_KEY'));

        $token = $this->generateToken();

        $charge = new Charge();

        $charge->setInformation([
            'token' => $token->id,
            'email' => 'teste@superteste.abc',
            'items' => [
                'description' => 'Item Teste',
                'quantity' => '1',
                'price_cents' => '100',
            ],
        ])->charge();

        $this->assertNotNull($charge);
        $this->assertNotNull($charge->invoice_id);
        $this->assertEquals($charge->success, true);
        $this->assertEquals($charge->message, 'Autorizado');
        $this->assertNotNull($charge->url);
        $this->assertNotNull($charge->pdf);
    }
}
