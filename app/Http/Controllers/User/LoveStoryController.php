<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LoveStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoveStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lovestory = LoveStory::all();

        return view('dashboard.user.lovestory.list', compact(['lovestory']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.lovestory.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attrs = $request->validate([
            'date_story'            => 'required|date',
            'title'                 => 'required|string',
            'story'                 => 'required|string',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = sprintf('%s_%s.%s', date('Y-m-d'), md5(microtime(true)), $file->extension());
            $image_path = $file->move('storage/lovestory', $filename);
        }else{
            $image_path = null;
        }

        LoveStory::create([
            'user_id'               => Auth::user()->id,
            'date_story'            => $attrs['date_story'],
            'title'                 => $attrs['title'],
            'story'                 => $attrs['story'],
            'image'                 => $image_path,
        ]);

        return redirect()->route('user.lovestory.index')->with('success', 'Cerita cinta anda berhasil ditambahkan!');
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
        $lovestory = LoveStory::find($id);

        return view('dashboard.user.lovestory.edit', compact(['lovestory']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lovestory = LoveStory::find($id);

        $attrs = $request->validate([
            'date_story'            => 'required|date',
            'title'                 => 'required|string',
            'story'                 => 'required|string',
        ]);

        if($request->hasFile('image')){
            if($lovestory->image == null){
                $file = $request->file('image');
                $filename = sprintf('%s_%s.%s', date('Y-m-d'), md5(microtime(true)), $file->extension());
                $image_path = $file->move('storage/lovestory', $filename);
            }else{
                if(file_exists($lovestory->image)){
                    unlink($lovestory->image);
                    $file = $request->file('image');
                    $filename = sprintf('%s_%s.%s', date('Y-m-d'), md5(microtime(true)), $file->extension());
                    $image_path = $file->move('storage/lovestory', $filename);
                }else{
                    $file = $request->file('image');
                    $filename = sprintf('%s_%s.%s', date('Y-m-d'), md5(microtime(true)), $file->extension());
                    $image_path = $file->move('storage/lovestory', $filename);
                }
            }
        }else{
            $image_path = $lovestory->image;
        }

        $lovestory->update([
            'date_story'            => $attrs['date_story'],
            'title'                 => $attrs['title'],
            'story'                 => $attrs['story'],
            'image'                 => $image_path,
        ]);

        return redirect()->route('user.lovestory.index')->with('success', 'Cerita cinta anda berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lovestory = LoveStory::find($id);
        unlink($lovestory->image);
        $lovestory->delete();

        return redirect()->route('user.lovestory.index')->with('success', 'Cerita cinta anda berhasil dihapus');
    }
}
