<?php

use function Pest\Laravel\getJson;

it('retorne status code 200', function () {
    getJson('http://desafio-maximize.test/api/news')
        ->assertOk()
        ->json();
});

/* it('globals', function () {
    expect(['dd', '//'])
    ->not->toBeUsed();
}); */
