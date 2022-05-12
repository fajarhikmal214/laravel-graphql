<?php

namespace App\GraphQL\Mutations;

use App\Models\User;

final class UploadAvatar
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $userId = auth()->user()->id;

        $image = $args["image"];
        $path = $image->storePublicly("uploads");

        User::where('id', $userId)
            ->update(['avatar' => $path]);

        return $path;
    }
}
