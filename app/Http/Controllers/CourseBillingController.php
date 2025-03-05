<?php

namespace App\Http\Controllers;

use App\Http\Resources\CousreBillingResource;
use App\Models\CourseBilling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseBillingController extends Controller
{
    public function showCourseBilling()
    {
        $user = Auth::user();
        $billing = CourseBilling::where('user_id', $user->id)->paginate(10);
        return CousreBillingResource::collection($billing);
    }

    public function createCourseBilling(Request $request)
    {
        $user = Auth::user();
        $billing = new CourseBilling();
        $billing->user_id = $user->id;
        $billing->course_id = $request->course_id;
        $billing->course_price = $request->course_price;
        $billing->course_discount_price = $request->course_discount_price;
        $billing->course_subscription_model = $request->course_subscription_model;
        $billing->course_access = $request->course_access;
        $billing->save();
        return response()->json(['success' => 'Course billing Created successfully']);
    }
    public function EditCourseBilling(string $id)
    {
        $billing = CourseBilling::findOrFail($id);
        return new CousreBillingResource($billing);
    }
    public function updateCourseBilling(Request $request, string $id)
    {
        $user = Auth::user();
        $billing = CourseBilling::findOrFail($id);
        $billing->user_id = $user->id;
        $billing->course_id = $request->course_id;
        $billing->course_price = $request->course_price;
        $billing->course_discount_price = $request->course_discount_price;
        $billing->course_subscription_model = $request->course_subscription_model;
        $billing->course_access = $request->course_access;
        $billing->save();
        return response()->json(['success' => 'Course billing Update successfully']);
    }
    public function deletCourseBilling(string $id)
    {
        $billing = CourseBilling::findOrFail($id);
        $billing->delete();
        return response()->json(['success' => 'Delete successfully']);
    }
    public function filterByCourse(string $id)
    {
        $billing = CourseBilling::where('course_id', $id)->paginate(10);
        return CousreBillingResource::collection($billing);
    }
}
