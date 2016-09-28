<?php

use Mateusjatenee\Iugu\Iugu;
use Mateusjatenee\Iugu\Tests\Integration\Traits\HelpersTrait;

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

    /** @test */
    public function it_can_update_an_users_payment_method()
    {
        $this->markTestIncomplete('todo');

        $token = $this->generateToken();

        $customer = $this->createCustomer();

        $payment_method = $customer->paymentMethods()->setInformation([
            'description' => 'Test payment method',
            'token' => $token->id,
        ]);

        $payment_method->save();

        $found_payment_method = $customer
            ->paymentMethods()
            ->find($payment_method->id);

        $this->assertEquals($payment_method->id, $found_payment_method->id);
        $this->assertEquals($payment_method->description, $found_payment_method->description);
        $this->assertEquals($payment_method->item_type, $found_payment_method->item_type);
        $this->assertEquals($payment_method->data['holder_name'], $found_payment_method->data['holder_name']);
        $this->assertEquals($payment_method->data['brand'], $found_payment_method->data['brand']);

    }

    /** @test */
    public function it_can_list_an_users_payment_methods()
    {
        $token = $this->generateToken();

        $second_token = $this->generateToken();

        $customer = $this->createCustomer();

        $first_payment_method = $customer->paymentMethods()->setInformation([
            'description' => 'Test payment method',
            'token' => $token->id,
        ]);

        $first_payment_method->save();

        $second_payment_method = $customer->paymentMethods()->setInformation([
            'description' => 'Test payment method',
            'token' => $second_token->id,
        ]);

        $second_payment_method->save();

        $payment_methods = $customer->paymentMethods()->getAll();

        foreach ($payment_methods as $payment_method) {
            $this->assertEquals('Test payment method', $payment_method->description);
            $this->assertNotNull($payment_method->id);
        }

    }

}
