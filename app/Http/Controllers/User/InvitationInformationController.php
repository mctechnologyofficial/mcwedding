<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\InvitationInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invite = InvitationInformation::where('user_id', Auth::user()->id)->get();

        return view('dashboard.user.invitationinformation.index', compact(['invite']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
