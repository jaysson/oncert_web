<?php
use Faker\Factory as Faker;

class AttemptSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            $attempt = Attempt::create(array(
                'exam_id' => rand(1, 10),
                'user_id' =>  rand(1, 10),
                'start' => $faker->dateTime,
                'end' => $faker->dateTime
            ));
            var_dump($attempt->errors());
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }


}