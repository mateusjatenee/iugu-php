<?php

use Mateusjatenee\Iugu\Iugu;
use Mateusjatenee\Iugu\Resources\Customer;
use Mateusjatenee\Iugu\Tests\Integration\Traits\HelpersTrait;

class CustomerTest extends \PHPUnit_Framework_TestCase
{
    use HelpersTrait;

    public function setUp()
    {
        Iugu::setApiKey(getenv('IUGU_API_KEY'));
    }

    /** @test */
    public function it_can_create_a_customer()
    {
        $customer = new Customer();

        $customer->setInformation([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
        ]);

        $customer->save();

        $this->assertNotNull($customer->id);
        $this->assertEquals($customer->email, 'john@doe.com');
        $this->assertEquals($customer->name, 'John Doe');
    }

    /** @test */
    public function it_can_find_a_customer()
    {
        $created_customer = $this->createCustomer();

        $customer = new Customer();

        $found_customer = $customer->find($created_customer->id);

        $this->assertEquals($found_customer->id, $created_customer->id);
        $this->assertEquals($found_customer->email, $created_customer->email);
        $this->assertEquals($found_customer->name, $created_customer->name);
    }

    /** @test */
    public function it_can_update_a_customer()
    {
        $created_customer = $this->createCustomer();

        $customer = new Customer();

        $found_customer = $customer->find($created_customer->id);

        $found_customer->name = 'Kelly';

        $found_customer->update();

        $found_customer = $customer->find($created_customer->id);

        $this->assertEquals($found_customer->name, 'Kelly');
    }

    /** @test */
    public function it_can_delete_a_customer()
    {
        $customer = $this->createCustomer();

        $customer->destroy();

        $customer = $customer->find($customer->id);

        $this->assertFalse($customer);
    }

    /** @test */
    public function it_can_list_all_customers()
    {
        $customer = new Customer();

        $customers = $customer->all();

        foreach ($customers as $customer) {
            $this->assertNotNull($customer->id);
            $this->assertNotNull($customer->name);
        }
    }
}
