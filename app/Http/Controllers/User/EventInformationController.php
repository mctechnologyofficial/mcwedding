<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\EventInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = EventInformation::where('user_id', Auth::user()->id)->get();

        return view('dashboard.user.eventinformation.index', compact(['event']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.eventinformation.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attrs = $request->validate([
            'religion'                  => 'required|string',
            'timezone'                  => 'required|string',
            'maps_type'                 => 'required|string',
        ]);

        if($attrs['maps_type'] == "Dynamic Maps" || $attrs['maps_type'] == "Google Maps"){
            if(Auth::user()->premium_status == 0){
                // error
                return redirect()->route('user.eventinformation.create')->with('failed', 'Anda memilih fitur premium! Silahkan upgrade layanan premium terlebih dahulu.');
            }else{
                // save include premium feature

                EventInformation::create([
                    'user_id'                   => Auth::user()->id,
                    'religion'                  => $attrs['religion'],
                    'timezone'                  => $attrs['timezone'],
                    'maps_type'                 => $attrs['maps_type'],
                    'contract_validation'       => $request->contract_validation,
                    'contract_name'             => $request->contract_name,
                    'contract_date'             => $request->contract_date,
                    'contract_time_start'       => $request->contract_time_start,
                    'contract_time_end'         => $request->contract_time_end,
                    'contract_address'          => $request->contract_address,
                    'contract_url_address'      => $request->contract_url_address,
                    'reception_validation'      => $request->reception_validation,
                    'reception_name'            => $request->reception_name,
                    'reception_date'            => $request->reception_date,
                    'reception_time_start'      => $request->reception_time_start,
                    'reception_time_end'        => $request->reception_time_end,
                    'reception_address'         => $request->reception_address,
                    'reception_url_address'     => $request->reception_url_address,
                ]);

                return redirect()->route('user.eventinformation.index')->with('success', 'Informasi acara telah dibuat!');
            }
        }else{
            // save exclude premium feature

            EventInformation::create([
                'user_id'                   => Auth::user()->id,
                'religion'                  => $attrs['religion'],
                'timezone'                  => $attrs['timezone'],
                'maps_type'                 => $attrs['maps_type'],
                'contract_validation'       => $request->contract_validation,
                'contract_name'             => $request->contract_name,
                'contract_date'             => $request->contract_date,
                'contract_time_start'       => $request->contract_time_start,
                'contract_time_end'         => $request->contract_time_end,
                'contract_address'          => $request->contract_address,
                'contract_url_address'      => $request->contract_url_address,
                'reception_validation'      => $request->reception_validation,
                'reception_name'            => $request->reception_name,
                'reception_date'            => $request->reception_date,
                'reception_time_start'      => $request->reception_time_start,
                'reception_time_end'        => $request->reception_time_end,
                'reception_address'         => $request->reception_address,
                'reception_url_address'     => $request->reception_url_address,
            ]);

            return redirect()->route('user.eventinformation.index')->with('success', 'Informasi acara telah dibuat!');
        }

        // $map = new \Mastani\GoogleStaticMap\GoogleStaticMap(env('GOOGLE_MAP_KEY'));
        // $url = $map->setCenter('Tehran')
        //    ->setMapType(\Mastani\GoogleStaticMap\MapType::RoadMap)
        //    ->setZoom(14)
        //    ->setSize(600, 600)
        //    ->setFormat(\Mastani\GoogleStaticMap\Format::JPG)
        //    ->addMarker('Tehran', '1', 'red', \Mastani\GoogleStaticMap\Size::Small)
        //    ->addMarkerLatLng(-6.434947402928456, 106.85053478328331, '1', 'red', \Mastani\GoogleStaticMap\Size::Small)
        //    ->make(); // Return url contain map address.
        //    // or
        //    // ->download(); // Download map image
        // dd($url);
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
        $event = EventInformation::find($id);

        return view('dashboard.user.eventinformation.edit', compact(['event']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = EventInformation::find($id);
        $attrs = $request->validate([
            'religion'                  => 'required|string',
            'timezone'                  => 'required|string',
            'maps_type'                 => 'required|string',
        ]);

        if($attrs['maps_type'] == "Dynamic Maps" || $attrs['maps_type'] == "Google Maps"){
            if(Auth::user()->premium_status == 0){
                // error
                return redirect()->route('user.eventinformation.edit', $event->id)->with('failed', 'Anda memilih fitur premium! Silahkan upgrade layanan premium terlebih dahulu.');
            }else{
                // save include premium feature

                $event->update([
                    'religion'                  => $attrs['religion'],
                    'timezone'                  => $attrs['timezone'],
                    'maps_type'                 => $attrs['maps_type'],
                    'contract_validation'       => $request->contract_validation,
                    'contract_name'             => $request->contract_name,
                    'contract_date'             => $request->contract_date,
                    'contract_time_start'       => $request->contract_time_start,
                    'contract_time_end'         => $request->contract_time_end,
                    'contract_address'          => $request->contract_address,
                    'contract_url_address'      => $request->contract_url_address,
                    'reception_validation'      => $request->reception_validation,
                    'reception_name'            => $request->reception_name,
                    'reception_date'            => $request->reception_date,
                    'reception_time_start'      => $request->reception_time_start,
                    'reception_time_end'        => $request->reception_time_end,
                    'reception_address'         => $request->reception_address,
                    'reception_url_address'     => $request->reception_url_address,
                ]);

                return redirect()->route('user.eventinformation.index')->with('success', 'Informasi acara telah dibuat!');
            }
        }else{
            // save exclude premium feature

            $event->update([
                'religion'                  => $attrs['religion'],
                'timezone'                  => $attrs['timezone'],
                'maps_type'                 => $attrs['maps_type'],
                'contract_validation'       => $request->contract_validation,
                'contract_name'             => $request->contract_name,
                'contract_date'             => $request->contract_date,
                'contract_time_start'       => $request->contract_time_start,
                'contract_time_end'         => $request->contract_time_end,
                'contract_address'          => $request->contract_address,
                'contract_url_address'      => $request->contract_url_address,
                'reception_validation'      => $request->reception_validation,
                'reception_name'            => $request->reception_name,
                'reception_date'            => $request->reception_date,
                'reception_time_start'      => $request->reception_time_start,
                'reception_time_end'        => $request->reception_time_end,
                'reception_address'         => $request->reception_address,
                'reception_url_address'     => $request->reception_url_address,
            ]);

            return redirect()->route('user.eventinformation.index')->with('success', 'Informasi acara telah dibuat!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
