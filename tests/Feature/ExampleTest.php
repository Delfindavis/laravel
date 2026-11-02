<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_pages_resource_routes_and_model_bindings_work(): void
    {
        Student::create([
            'roll_no' => '72',
            'name' => 'Delfin Davis',
            'email' => 'delfin.davis@example.com',
        ]);

        $this->get('/hello/Delfin')->assertOk()->assertSee('Hello, Delfin');
        $this->get('/about')->assertOk()->assertSee('<h1>About</h1>', false);
        $this->get('/students')->assertOk()->assertSee('Delfin Davis');
        $this->get('/students/create')->assertOk()->assertSee('Save student');
        $this->get('/students/999999')->assertNotFound();
        $this->get('/roll/72')->assertOk()->assertSee('Delfin Davis');
    }

    public function test_student_creation_redirects_with_flash_status_and_api_returns_json(): void
    {
        $response = $this->post('/students', [
            'roll_no' => 'CS23-08',
            'name' => 'Sam Student',
            'email' => 'sam.student@example.com',
        ]);

        $response->assertRedirect(route('students.index'));
        $response->assertSessionHas('status', 'Student saved successfully.');
        $this->get('/students')->assertOk()->assertSee('Student saved successfully.')->assertSee('Sam Student');
        $this->get('/api/students')->assertOk()->assertHeader('content-type', 'application/json')->assertJsonCount(1);
    }
}
