<?php

use Cxj\LookingGlass\LookingGlass;
use Cxj\LookingGlass\Result;
use Illuminate\Support\Facades\Queue;

it('can be instantiated', function () {
    // arrange
    $glass = new LookingGlass();
    // act
    // nothing to do here.
    // assert
    $this->assertInstanceOf(LookingGlass::class, $glass);
});

it('sends a success message', function () {
    // arrange
    Queue::fake();
    $result = Result::make('success message');
    $glass = new LookingGlass();

    // act
    $glass->transmit('Pest test label', $result, 'Pest');

    // assert
    $this->assertInstanceOf(LookingGlass::class, $glass);
});
