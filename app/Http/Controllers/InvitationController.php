<?php

namespace App\Http\Controllers;

use App\Models\BrideMan;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexFree(string $name)
    {
        $landing = GeneralSetting::selectRaw('general_settings.*')
        ->selectRaw('bride_men.shortname as shortname_man')
        ->selectRaw('bride_women.shortname as shortname_woman')
        ->leftJoin('bride_men', 'bride_men.user_id', '=', 'general_settings.user_id')
        ->leftJoin('bride_women', 'bride_women.user_id', '=', 'general_settings.user_id')
        ->where('general_settings.domain', $name)
        ->get();

        return view('invitation.free', compact(['landing']));
    }
}
