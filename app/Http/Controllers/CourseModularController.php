<?php

namespace App\Http\Controllers;

use App\Http\Resources\CousreModularResource;
use App\Models\CourseModular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseModularController extends Controller
{
    public function showModular()
    {
        $user = Auth::user();
        $modular = CourseModular::where('userId', $user->id)->paginate(10);
        return CousreModularResource::collection($modular);
    }

    public function createModular(Request $request)
    {
        $modular = new CourseModular();
        $user = Auth::user();
        $modular->userId =  $user->id;
        $modular->courseId = $request->courseId;
        $modular->name = $request->name;
        $modular->save();
        return response()->json(['success' => 'Course Modular Create SuccessFully']);
    }

    public function editModular(string $id)
    {
        $modular = CourseModular::findOrFail($id);
        return new CousreModularResource($modular);
    }
    public function updateModular(Request $request, string $id)
    {
        $modular = CourseModular::findOrFail($id);
        $user = Auth::user();
        $modular->userId =  $user->id;
        $modular->courseId = $request->courseId;
        $modular->name = $request->name;
        $modular->save();
        return response()->json(['success' => 'Course Modular Update SuccessFully']);
    }
    public function deleteModular(string $id)
    {
        $modular = CourseModular::findOrFail($id);
        $modular->delete();
        return response()->json(['success' => 'Course Modular Delete SuccessFully']);
    }
    public function CouseModularSearch(Request $request)
    {
        $query = $request->input('query.query'); 
        $results = CourseModular::where('name', 'like', "%$query%")
            ->limit(5)
            ->get();

        return CousreModularResource::collection($results);
    }
}
