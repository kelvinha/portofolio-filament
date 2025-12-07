<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\{Profile, SocialLink, TechGroup, ProjectCategory, Project, Testimonial, WorkExperience};

class LandingController extends Controller
{
    public function index()
    {
        $cacheKey = 'landing_page_data';
        $cacheTTL = 60; // 1 minute in seconds

        $data = Cache::remember($cacheKey, $cacheTTL, function () {
            $profile    = Profile::with(['socialLinks' => fn($q)=>$q->orderBy('sort_order')])->latest('updated_at')->first();
            $techGroups = TechGroup::with(['items' => fn($q)=>$q->orderBy('sort_order')])->orderBy('sort_order')->get();
            $categories = ProjectCategory::orderBy('sort_order')->get();
            $projects   = Project::with(['category','techItems'])->orderBy('year', 'desc')->get();
            $testimonials = Testimonial::orderBy('sort_order')->get();
            $workExperiences = WorkExperience::orderBy('id', 'desc')->get();

            $projectsData = $projects->map(function ($p) {
                return [
                    'id'          => $p->id,
                    'title'       => $p->title,
                    'year'        => $p->year,
                    'role'        => $p->role,
                    'category'    => optional($p->category)->slug,
                    'image'       => $p->hero_image_url,
                    'tech'        => $p->techItems->pluck('name')->values(),
                    'description' => $p->description_html,
                    'liveUrl'     => $p->live_url,
                    'repoUrl'     => $p->repo_url,
                ];
            })->values();

            $testimonialsData = $testimonials->map(fn($t)=>[
                'id'=>$t->id, 'name'=>$t->name, 'role'=>$t->role,
                'avatar'=>$t->avatar_url, 'quote'=>$t->quote,
            ])->values();

            $workExperiencesData = $workExperiences->map(fn($exp) => [
                'id' => $exp->id,
                'company_name' => $exp->company_name,
                'company_logo' => $exp->company_logo,
                'description' => $exp->description,
                'roles' => $exp->roles,
                'work_start_year' => $exp->work_start_year,
                'work_end_year' => $exp->work_end_year,
            ])->values();

            return compact('profile', 'techGroups', 'categories', 'projectsData', 'testimonialsData', 'workExperiencesData');
        });

        return view('index', $data);
    }
}
