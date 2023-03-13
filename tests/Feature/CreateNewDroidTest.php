<?php

namespace Tests\Feature;

use App\Models\BillOfMaterial;
use App\Models\Droid;
use App\Models\DroidFaq;
use App\Models\DroidGallery;
use App\Models\Instruction;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class CreateNewDroidTest extends TestCase
{
//    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_a_new_droid()
    {
        $user = User::factory()->create();

        $role = Role::create(['name' => 'Admin']);
        $permission = Permission::create(['name' => 'view-admin-dashboard']);
        $role->givePermissionTo($permission);
        $permission->assignRole($role);

        $user->assignRole($role);

        $response = $this->actingAs($user, 'web')->withoutExceptionHandling()->get('/admin/droids/create');

        $droid = Droid::factory()
            ->count(5)
            ->create();

        $instruction = Instruction::factory()->count(5)->create([
            'droids_id' => '1',
        ]);

        $bom = BillOfMaterial::factory()->count(5)->create([
            'droids_id' => '1',
        ]);

        $gallery = DroidGallery::factory()->count(25)->create([
            'droids_id' => '1',
        ]);
        $faq = DroidFaq::factory()->count(50)->create([
            'droids_id' => '1',
        ]);

        $response->assertStatus(200);
    }
}
