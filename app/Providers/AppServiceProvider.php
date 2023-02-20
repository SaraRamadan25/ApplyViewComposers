<?php

namespace App\Providers;

use App\Http\View\composers\ChannelsComposer;
use App\Models\Channel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
          //option 1
        //every single View will have the channels variable
        // but it isn't good practise, don't share if you don't need
/*      View::share('channels', Channel::orderBy('name')->get());*/


        //option2
        // granular View with wild cards ( posts.* means everything pertaining to posts)
        // only those 2 View

       /*  View::composer(['post.create','channel.index'],function ($view){
             $view->with('channels',Channel::orderBy('name')->get());
         });*/



        //option 3
        // dedicated class (with huge apps)
        /* View::composer(['posts.*','channel.index'],ChannelsComposer::class);*/
        //make a refactor
        View::composer('partials.channels.*',ChannelsComposer::class);
    }


}
