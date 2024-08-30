<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    public function click(User $user, Job $job): bool
    {
        return $job->employer->user->is($user);
    }
}