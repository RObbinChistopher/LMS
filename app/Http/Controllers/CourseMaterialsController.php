<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseMaterialsResource;
use App\Models\CourseMaterials;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class CourseMaterialsController extends Controller
{
    use ImageUploadTrait;
    public function showCourseMaterial()
    {
        $material = CourseMaterials::paginate(10);
        return CourseMaterialsResource::collection($material);
    }

    public function createCourseMaterial(Request $request)
    {
        $material = new CourseMaterials();
        $lecture_notes = $this->Uploadimage($request, 'lecture_notes', 'materials');
        $assignments = $this->Uploadimage($request, 'Assignments', 'materials');
        $material->course_id = $request->course_id;
        $material->course_modular = $request->course_modular;
        $material->textbook_link = $request->textbook_link;
        $material->online_resource = $request->online_resource;
        $material->lecture_notes = $lecture_notes;
        $material->Assignments = $assignments;
        $material->save();
        return response()->json(['Success' => 'Course Material Create Successfully']);
    }

    public function EditCourseMaterial(string $id)
    {
        $material = CourseMaterials::findOrFail($id);
        return new CourseMaterialsResource($material);
    }
    public function updateCourseMaterial(Request $request, string $id)
    {
        $material = CourseMaterials::findOrFail($id);
        $lecture_notes = $this->Updateimage($request, 'lecture_notes', 'materials', $material->lecture_notes);
        $assignments = $this->Updateimage($request, 'Assignments', 'materials', $material->Assignmentss);
        $material->course_id = $request->course_id;
        $material->course_modular = $request->course_modular;
        $material->textbook_link = $request->textbook_link;
        $material->online_resource = $request->online_resource;
        $material->lecture_notes = $lecture_notes;
        $material->Assignments = $assignments;
        $material->save();
        return response()->json(['Success' => 'Course Material Updated Successfully']);
    }

    public function DeleteCourseMaterial(string $id)
    {
        $material = CourseMaterials::findOrFail($id);
        $material->delete();
        return response()->json(['Success' => 'Course Material Delete Successfully']);
    }
}
