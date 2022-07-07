<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class FeatureTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * @return void
     */
    public function test_login_without_filling_in_the_fields(): void
    {
        $response = $this->post('api/auth/login',[]);
        $response->assertStatus(401);
    }

    /**
     * @return void
     *
     */
    public function test_transaksi_without_filling_in_the_fields(): void
    {
        $user = User::factory()->create();
        $response =$this->actingAs($user)->post('api/auth/transaksi',[]);
        $response->assertStatus(500);
    }

    /**
     * @return void
     */
    public function test_kendaraan_if_already_login(): void
    {
        $user = User::factory()->create();
        $response =$this->actingAs($user)->get('api/auth/kendaraan');
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_history_if_already_login(): void
    {
        $user = User::factory()->create();
        $response =$this->actingAs($user)->get('api/auth/history');
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_latest_history_if_already_login(): void
    {
        $user = User::factory()->create();
        $response =$this->actingAs($user)->get('api/auth/latest-history');
        $response->assertStatus(200);
    }

}
