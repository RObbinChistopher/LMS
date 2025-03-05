<?php

namespace App\Http\Controllers;

use App\Models\WebsitePage;
use Illuminate\Http\Request;

class WebsitePageController extends Controller
{
    public function webSitePage()
    {
        $pages = WebsitePage::findOrFail(1);
        return response()->json($pages);
    }

    public function updateWebsitepages(Request $request)
    {
        $pages = WebsitePage::findOrFail(1);
        $pages->about_us = $request->about_us;
        $pages->privacy_policy = $request->privacy_policy;
        $pages->help_center = $request->help_center;
        $pages->cookie_policy = $request->cookie_policy;
        $pages->referral_program = $request->referral_program;
        $pages->terms_of_use = $request->terms_of_use;
        $pages->save();
        return response()->json(['success' => 'Update Successfully']);
    }
}
