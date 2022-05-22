<?php

namespace App\Http\Controllers;

use App\Mail\Accept;
use App\Models\EventUsers as ModelsEventUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventUsers extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('registerEvent');
    }

    public function registerEvent(Request $request)
    {

        $validated = $request->validate([
            'event_id' => 'required|numeric',
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => 'string',
        ]);

        $check = ModelsEventUsers::where('event_id', $validated['event_id'])
            ->where('email', $validated['email'])->first();

        if ($check === null) {
            ModelsEventUsers::create($validated);
            return redirect('/');
        }

        return redirect()->back();
    }

    public function accept($id, $condition)
    {

        $user = ModelsEventUsers::find($id);

        Mail::to($user->email)->send(new Accept($condition));

        $user->delete();

        return redirect()->back();
    }
}
