<?php

use Illuminate\Database\Seeder;

class LicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $license = new \App\License();
        $license->name = 'aaaa';
        $license->save();

        $license = new \App\License();
        $license->name = 'bbbb';
        $license->save();

        $userLicense = new \App\UserLicense();
        $userLicense->user_id = 1;
        $userLicense->license_id = 1;
        $userLicense->save();

        $userLicense = new \App\UserLicense();
        $userLicense->user_id = 1;
        $userLicense->license_id = 2;
        $userLicense->save();
    }
}
