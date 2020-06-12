<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;

class PictureController extends Controller
{
    public function showCustomize()
    {
        $user = auth()->user();
        return view('customizePicture', ['user' => $user]);
    }
    public function updatePicture(Request $request){
        $user = Auth::User();
        if($request->hasFile('avatar')){
            $filename = $request->avatar->getClientOriginalName();
            $request->avatar->storeAs('public/avatars', $filename);

            $user->avatar = $filename;
        }
        $user->save();
        $this->waterMark();
        return back()
            ->with('success','You have successfully upload image.');
    }

    public function greyPicture(){
        $user = Auth::User();
        $filename= 'storage/avatars/';
        $filename .= $user->avatar;
        $img = Image::make($filename);
        $img->greyscale();
        $img->save();
        return back();
    }
    public function pixalatePicture(){
        $user = Auth::User();
        $filename= 'storage/avatars/';
        $filename .= $user->avatar;
        $img = Image::make($filename);
        $img->pixelate(12);
        $img->save();
        return back();
    }
    public function waterMark(){
        $user = Auth::User();
        $filename= 'storage/avatars/';
        $filename .= $user->avatar;
        $img = Image::make($filename);
        $watermark = Image::make('storage/avatars/watermark.png');
        $img->insert($watermark, 'center');
        $img->save();
    }
}
