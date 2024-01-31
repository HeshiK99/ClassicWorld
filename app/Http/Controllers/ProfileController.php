<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profile_details = User::where('id', auth()->user()->id)->first();

        return view('Backend.profile', compact('profile_details'));
    }

    public function update(Request $request)
    {
        $profile_details = User::where('id', auth()->user()->id)->first();

        if($request->file_name != null)
        {
            $imageData = $request->file_name;
            $data = substr($imageData, strpos($imageData, ',') + 1);
            $data = base64_decode($data);
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
            Storage::disk('public')->put("/users/" . $fileName , $data);
        }

        $result = User::where('id', auth()->user()->id)->update([
            'name' => $request->profile_name,
            'address' => $request->profile_address,
            'telephone' => $request->profile_telephone,
            'image' => $fileName ?? $profile_details->image,
        ]);

        if($result)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}
