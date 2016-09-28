<?php

namespace Mateusjatenee\Iugu\Teste\Resources;

use Mateusjatenee\Iugu\Resources\Transfer;
use Mateusjatenee\Iugu\Tests\TestCase;

class TransferTest extends TestCase
{
    public function setUp()
    {
        $this->transfer = new Transfer;
    }

    /** @test */
    public function it_sets_a_transference_information()
    {
        $this->transfer->setInformation([
            'receiver_id' => 'A1B2C3',
            'amount_cents' => 1000,
        ]);

        $this->assertEquals('A1B2C3', $this->transfer->receiver_id);
        $this->assertEquals(1000, $this->transfer->amount_cents);
    }
}
