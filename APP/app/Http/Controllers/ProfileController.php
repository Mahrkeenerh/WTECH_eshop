<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO VALIDATE STUFF AND STORE

        $validated = $request->validate([
            'first_name' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'last_name' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'state' => ['required', 'not_regex:/[0-9]/'],
            'city' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'street_n_num' => 'required',
            'postal_code' => ['required', 'regex:/^[0-9]{5}$/'],
        ],
        [
            'first_name.regex' => 'First name must contain only letters.',
            'last_name.regex' => 'Last name must contain only letters.',
            'state.regex' => 'State can\'t contain digits.',
            'city.regex' => 'City must contain only letters.',
            'postal_code.regex' => 'Postal code must contain 5 digits.',
        ]);

        Auth::user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'state' => $request->state,
            'city' => $request->city,
            'street_and_number' => $request->street_n_num,
            'postal_code' => $request->postal_code,
        ]);

        return redirect()->route('profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
