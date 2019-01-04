<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Project;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'project_title' => 'Enkronos',
            'website' => 'http://www.enkronos.com',
            'email' => 'enkronos@gmail.com',
            'telegram' => 'enkoronos telegram',
            'note' => 'Tempora dolorem qui eum nulla. Expedita expedita ab nihil recusandae vel ut ducimus.',
        ]);

        Project::create([
            'project_title' => 'Pearl Pay',
            'website' => 'http://www.pearlpay.com',
            'email' => 'pearlpay.gmail.com',
            'telegram' => 'pearlpay telegram',
            'note' => 'updateQuaerat asperiores et omnis aut voluptatem similique corporis distinctio. Iusto sapiente quasi sapiente accusamus.',
        ]);

        Project::create([
            'project_title' => 'Eye Globe',
            'website' => 'http://www.eyeglobe.com',
            'email' => 'eyeglob@gmail.com',
            'telegram' => 'eye globe telegram',
            'note' => ' Iste aut praesentium reprehenderit vero est enim voluptatem possimus.',
        ]);

        /*
        $faker = Faker\Factory::create();

        for ($i=0; $i<100; $i++){
            Project::create([
            'project_title' => $faker->word,
            'website' => $faker->url,
            'email' => $faker->email,
            'telegram' => $faker->phoneNumber,
            'note' => $faker->text
            ]);
        }
        */    
    }
}
