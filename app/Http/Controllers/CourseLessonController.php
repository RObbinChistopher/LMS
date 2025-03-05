<?php

namespace App\Http\Controllers;

use App\Http\Resources\CousreLessonResource;
use App\Http\Resources\CousreModularResource;
use App\Models\CourseLesson;
use App\Models\CourseModular;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use FFMpeg\FFProbe;
use FFMpeg\FFMpeg;
use Illuminate\Support\Facades\Storage;

class CourseLessonController extends Controller
{
    use ImageUploadTrait;
    public function showLesson()
    {
        $user = Auth::user();
        $lesson = CourseLesson::where('user_id', $user->id)->paginate(10);
        return CousreLessonResource::collection($lesson);
    }


    public function createLesson(Request $request)
    {

        $request->validate([
            'course_id' => 'required',
            'lesson_name' => 'required',
            'course_modular_id' => 'required',
            'lesson_type' => 'required',
            'duration' => 'required',
            'video_upload' => 'required|mimes:mp4,mov,avi,wmv|max:2048000', // 2GB
        ]);

        $lesson = new CourseLesson();
        $image = $this->Uploadimage($request, 'resource', 'lesson');
        $user = Auth::user();
        $lesson->user_id = $user->id;
        $lesson->course_id = $request->course_id;
        $lesson->lesson_name = $request->lesson_name;
        $lesson->course_modular_id = $request->course_modular_id;
        $lesson->lesson_type = $request->lesson_type;
        $lesson->duration = $request->duration;
        $lesson->resource_field = $image;

        if ($request->hasFile('video_upload')) {
            $video = $request->file('video_upload');
            $videoPath = $video->storeAs('videos', time() . '_' . $video->getClientOriginalName(), 'public');

            // Explicitly define FFmpeg and FFProbe paths
            $ffprobe = FFProbe::create([
                'ffmpeg.binaries'  => 'C:\\ffmpeg\\bin\\ffmpeg.exe',
                'ffprobe.binaries' => 'C:\\ffmpeg\\bin\\ffprobe.exe',
                'timeout'          => 3600,
                'ffmpeg.threads'   => 12,
            ]);

            $duration = $ffprobe->format(storage_path('app/public/' . $videoPath))->get('duration');

            if ($duration > 3600) {
                Storage::delete('public/' . $videoPath);
                return response()->json(['error' => 'Video must be 1 hour or less'], 400);
            }

            $lesson->video_upload = $videoPath;
        }
        $lesson->save();

        return response()->json(['success' => 'Course Lesson Created Successfully', 'video_path' => $lesson->video_upload]);
    }
    public function editLesson(string $id)
    {
        $lesson = CourseLesson::findOrFail($id);
        return new CousreLessonResource($lesson);
    }
    public function updateLesson(Request $request, string $id)
    {
        $request->validate([
            'course_id' => 'required',
            'lesson_name' => 'required',
            'course_modular_id' => 'required',
            'lesson_type' => 'required',
            'duration' => 'required',
            'video_upload' => 'nullable|mimes:mp4,mov,avi,wmv|max:1024000', // 1GB, not required
        ]);

        $lesson = CourseLesson::findOrFail($id);
        $user = Auth::user();

        $lesson->user_id = $user->id;
        $lesson->course_id = $request->course_id;
        $lesson->lesson_name = $request->lesson_name;
        $lesson->course_modular_id = $request->course_modular_id;
        $lesson->lesson_type = $request->lesson_type;
        $lesson->duration = $request->duration;
        $lesson->resource_field = $request->resource;
        if ($request->hasFile('video_upload')) {
            if ($lesson->video_upload && Storage::exists('public/' . $lesson->video_upload)) {
                Storage::delete('public/' . $lesson->video_upload);
            }
            $video = $request->file('video_upload');
            $videoPath = $video->storeAs('videos', time() . '_' . $video->getClientOriginalName(), 'public');
            $ffprobe = FFProbe::create([
                'ffmpeg.binaries'  => 'C:\\ffmpeg\\bin\\ffmpeg.exe',
                'ffprobe.binaries' => 'C:\\ffmpeg\\bin\\ffprobe.exe',
                'timeout'          => 3600,
                'ffmpeg.threads'   => 12,
            ]);

            $videoDuration = $ffprobe->format(storage_path('app/public/' . $videoPath))->get('duration');
            if ($videoDuration > 3600) {
                Storage::delete('public/' . $videoPath);
                return response()->json(['error' => 'Video must be 1 hour or less'], 400);
            }

            $lesson->video_upload = $videoPath;
        }

        $lesson->save();

        return response()->json(['success' => 'Course Lesson Updated Successfully']);
    }

    public function deleteLessonVideo(string $id)
    {
        $lesson = CourseLesson::findOrFail($id);

        // Check if the lesson has a video file and delete it from storage
        if ($lesson->video_upload && Storage::exists('public/' . $lesson->video_upload)) {
            Storage::delete('public/' . $lesson->video_upload);
        }

        // Remove the video reference from the database
        $lesson->video_upload = ''; // Set to empty string instead of NULL
        $lesson->delete(); // Save the changes

        return response()->json(['success' => 'Video Deleted Successfully']);
    }
    public function CourseModularById(string $id)
    {
        $modular = CourseModular::where('courseId', $id)->get();
        return CousreModularResource::collection($modular);
    }
}
