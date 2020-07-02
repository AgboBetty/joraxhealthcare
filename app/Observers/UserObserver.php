<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Profile;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        // Duplicate record to profile
        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->mail = $user->email;
        $profile->user_name = $user->name;

        $profile->save();
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        // Duplicate record to profile
        $changes = $user->getChanges();

        if (array_key_exists('name', $changes)) {
            Profile::where('user_id',$user->id)
            ->update(['user_name'=> $user->name]);
        }
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        // delete user record from profile
        Profile::where('user_id',$user->id)->delete();
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        // restore user record in profile
        Profile::where('user_id',$user->id)->restore();
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
