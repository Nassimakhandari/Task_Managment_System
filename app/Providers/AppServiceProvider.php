<?php

namespace App\Providers;

use App\Models\Creation;
use App\Models\Group;
use App\Models\Invitation;
use App\Models\Task;
use App\Models\Todo;
use Illuminate\Support\Facades\Gate;
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
        view()->composer('*', function ($view) {
            if (auth()->check()) {
                $groups = Group::where('user_id', auth()->id())->get();
                $view->with('groups', $groups);
            }
        });
        $invitations = Invitation::all();
        $task = Creation::all();
        $tasks = Task::where('user_id', auth()->id())->get();
        view()->share([
            "tasks" => $tasks,
            "todos" => $task,
            "invitations" => $invitations,

        ]);
        Gate::define('update-task', function ($user, $task) {
            return $user->id === $task->creator_id;
        });
        
        Gate::define('delete-task', function ($user, $task) {
            return $user->id === $task->creator_id;
        });
    }

    

    
}
