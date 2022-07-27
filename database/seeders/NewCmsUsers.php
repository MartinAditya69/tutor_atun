<?php

namespace Database\Seeders;

use App\Models\CmsUsers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NewCmsUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make(123456);
        CmsUsers::insert([[
            'nama' => 'Martin',
            'email' => 'martin@unika.ac.id',
            'pasword' => $password,
            'foto' => 'https://64.media.tumblr.com/53d76395966fea1e0d7c7f3901d6ae16/9cb0d04d3fbbadc2-36/s540x810/1866dd3c4fc2c41190deb66c8528c6dd58cdca93.jpg'
        ]]);
    }
}
