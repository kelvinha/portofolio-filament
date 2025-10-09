<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Profile, SocialLink, TechGroup, ProjectCategory, Project, Testimonial};

class LandingController extends Controller
{
    public function index()
    {
        $profile    = Profile::with(['socialLinks' => fn($q)=>$q->orderBy('sort_order')])->latest('updated_at')->first();
        $techGroups = TechGroup::with(['items' => fn($q)=>$q->orderBy('sort_order')])->orderBy('sort_order')->get();
        $categories = ProjectCategory::orderBy('sort_order')->get();
        $projects   = Project::with(['category','techItems'])->orderBy('sort_order')->get();
        $testimonials = Testimonial::orderBy('sort_order')->get();

        $projectsData = $projects->map(function ($p) {
            return [
                'id'          => $p->id,
                'title'       => $p->title,
                'role'        => $p->role,
                'category'    => optional($p->category)->slug,
                'image'       => $p->hero_image_url,
                'tech'        => $p->techItems->pluck('name')->values(),
                'description' => $p->description_html,
                'liveUrl'     => $p->live_url,
                'repoUrl'     => $p->repo_url,
            ];
        })->values();

        $testimonialsData = $testimonials->map(function ($t) {
            return [
                'id'     => $t->id,
                'name'   => $t->name,
                'role'   => $t->role,
                'avatar' => $t->avatar_url,
                'quote'  => $t->quote,
            ];
        })->values();

        return view('index', compact(
            'profile','techGroups','categories','projects','testimonials',
            'projectsData','testimonialsData'
        ));
    }
}
