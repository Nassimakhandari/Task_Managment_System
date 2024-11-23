<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Price;
use Stripe\Stripe;

class GroupController extends Controller
{

    public function index()
    {
        if (!auth()->user()->isSubscribed() && auth()->user()->teamCount() >= 5) {
            session(['show_max_team_error' => true]); // Set the session variable for error message visibility
        }
        
        $user = auth()->user();

        $groupCount = $user->groups()->count();
        $group = Group::find(1); 
        $groups = Group::where('user_id', auth()->user()->id)->get();
        return view('dashboard', compact('groups', 'group','groupCount'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

        ]);
        $user = auth()->user();

        
        if ($request->has('session_id')) {
            // Flash a success message to the session
            session()->flash('message', 'Now you can create more groups!');
        }
        if (!$user->isSubscribed() && $user->teamCount() >= 5) {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $prices = Price::all();
    
            $checkout_session = Session::create([
                'line_items' => [[
                    'price' => $prices->data[0]->id,
                    'quantity' => 1,
                ]],
                'mode' => 'subscription',
                'success_url' => route('success'),
                'cancel_url' => route('dashboard'),
            ]);
            return redirect()->away($checkout_session->url);

            // return redirect()->route('dashboard')
            // ->with('error', 'You have reached the maximum limit of 5 teams. Please subscribe to create more teams.');
        }

        $group = Group::create([
            'name' => $request->name,
            'user_id' => auth()->id(),
        ]);

        $group->users()->attach($user, ['role' => 'owner']);


        return back();
    }


    public function invite(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'group_id' => 'required|exists:groups,id',
        ]);

        $group = Group::find($request->group_id);

        $email = $request->email;

        $group->invitations()->create([
            'email' => $email,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', "Invitation envoyée à $email !");
    }

    public function create(Request $request)
    {
       

        // Créer le groupe si l'utilisateur est en dessous de la limite
         
        $user->groups()->create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Group created successfully!');
    }



    public function subscription()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $prices = Price::all();

        $checkout_session = Session::create([
            'line_items' => [[
                'price' => $prices->data[0]->id,
                'quantity' => 1,
            ]],
            'mode' => 'subscription',
            'success_url' => route('success'),
            'cancel_url' => route('dashboard'),
        ]);

       
        return redirect()->away($checkout_session->url);
    }




    public function success()
    {
        $user = User::where('id' , auth()->user()->id )->first();

        if ($user) {
            $user->status = 'active';
            $user->save();
        }

        auth()->user()->update(['subscription' => true]); // Assuming you have a `subscribed` field to track subscription

        session()->forget('show_max_team_modal'); // Remove the modal session variable
        session(['message' => 'Now you can create more groups.']); // S
        return view('dashboard')->with('message', 'Subscription successful! You can now create more groups.');
    }

    public function cancel()
    {
        return redirect()->route('welcome')->with('message', 'Subscription canceled. Please try again.');
    }



    // GroupController
    public function update(Request $request, Group $group)
    {
        // dd($group)
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
    
        $group->name = $request->input('name');
        $group->save();
        
        return back();
    }

    public function destroy($groupId)
    {
        $group = Group::findOrFail($groupId);

        // Check if the logged-in user is the creator
        if ($group->user_id != auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to delete this group.');
        }

        $group->delete();
        return redirect()->route('dashboard')->with('success', 'Group deleted successfully!');
    }


    public function destroyMember($id)
    {
        $member = User::findOrFail($id); 
        $member->delete();
    
        return redirect()->route('dashboard')->with('success', 'Group deleted successfully!');
    }

}
