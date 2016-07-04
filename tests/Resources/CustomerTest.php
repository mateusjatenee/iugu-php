<?php

use Mateusjatenee\Iugu\Iugu;
use Mateusjatenee\Iugu\Resources\Customer;
use Mateusjatenee\Iugu\Tests\Traits\HelpersTrait;

class CustomerTest extends \PHPUnit_Framework_TestCase
{

    use HelpersTrait;

    public function setUp()
    {
        Iugu::setApiKey(getenv('IUGU_API_KEY'));

    }

    /** @test */
    public function it_can_create_an_user()
    {

        $customer = new Customer();

        $customer->addInformation([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
        ]);

        $customer->save();

        $this->assertNotNull($customer->id);
        $this->assertEquals($customer->email, 'john@doe.com');
        $this->assertEquals($customer->name, 'John Doe');

    }

    /** @test */
    public function it_can_find_an_user()
    {
        $created_customer = $this->createCustomer();

        $customer = new Customer();

        $found_customer = $customer->find($created_customer->id);

        $this->assertEquals($found_customer->id, $created_customer->id);
        $this->assertEquals($found_customer->email, $created_customer->email);
        $this->assertEquals($found_customer->name, $created_customer->name);

    }

}
