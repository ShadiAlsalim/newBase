<?php

namespace Database\Seeders;

use App\Models\company;
use App\Models\job_oppertunity;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobOppTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
        'id' => 2,
      ]);

        User::create([
        'id' => 3,
      ]);

      company::create([
        'name'=> 'high tech',
        'user_id'=> 1,
      ]);

      company::create([
        'name'=> 'laravel',
        'user_id'=> 2,
      ]);
      company::create([
        'name'=> 'flutter and laravel',
        'user_id'=> 3,
      ]);

        job_oppertunity::create([
            'opp_name'=> 'laravel ',
            'job_title_id'=> '10',
            'job_type'=> 'onesite',
            'job_level_id'=> '1',
            'city_id'=> '1',
            'company_id'=> '1',
            'job_type'=> '1',
            'gender'=> 'male',
          ]);  

        job_oppertunity::create([
            'opp_name'=> 'laravel ',
            'job_title_id'=> '10',
            'job_type'=> 'onesite',
            'job_level_id'=> '1',
            'city_id'=> '1',
            'company_id'=> '1',
            'job_type'=> '1',
            'gender'=> 'male',
          ]);   

        job_oppertunity::create([
            'opp_name'=> 'laravel developer',
            'job_title_id'=> '10',
            'job_type'=> 'remote',
            'job_level_id'=> '1',
            'city_id'=> '1',
            'company_id'=> '1',
            'job_type'=> '1',
            'gender'=> 'male',
          ]);   


    }
}
