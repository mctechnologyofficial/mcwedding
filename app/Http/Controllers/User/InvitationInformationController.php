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
        return view('dashboard.user.invitationinformation.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attrs = $request->validate([
            'invite'        => 'required|string',
            'description'   => 'required|string'
        ]);

        InvitationInformation::create([
            'user_id'       => Auth::user()->id,
            'invite'        => $attrs['invite'],
            'description'   => $attrs['description']
        ]);

        return redirect()->route('user.invitationinformation.index')->with('success', 'Informasi undangan berhasil disimpan!');
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
        $invite = InvitationInformation::find($id);

        return view('dashboard.user.invitationinformation.edit', compact(['invite']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $invitation = InvitationInformation::find($id);

        $attrs = $request->validate([
            'invite'        => 'required|string',
            'description'   => 'required|string'
        ]);

        $invitation->update([
            'invite'        => $attrs['invite'],
            'description'   => $attrs['description']
        ]);

        return redirect()->route('user.invitationinformation.index')->with('success', 'Informasi undangan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
