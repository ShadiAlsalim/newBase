<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EducationLevel::create([
            'name'=> 'بكالوريا',
          ]);  

        EducationLevel::create([
            'name'=> 'جامعة',
          ]);

        EducationLevel::create([
            'name'=> 'ماجستير',
          ]);   

        EducationLevel::create([
            'name'=> 'دبلوم',
          ]);   
        EducationLevel::create([
            'name'=> 'دكتراه',
          ]);   
    }
    
}
