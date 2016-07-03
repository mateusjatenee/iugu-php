<?php

use Mateusjatenee\Iugu\Iugu;
use Mateusjatenee\Iugu\Resources\Customer;

class CustomerTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_can_create_an_user()
    {

        Iugu::setApiKey(getenv('IUGU_API_KEY'));

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

}
