<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function creating(Post $post): void
    {
        if(! app()->runningInConsole() ){
        $post->user_id = auth()->user()->id;
        }

    }
    /**
     * Handle the Post "deleted" event.
     */
    public function deleteting(Post $post): void
    {
       if ($post->image) {
        Storage::delete($post->image->url);
       } 
       
    }


}
