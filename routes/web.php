<?php

use App\Http\Controllers\AddTaskController;
use App\Http\Controllers\Calendar_2Controller;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
    Route::resource("calendar", CalendarController::class);
    Route::put("/calendar/update/{calendar}", [CalendarController::class, "update"])->name("updateCalendar");
    Route::delete("/calendar/delete/{calendar}", [CalendarController::class, "destroy"])->name("deleteCalendar");
    Route::post('/groups/{groupId}/invite', [InvitationController::class, 'inviteUser'])->name('groups.invite');
    Route::get('/invitation', [InvitationController::class, 'index']);
    // Route::get('/invitations/{invitationId}/accept', [InvitationController::class, 'acceptInvitation'])->name('invitations.accept');
    // Route::get('/invitations/{invitationId}/refuse', [InvitationController::class, 'refuseInvitation'])->name('invitations.refuse');
    Route::delete('/groups/{group}', [GroupController::class, 'destroy'])->name('group.destroy');
    Route::post('/groups/create', [GroupController::class, 'create'])->name('groups.create');
    Route::put('/group/{group}', [GroupController::class, 'update'])->name('group.update');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'deleteTask'])->name('tasks.destroy');
    Route::patch('/tasks/{task}/mark-as-done', [TaskController::class, 'markAsDone'])->name('task.markAsDone');
    Route::get('/todo_list', [TodoController::class, 'index']);
    Route::post('/todo_list/store', [TodoController::class, 'store'])->name('todos.store');
    Route::delete('/groups/{group}/delete-member/{user}', [ProfileController::class, 'deleteMember'])->name('groups.deleteMember');
    Route::get('/calendar_2', [Calendar_2Controller::class, 'index']);

    Route::get('/task', [AddTaskController::class, 'index']);

    Route::get('/groups/Subscription', [GroupController::class, 'subscription'])->name('subscription');
    Route::get('/success', [GroupController::class, 'success'])->name('success');

    Route::get('/invitations/accept/{id}', [InvitationController::class, 'acceptInvitation'])->name('invitations.accept');
    Route::get('/invitations/reject/{id}', [InvitationController::class, 'refuseInvitation'])->name('invitations.reject');
    Route::post('/invitations/store/{group}', [InvitationController::class, 'store'])->name('invite.store');
    Route::get('/members', [ProfileController::class, 'index']);

    Route::get('/creations', [TodoController::class, 'index']);
    Route::post('/creations/store', [AddTaskController::class, 'store'])->name('creations.store');
    Route::post('/creations/destroy', [AddTaskController::class, 'destroy'])->name('creations.destroy');

    // Route::resource('todos', TodoController::class);

});


require __DIR__ . '/auth.php';
