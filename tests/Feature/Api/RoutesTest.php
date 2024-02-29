<?php

use function Pest\Laravel\getJson;

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

describe('return status code 200', function () {

    it('sould status code 200 in api news list url', function () {
        getJson('http://desafio-maximize.test/api/news')
            ->assertOk()
            ->json();
    });
    
    it('should status code 200 in api article url', function () {
        getJson('http://desafio-maximize.test/api/news/article/5')
            ->assertOk()
            ->json();
    });
});