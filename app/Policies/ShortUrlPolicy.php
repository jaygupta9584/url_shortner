<?php

namespace App\Policies;

use App\Models\ShortUrl;
use App\Models\User;

class ShortUrlPolicy
{
    public function view(User $user, ShortUrl $url)
    {
        return $user->id === $url->user_id;
    }
}
