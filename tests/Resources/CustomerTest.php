<?php

namespace Mateusjatenee\Iugu\Tests\Resources;

use Mateusjatenee\Iugu\Resources\Customer;
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
}
