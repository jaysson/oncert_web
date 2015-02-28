<?php

use Faker\Factory as Faker;

class SessionSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        CourseSession::truncate();
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
           $var =  CourseSession::create(array(
                'certification_id' => rand(1,10),
                'user_id' => rand(1,10),
                'title' => $faker->sentence(),
                'start' => $faker->dateTime,
                'end' => $faker->dateTime,
            ));
//            var_dump($var->errors());
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }


}