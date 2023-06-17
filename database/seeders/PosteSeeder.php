<?php

namespace Database\Seeders;

use App\Models\Poste;
use Illuminate\Database\Seeder;

class PosteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Poste::create(['nom'=>'Directeur']);
       Poste::create(['nom'=>'Maintenancier']);
       Poste::create(['nom'=>'sécretaire']);
       Poste::create(['nom'=>'stageaire']);
    }
}
