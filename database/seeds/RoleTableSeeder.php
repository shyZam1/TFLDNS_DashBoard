<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'A admin user';
        $role_admin->save();

        $role_ISP = new Role();
        $role_ISP->name = 'ISP';
        $role_ISP->description = 'A ISP engineer';
        $role_ISP->save();

        $role_CSR = new Role();
        $role_CSR->name = 'CSR ';
        $role_CSR->description = 'A Customer Service representative';
        $role_CSR->save();

    }
}
