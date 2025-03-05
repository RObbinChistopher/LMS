<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Teacher;
use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    use ImageUploadTrait;
    public function showTeacher()
    {
        $teacher = User::where('role', 'teacher')->paginate(10);
        return UserResource::collection($teacher);
    }
    public function showUser()
    {
        $teacher = User::paginate(10);
        return UserResource::collection($teacher);
    }
    public function createteacher(Request $request)
    {
        $teacher = new User();
        $image = $this->Uploadimage($request,'profile', 'profile');
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->email = $request->email;
        $teacher->profile = $image;
        $teacher->role = $request->role;
        $teacher->expertise = $request->expertise;
        $teacher->experience = $request->experience;
        $teacher->education = $request->education;
        $teacher->linkedIn = $request->linkedIn;
        $teacher->twitter = $request->twitter;
        $teacher->youTube = $request->youTube;
        $teacher->password =  Hash::make($request->password);
        $teacher->save();
        return response()->json(['message' => 'Teacher Create successfully'], 201);
    }
    public function editUser(string $id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }
    public function updateTeacher(Request $request, string $id)
    {
        $teacher = User::findOrFail($id);
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
        $teacher->password =  Hash::make($request->password);
        $teacher->save();
        return response()->json(['message' => 'Teacher Update successfully'], 201);
    }
    public function deleteUser(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'Teacher Delete successfully'], 201);
    }
    public function teacherSearch(Request $request)
    {
        $query = $request->input('query.query'); 
        $results = User::where('email', 'like', "%$query%")
            ->orWhere('first_name', 'like', "%$query%")
            ->orWhere('last_name', 'like', "%$query%")
            ->limit(5)
            ->get();

        return UserResource::collection($results);
    }
}
