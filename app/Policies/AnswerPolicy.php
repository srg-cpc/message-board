<?php

namespace App\Policies;

use App\Answer;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    public function updateIfOwner(User $user, Answer $answer)
    {
        return $user->id === $answer->author_id;
    }
}
