<?php

use Mateusjatenee\Iugu\Iugu;
use Mateusjatenee\Iugu\Resources\Token;

class TokenTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_can_generate_a_token()
    {

        Iugu::setApiKey(getenv('IUGU_API_KEY'));

        $token = new Token();

        $token->setCreditCardInfo([
            'account_id' => getenv('IUGU_ACCOUNT_ID'),
            'number' => '4111111111111111',
            'verification_value' => '123',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'month' => '11',
            'year' => '2016',
        ]);

        $token->save();

        $this->assertTrue($token->test);
        $this->assertEquals('VISA', $token->extra_info['brand']);
        $this->assertEquals('John Doe', $token->extra_info['holder_name']);
        $this->assertEquals('XXXX-XXXX-XXXX-1111', $token->extra_info['display_number']);
        $this->assertNotNull($token->id);

    }

}
