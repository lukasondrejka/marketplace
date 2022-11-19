<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display the user profile.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('users.user', [
            'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Display the current user profile.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showProfile()
    {
        return $this->show(Auth::id());
    }

    /**
     * Show the form for editing the user profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = User::with('contacts')
            ->findOrFail(Auth::id());

        return view('users.user-form', [
            'user' => $user,
            'contacts' => $user->contacts,
        ]);
    }

    /**
     * Update the user profile.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request)
    {
        $user = User::with('contacts')
            ->find(Auth::id());

        $validated = $request->validate([
            'name' => 'required|max:255',
            'emails.*' => 'required|email',
            'phones.*' => 'required|min:10|max:14|regex:/^[\+]?[0-9]{10,14}$/',
        ], [
            'phones.*.regex' => 'The phone number is not valid.',
        ], [
            'emails.*' => 'email',
            'phones.*' => 'phone number',
        ]);

        $user->update($validated);
        $user->syncPhones($validated['phones'] ?? []);

        return redirect()->route('users.profile');
    }

    /**
     * Remove the user profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
