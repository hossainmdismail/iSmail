<?php

namespace App\Http\Controllers;

use App\Models\AboutModels;
use App\Models\AdminDashboardModels;
use App\Models\CategoryModels;
use App\Models\ContactModels;
use App\Models\ExperienceModels;
use App\Models\ProjectModels;
use App\Models\ServiceModels;
use App\Models\SkillsModel;
use Illuminate\Http\Request;
use Mockery\Matcher\Contains;

class FrontEndController extends Controller
{
    public function index()
    {
        $dashboard = AdminDashboardModels::where('status',1)->first();
        $about = AboutModels::where('status',1)->first();
        $skill = SkillsModel::where('status',1)->get();
        $service = ServiceModels::where('status',1)->get();
        $experience = ExperienceModels::where('status',1)->get();
        $project = ProjectModels::where('status',1)->get();
        $category = CategoryModels::get('name');
        $contact = ContactModels::get();
        return view('frontend.home',[
            'dashboard' => $dashboard,
            'abouts' => $about,
            'skills' => $skill,
            'services' => $service,
            'experiences' => $experience,
            'projects' => $project,
            'category' => $category,
            'contacts' => $contact,
        ]);
    }
}
