<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_services_page_can_be_opened(): void
    {
        $response = $this->get('/services');

        $response->assertStatus(200);
    }

    public function test_service_can_be_created(): void
    {
        $response = $this->post('/services', [
            'name' => 'Graduation Makeup',
            'price' => 250000,
            'description' => 'Makeup untuk wisuda.',
        ]);

        $response->assertRedirect('/services');

        $this->assertDatabaseHas('services', [
            'name' => 'Graduation Makeup',
            'price' => 250000,
        ]);
    }

    public function test_service_can_be_updated(): void
    {
        $service = Service::create([
            'name' => 'Old Makeup',
            'price' => 100000,
            'description' => 'Old description',
        ]);

        $response = $this->put('/services/' . $service->id, [
            'name' => 'Wedding Makeup',
            'price' => 500000,
            'description' => 'Wedding service',
        ]);

        $response->assertRedirect('/services');

        $this->assertDatabaseHas('services', [
            'id' => $service->id,
            'name' => 'Wedding Makeup',
            'price' => 500000,
        ]);
    }

    public function test_service_can_be_deleted(): void
    {
        $service = Service::create([
            'name' => 'Party Makeup',
            'price' => 300000,
            'description' => 'Party service',
        ]);

        $response = $this->delete('/services/' . $service->id);

        $response->assertRedirect('/services');

        $this->assertDatabaseMissing('services', [
            'id' => $service->id,
        ]);
    }
}