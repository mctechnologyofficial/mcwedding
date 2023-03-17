<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = GeneralSetting::where('user_id', Auth::user()->id)->get();

        return view('dashboard.user.settings.list', compact(['setting']));
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
        $attrs = $request->validate([
            'domain'        => 'required|string',
            'title'         => 'required|string',
            'description'   => 'required|string'
        ]);

        GeneralSetting::create([
            'user_id'       => Auth::user()->id,
            'domain'        => $attrs['domain'],
            'title'         => $attrs['title'],
            'description'   => $attrs['description'],
        ]);

        return redirect()->route('user.settings.index')->with('success', 'Pengaturan umum berhasil ditambahkan!');
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
    public function update(Request $request)
    {
        $attrs = $request->validate([
            'domain'        => 'required|string',
            'title'         => 'required|string',
            'description'   => 'required|string'
        ]);

        GeneralSetting::where('user_id', Auth::user()->id)->update([
            'domain'        => $attrs['domain'],
            'title'         => $attrs['title'],
            'description'   => $attrs['description'],
        ]);

        return redirect()->route('user.settings.index')->with('success', 'Pengaturan umum berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
