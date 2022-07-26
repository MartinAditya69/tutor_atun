<?php

namespace Database\Seeders;

use App\Models\Teams;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10 ; $i++) {
            $new = new Teams();
            $new->nama = 'Teams'.$i;
            $new->profile = 'https://randomuser.me/api/portraits/men/'.$i.'.jpg';
            $new->bio = 'Halo Saya Anggota ke-'.$i;
            $new->save();
        }
    }
}
