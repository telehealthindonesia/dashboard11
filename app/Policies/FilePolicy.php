<?php

namespace App\Policies;

use App\Models\File;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FilePolicy
{
    public function view(User $user, File $file): bool
    {
        return $user->id === $file->user_id;
    }

}
