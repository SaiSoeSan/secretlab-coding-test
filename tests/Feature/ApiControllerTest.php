<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\ApiModel;

class ApiControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_version_key_value()
    {
        // $this->withoutExceptionHandling();

        //to hit /api/object/ with a POST method
        $response = $this->post('/api/object', [
            'mykey' => 'testing key',
            'myvalue' => 'testing value',
        ]);

        //want to assert status 200
        $response->assertStatus(200);
    }

    public function test_can_get_version_key()
    {
        //to hit /api/object/key with GET method
        $response = $this->get('/api/object/mykey');

        //want to assert status 200
        $response->assertStatus(200);
    }

    public function test_can_get_all_version_records()
    {
        //to hit /api/object/get_all_records with GET method
        $response = $this->get('/api/object/get_all_records');

        //want to assert status 200
        $response->assertStatus(200);
    }

    public function test_can_get_version_by_timestamp()
    {
        //to hit /api/object/mykey with GET method and timestamp parameter
        $response = $this->get('/api/object/mykey?timestamp=1440568980');

        //want to assert status 200
        $response->assertStatus(200);
    }
}
