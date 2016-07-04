<?php

use Mateusjatenee\Iugu\Iugu;
use Mateusjatenee\Iugu\Tests\Traits\HelpersTrait;

class PaymentMethodTest extends \PHPUnit_Framework_TestCase
{
    use HelpersTrait;

    public function setUp()
    {
        Iugu::setApiKey(getenv('IUGU_API_KEY'));
    }

    /** @test */
    public function it_can_create_an_users_payment_method()
    {
        $token = $this->generateToken();

        $customer = $this->createCustomer();

        $payment_method = $customer->paymentMethods()->setInformation([
            'description' => 'Test payment method',
            'token' => $token->id,
        ]);

        $payment_method->save();

        $this->assertNotNull($payment_method->id);
        $this->assertEquals('Test payment method', $payment_method->description);
        $this->assertEquals('credit_card', $payment_method->item_type);
        $this->assertEquals($payment_method->customer_id, $customer->id);
        $this->assertEquals('VISA', $payment_method->data['brand']);
        $this->assertEquals('John Doe', $payment_method->data['holder_name']);
        $this->assertEquals('XXXX-XXXX-XXXX-1111', $payment_method->data['display_number']);

    }
}
