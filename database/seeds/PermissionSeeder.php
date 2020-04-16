<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Role::create(['name'=>'pengawas']);
        Role::create(['name'=>'owner']);
        Role::create(['name'=>'admin shif2']);
        Role::create(['name'=>'admin shif1']);
        Role::create(['name'=>'super admin']);
    }
}
