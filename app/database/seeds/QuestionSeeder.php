<?php
use Faker\Factory as Faker;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            Question::create(array(
                'exam_id' => rand(1,50),
                'title' => $faker->sentence(),
                'description' => $faker->paragraph()
            ));
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }


}