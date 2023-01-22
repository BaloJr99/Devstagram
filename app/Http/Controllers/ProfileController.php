<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth');
    }

    public function index(){
        return view('profile.index');
    }

    public function store(Request $request){

        $request -> request -> add(['username' => Str::slug($request -> username)]);
        
        $this -> validate($request, [
            'username' => [
                'required',
                'unique:users,username,' . auth() -> user() -> id,
                'min:3',
                'max:20'
            ],
            'password' => [
                'required_with:oldPassword',
                'confirmed',
                'min:6'
            ]
        ]);
        
        if(!Hash::check($request -> oldPassword, auth() -> user() -> password)){
            return back() -> with('message', 'Incorrect Credentials');
        }

        if($request -> image){
            $image = $request -> file('image');

            $imageName = Str::uuid() . "." . $image -> extension();

            $serverImage = Image::make($image);
            $serverImage -> fit(1000, 1000);

            $imagePath = public_path('profiles') . '/' . $imageName;
            $serverImage -> save($imagePath);
        }

        $user = User::find(auth() -> user() -> id);
        $user -> username = $request -> username;
        $user -> password = $request -> password ? Hash::make($request -> password) : auth() -> user() -> password;
        $user -> image = $imageName ?? auth() -> user() -> image ?? '';

        $user -> save();

        return redirect() -> route('posts.index', $user -> username);
    }
}
