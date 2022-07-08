<?php

namespace Tests\Feature;

use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\Fluent\AssertableJson;
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
    public function test_history_structure_if_already_login(): void
    {
        $user = User::factory()->create();
        $response =$this->actingAs($user)->get('api/auth/history');
        $response->assertJson(fn (AssertableJson $json)  =>
            $json->has('status')
                    ->hasAny('data')
        );

        $response->assertStatus(200);
    }

    public function test_add_transaksi()
    {
        $user = User::factory()->create();
        $kendaraan = Kendaraan::factory()->create([
            'tahun_keluaran' => '2020',
            'warna' => 'hitam',
            'harga' => 2000,
            'tipe_kendaraan' =>'is_mobil',
            'mesin' => "v12",
            'kapasitas_penumpang' => 4,
            'tipe' => 'hatchback',
            'stok' => 5
        ]);
        $response =$this->actingAs($user)->post('api/auth/transaksi',[
            'nama'=>'deva',
            'id_item'=>$kendaraan->id,
            'stok_item'=>1
        ]);
        $response->assertStatus(200);
    }

}
