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
        $this->markTestSkipped();

        Iugu::setApiKey(getenv('IUGU_PRODUCTION_API_KEY'));

        $sub_account = new SubAccount();

        $sub_accounts = $sub_account->getAll();

        foreach ($sub_accounts as $sub) {
            $this->assertNotNull($sub->name);
            $this->assertNotNull($sub->id);
        }

    }

    /** @test */
    public function it_can_find_a_subaccount()
    {
        $this->markTestIncomplete('Incomplete');

        Iugu::setApiKey(getenv('EXAMPLE_ACCOUNT_TOKEN'));

        $client_id = getenv('EXAMPLE_ACCOUNT_ID');

        $sub_account = new SubAccount();

        $found_client = $sub_account->find($client_id);

        $this->assertEquals($client_id, $found_client->id);
        $this->assertEquals('Test subaccount', $found_client->name);

    }

    /** @test */
    public function it_can_request_an_accounts_verification()
    {

        $this->markTestIncomplete('todo');

        $subaccount = $this->createSubAccount();

        Iugu::setApiKey($subaccount->user_token);

        $subaccount->requestVerification([
            'price_range' => '100',
        ]);

    }
}
