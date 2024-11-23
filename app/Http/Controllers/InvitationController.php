<?php

namespace App\Http\Controllers;

use App\Mail\Invitemail;
use App\Models\Group;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{

    public function index()
    {

        $group = Group::findOrFail($id);
        $invitations = Invitation::where('email', Auth::user()->email)->get();
        return view('invitation', compact('invitations', 'group'));
    }


    public function store(Request $request, Group $group)
    {
        $group = Group::with('users')->findOrFail($group->id);

        $request->validate([
            'email' => 'required|email'
        ]);

        $invitation = Invitation::create([
            'group_id' => $group->id,
            'email' => $request->email
        ]);


        Mail::to($request->email)->send(new Invitemail($invitation));

        return back();

        // Optionally, you can add a success message in the session

        // if ($group->users && $group->users->contains(Auth::id())) {

        //     $invitation = new Invitation();
        //     $invitation->group_id = $group->id;
        //     $invitation->email = $request->email;
        //     $invitation->status = 'pending';
        //     $invitation->save();
        // }

    }




    public function acceptInvitation($id)
    {
        $invitation = Invitation::findOrFail($id);

        // Marquer l'invitation comme acceptée
        $invitation->update(['status' => 'accepted']);

        // Ajouter l'utilisateur au groupe
        $group = $invitation->group;
        $user=auth()->user();
        $group->users()->attach($user, ['role' => 'owner']);

        return redirect()->route('dashboard')->with('success', 'Vous avez rejoint le groupe avec succès !');
    }



    public function refuseInvitation($id)
    {
        $invitation = Invitation::findOrFail($id);

        // Marquer l'invitation comme refusée
        $invitation->update(['status' => 'refused']);

        return redirect()->route('dashboard')->with('success', 'Vous avez refusé l\'invitation.');
    }
}
