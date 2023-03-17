<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BrideMan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrideManController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brideman = BrideMan::where('user_id', Auth::user()->id)->get();

        return view('dashboard.user.brideman.index', compact(['brideman']));
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
            'fullname'              => 'required|string',
            'shortname'             => 'required|string',
            'father_name'           => 'required|string',
            'mother_name'           => 'required|string',
            'self_description'      => 'required|string',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = sprintf('%s_%s.%s', date('Y-m-d'), md5(microtime(true)), $file->extension());
            $image_path = $file->move('storage/brideman', $filename);
        }else{
            $image_path = null;
        }

        BrideMan::create([
            'user_id'               => Auth::user()->id,
            'fullname'              => $attrs['fullname'],
            'shortname'             => $attrs['shortname'],
            'father_name'           => $attrs['father_name'],
            'mother_name'           => $attrs['mother_name'],
            'self_description'      => $attrs['self_description'],
            'image'                 => $image_path,
        ]);

        return redirect()->route('user.brideman.index')->with('success', 'Data mempelai pria berhasil ditambahkan!');
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
        $brideman = BrideMan::find($request->id);

        $attrs = $request->validate([
            'fullname'              => 'required|string',
            'shortname'             => 'required|string',
            'father_name'           => 'required|string',
            'mother_name'           => 'required|string',
            'self_description'      => 'required|string',
        ]);

        if($request->hasFile('image')){
            if($brideman->image == null){
                $file = $request->file('image');
                $filename = sprintf('%s_%s.%s', date('Y-m-d'), md5(microtime(true)), $file->extension());
                $image_path = $file->move('storage/brideman', $filename);
            }else{
                if(file_exists($brideman->image)){
                    unlink($brideman->image);

                    $file = $request->file('image');
                    $filename = sprintf('%s_%s.%s', date('Y-m-d'), md5(microtime(true)), $file->extension());
                    $image_path = $file->move('storage/brideman', $filename);
                }else{
                    $file = $request->file('image');
                    $filename = sprintf('%s_%s.%s', date('Y-m-d'), md5(microtime(true)), $file->extension());
                    $image_path = $file->move('storage/brideman', $filename);
                }
            }
        }else{
            $image_path = $brideman->image;
        }

        $brideman->update([
            'user_id'               => Auth::user()->id,
            'fullname'              => $attrs['fullname'],
            'shortname'             => $attrs['shortname'],
            'father_name'           => $attrs['father_name'],
            'mother_name'           => $attrs['mother_name'],
            'self_description'      => $attrs['self_description'],
            'image'                 => $image_path,
        ]);

        return redirect()->route('user.brideman.index')->with('success', 'Data mempelai pria berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
