<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    use ImageUploadTrait;
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;

            return response()->json([
                'user' => new UserResource($user),
                'token' => $token
            ]);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function profile()
    {
        $user = Auth::user();
        $profile = User::findOrFail($user->id);
        return new UserResource($profile);
    }
    public function updateUser(Request $request)
    {
        $user = Auth::user();
        $teacher = User::findOrFail($user->id);
        $image = $this->Updateimage($request, 'profile', 'profile',  $teacher->profile);
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->profile = $image;
        $teacher->email = $request->email;
        $teacher->role = $request->role;
        $teacher->expertise = $request->expertise;
        $teacher->experience = $request->experience;
        $teacher->education = $request->education;
        $teacher->linkedIn = $request->linkedIn;
        $teacher->twitter = $request->twitter;
        $teacher->youTube = $request->youTube;
        $teacher->save();
        return response()->json(['message' => 'User Update successfully'], 201);
    }
    public function updatePasswordUser(Request $request)
    {
        $user = Auth::user();
        $teacher = User::findOrFail($user->id);
        $teacher->password =  Hash::make($request->password);
        $teacher->save();
        return response()->json(['message' => 'User password Update successfully'], 201);
    }
}
