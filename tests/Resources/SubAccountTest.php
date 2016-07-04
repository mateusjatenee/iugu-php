<?php

use Mateusjatenee\Iugu\Iugu;
use Mateusjatenee\Iugu\Resources\SubAccount;
use Mateusjatenee\Iugu\Tests\Traits\HelpersTrait;

class SubAccountTest extends \PHPUnit_Framework_TestCase
{
    use HelpersTrait;

    public function setUp()
    {
        Iugu::setApiKey(getenv('EXAMPLE_ACCOUNT_TOKEN'));
    }

    /** @test */
    public function it_can_list_all_subaccounts()
    {
        Iugu::setApiKey(getenv('IUGU_PRODUCTION_API_KEY'));

        $sub_account = new SubAccount();

        $sub_accounts = $sub_account->getAll();

        foreach ($sub_accounts as $sub) {
            $this->assertNotNull($sub->name);
            $this->assertNotNull($sub->id);
        }

    }

    /** @test */
    // public function it_can_find_a_subaccount()
    // {
    //     // $this->markTestIncomplete('Incomplete');

    //     $client_id = getenv('EXAMPLE_ACCOUNT_ID');

    //     $sub_account = new SubAccount();

    //     $sub_account->find($client_id);

    //     // $this->assertEquals($client_id, $sub_account->id);
    //     // $this->assertEquals('Test subaccount', $sub_account->name);

    // }
}
