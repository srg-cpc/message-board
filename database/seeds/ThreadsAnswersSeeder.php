<?php

use App\Answer as Answer;
use App\Thread as Thread;
use App\User as User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash as Hash;

class ThreadsAnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)
            ->create()
            ->each(function ($user) {
                $user->threads()->saveMany(factory(App\Thread::class, rand(2, 5))->make());
            });

        $users = \App\User::all();

        foreach ($users as $user) {

            \App\Thread::where('author_id', $user->id)->get()
                ->each(function ($thread) use ($user) {
                    $thread->answers()->saveMany(factory(\App\Answer::class, rand(7, 15))->make()
                        ->each(function ($answer) use ($user){
                            $answer->author()->associate($user);
                        }));
                });
        }

    }
}
