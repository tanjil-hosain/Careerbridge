<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ApplicationSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_job_seeker_can_submit_application(): void
    {
        Storage::fake('public');

        $user = User::factory()->create([
            'role' => 'job_seeker',
        ]);

        $company = Company::create([
            'user_id' => $user->id,
            'company_name' => 'Test Company',
            'company_email' => 'company@test.com',
            'company_phone' => '1234567890',
            'company_address' => 'Dhaka',
            'company_website' => 'https://example.com',
            'company_description' => 'Test company',
        ]);

        $category = Category::create([
            'name' => 'IT',
            'slug' => 'it',
        ]);

        $job = Job::create([
            'company_id' => $company->id,
            'category_id' => $category->id,
            'title' => 'Laravel Developer',
            'slug' => 'laravel-developer',
            'job_type' => 'Full Time',
            'location' => 'Dhaka',
            'salary' => '50000',
            'experience' => '2 years',
            'deadline' => now()->addDays(7)->toDateString(),
            'description' => 'A test job',
            'requirements' => 'Laravel knowledge',
            'status' => true,
        ]);

        $response = $this->actingAs($user)->post('/jobs/' . $job->slug . '/apply', [
            'cover_letter' => 'I am very interested in this role.',
            'resume' => UploadedFile::fake()->create('resume.pdf', 100, 'application/pdf'),
        ]);

        $response->assertRedirect('/jobs/' . $job->slug);
        $this->assertDatabaseHas('applications', [
            'job_id' => $job->id,
            'user_id' => $user->id,
            'status' => 'pending',
        ]);
    }
}
