<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Client;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
        	'project_id' => 1,
            'client_firstname' => 'John Lorenz',
            'client_lastname' => 'Ruizo',
            'client_middlename' => 'thequickbrownfox',
            'image' => '',
        ]);

        Client::create([
        	'project_id' => 2,
            'client_firstname' => 'Federex',
            'client_lastname' => 'Potolin',
            'client_middlename' => 'Abarera',
            'image' => '',
        ]);
    }
}
