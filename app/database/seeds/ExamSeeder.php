<?php
use Faker\Factory as Faker;

class ExamSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            Exam::create(array(
                'certification_id' => rand(1,10),
                'name' => $faker->sentence(),
                'duration' => 60,
            ));
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }


}