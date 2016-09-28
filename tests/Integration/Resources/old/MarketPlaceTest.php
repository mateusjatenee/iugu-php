<?php

use Mateusjatenee\Iugu\Iugu;
use Mateusjatenee\Iugu\Resources\MarketPlace;
use Mateusjatenee\Iugu\Tests\Integration\Traits\HelpersTrait;

class MarketPlaceTest extends \PHPUnit_Framework_TestCase
{
    use HelpersTrait;

    public function setUp()
    {
        Iugu::setApiKey(getenv('IUGU_PRODUCTION_API_KEY'));
    }

    /** @test */
    public function it_can_create_a_subaccount()
    {
        $this->markTestSkipped('Only works in LIVE environments');

        $marketplace = new MarketPlace();

        $subaccount = $marketplace->setSubAccountInformation([
            'name' => 'Test subaccount',
            'comission_percent' => 10,
        ]);

        $subaccount->save();

        $this->assertEquals('Test subaccount', $subaccount->name);
        $this->assertNotNull($subaccount->account_id);
        $this->assertNotNull($subaccount->live_api_token);
        $this->assertNotNull($subaccount->test_api_token);
        $this->assertNotNull($subaccount->user_token);
    }

    /** @test */
    public function it_returns_an_error_if_an_subaccount_is_created_in_a_test_environment()
    {

        Iugu::setApiKey(getenv('IUGU_API_KEY'));

        $marketplace = new MarketPlace();

        $subaccount = $marketplace->setSubAccountInformation([
            'name' => 'Test subaccount',
            'comission_percent' => 10,
        ]);

        $this->assertFalse($subaccount->save());

        $this->assertTrue($subaccount->hasErrors());

        $this->assertEquals('Apenas disponível para o ambiente LIVE', $subaccount->getErrors()->all()['errors']);

    }
}
