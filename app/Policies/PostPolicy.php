<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use PhpParser\Node\Stmt\Return_;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function author(User $user, Post $post){

        if($user->id == $post->user_id){
            return true;
        }else{
            return false;
        }
        
    }

    public function publushed(?User $user, Post $post){

        if($post->status == 2){
            return true;
        }else{
            return false;
        }
        
    }

}
