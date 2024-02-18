<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Contact;

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
       // Paginator::useBootstrapFour();
        view()->composer("admin.includes.topNavigation",function($view){
            
            $unreadMessages = Contact::where("read_at", 0)->get();
            $unreadCount = $unreadMessages->count();
            $view->with(compact('unreadCount', 'unreadMessages'));
        });
    }
}
