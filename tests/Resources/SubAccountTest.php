<?php

use Mateusjatenee\Iugu\Iugu;
use Mateusjatenee\Iugu\Tests\Traits\HelpersTrait;

class MarketPlaceTest extends \PHPUnit_Framework_TestCase
{
    use HelpersTrait;

    public function setUp()
    {
        Iugu::setApiKey(getenv('IUGU_PRODUCTION_API_KEY'));
    }

    /** @test */
    public function it_can_find_a_subaccount()
    {
        $this->markTestIncomplete('Incomplete');
        // $this->createSubAccount();
    }
}
