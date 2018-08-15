<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_ISP = Role::where('name', 'ISP')->first();
        $role_CSR = Role::where('name','CSR')->first();

        $admin = new User();
        $admin->name = 'Adarsh Bala';
        $admin->email = 'admin@tfl.com.fj';
        $admin->password = bcrypty('tfl2018');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $ISP = new User();
        $ISP->name = 'Roneel Kumar';
        $ISP->email = 'ISP@tfl.com.fj';
        $ISP->password = bcrypty('tfl2018');
        $ISP->save();
        $ISP->roles()->attach($role_ISP);

        $CSR = new User();
        $CSR->name = 'Ata Taobao';
        $CSR->email = 'CSR@tfl.com.fj';
        $CSR->password = bcrypty('tfl2018');
        $CSR->save();
        $CSR->roles()->attach($role_CSR);


    }
}
