<?php

namespace Mateusjatenee\Iugu\Tests\Resources;

use Mateusjatenee\Iugu\Resources\Customer;
use Mateusjatenee\Iugu\Resources\PaymentMethod;
use Mateusjatenee\Iugu\Tests\TestCase;

class CustomerTest extends TestCase
{

    public function setUp()
    {
        $this->customer = new Customer;
        parent::setUp();
    }

    /** @test */
    public function it_sets_a_customer_info()
    {
        $this->customer->setInformation([
            'name' => 'John',
            'email' => 'foo@bar.com',
        ]);

        $this->assertEquals($this->customer->name, 'John');
        $this->assertEquals($this->customer->email, 'foo@bar.com');
    }

    /** @test */
    public function it_has_the_correct_identifiers()
    {
        $this->assertEquals('customers', $this->customer->getResourceName());
    }

    /** @test */
    public function it_has_payment_methods()
    {
        $payment_method = $this->customer->paymentMethods();

        $this->assertInstanceOf(PaymentMethod::class, $payment_method);

        $this->assertInstanceOf(Customer::class, $payment_method->getParentResource());
    }
}
