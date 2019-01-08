<?php

use Illuminate\Database\Seeder;

class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        \DB::table('questions')->delete();
        \DB::table('answers')->delete();
    
        factory(App\User::class, 5)->create()->each(function($u) {
            $u->questions()
                ->saveMany(factory(App\Question::class, rand(1,5))->make())
            ->each(function ($q) {
                $q->answers()
                ->saveMany(factory(App\Answer::class, rand(1,5))->make());
            });
        });
    }
}
