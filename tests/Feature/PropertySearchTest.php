<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertySearchTest extends TestCase
{
    public function test_index_page_renders()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_search_page_renders()
    {
        $response = $this->get('/search?location_search=&accepts_pets=0&sleeps=2&beds=1&start_date=2021-04-29&end_date=2021-05-13');

        $response->assertStatus(200);
    }

    public function test_search_page_has_data()
    {
        $response = $this->get('/search?accepts_pets=0&sleeps=2&beds=1&start_date=2021-04-29&end_date=2021-05-13&page=2');

        $response->assertSee('Available Property Search Results');
    }

    public function test_search_page_pagination()
    {
        $response = $this->get('/search?accepts_pets=0&sleeps=2&beds=1&start_date=2021-04-29&end_date=2021-05-13&page=2');

        $response->assertSee('The Retreat');
    }
}
