<?php

namespace App\Http\Controllers;

use App\Http\Resources\CousreResource;
use App\Models\Course;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    use ImageUploadTrait;
    public function showCousreByOwe()
    {
        $user = Auth::user();
        $cousre = Course::where('userId', $user->id)->paginate(10);
        return CousreResource::collection($cousre);
    }
    public function showCousre()
    {
        $cousre = Course::paginate(10);
        return CousreResource::collection($cousre);
    }
    public function showAllCousre()
    {
        $user = Auth::user();
        $cousre = Course::where('userId', $user->id)->get();
        return CousreResource::collection($cousre);
    }

    public function createCousre(Request $request)
    {
        $cousre = new Course();
        $image = $this->Uploadimage($request, 'image', 'cousres');
        $user = Auth::user();
        $cousre->userId = $user->id;;
        $cousre->course_title = $request->course_title;
        $cousre->course_thumbnail_images = $image;
        $cousre->instructor_name = $request->instructor_name;
        $cousre->catId = $request->catId;
        $cousre->subCatId = $request->subCatId;
        $cousre->childCatId = $request->childCatId;
        $cousre->level = $request->level;
        $cousre->course_language = $request->course_language;
        $cousre->course_description = $request->course_description;

        $cousre->save();
        return response()->json(['success' => 'Cousre Create successFully']);
    }

    public function editCousre(string $id)
    {
        $cousre = Course::findOrFail($id);
        return new CousreResource($cousre);
    }

    public function updateCousre(Request $request, string $id)
    {
        $cousre = Course::findOrFail($id);
        $image = $this->Updateimage($request, 'image', 'cousres', $cousre->course_thumbnail_images);
        $cousre->course_title = $request->course_title;
        $cousre->course_thumbnail_images = $image;
        $cousre->instructor_name = $request->instructor_name;
        $cousre->catId = $request->catId;
        $cousre->subCatId = $request->subCatId;
        $cousre->childCatId = $request->childCatId;
        $cousre->level = $request->level;
        $cousre->course_language = $request->course_language;
        $cousre->course_description = $request->course_description;

        $cousre->save();
        return response()->json(['success' => 'Cousre Create successFully']);
    }
    public function DeleteCousre(string $id)
    {
        $cousre = Course::findOrFail($id);
        $cousre->delete();
        return response()->json(['success' => 'Cousre Delete successFully']);
    }
    public function CouseSearch(Request $request)
    {
        $query = $request->input('query.query'); 
        $results = Course::where('course_title', 'like', "%$query%")
            ->orWhere('instructor_name', 'like', "%$query%")
            ->limit(5)
            ->get();

        return CousreResource::collection($results);
    }
}
