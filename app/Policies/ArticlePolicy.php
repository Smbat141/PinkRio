<?php

namespace App\Policies;

use App\Article;
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


    public function destroy(User $user,Article $article){
        if($user->id == $article->user_id){
            return false;
        }
        return true;
    }


}
