<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }

    public function save(User $user){
        foreach ($user->roles as $role){
            if($role->perms == 'EDIT_ROLES'){
                return false;
            }
        }
        return true;
    }
}
