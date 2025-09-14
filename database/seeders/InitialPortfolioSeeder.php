<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Profile, SocialLink, TechGroup, TechItem, ProjectCategory, Project, Testimonial};

class InitialPortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $profile = Profile::firstOrCreate([], [
            'full_name'  => 'Kelvin Hartanto',
            'headline'   => 'Backend Engineer & Mobile Enthusiast',
            'bio'        => 'Membangun sistem backend andal & aplikasi mobile intuitif. Fokus pada performa, skalabilitas, dan automasi.',
            'avatar_url' => 'vin.jpg',                                                                                                       // file lokal / URL
            'location'   => 'Jakarta, Indonesia',
            'years_experience' => 5,
            'projects_shipped' => 20,
            'industries_count' => 4,
            'cv_url' => 'dummy-cv.pdf',
        ]);

        // Sosial (optional; ganti URLmu)
        $socials = [
            ['platform'=>'github','url'=>'https://github.com/kelvinha','sort_order'=>1],
            ['platform'=>'linkedin','url'=>'https://www.linkedin.com/in/kelpin-hartanto','sort_order'=>2],
            ['platform'=>'instagram','url'=>'https://www.instagram.com/kelpin.dev/','sort_order'=>3],
        ];

        foreach ($socials as $s) {
            SocialLink::updateOrCreate(
                ['profile_id'=>$profile->id,'platform'=>$s['platform']], $s + ['profile_id'=>$profile->id]);
        }

        // Tech Groups (sesuai tabs)
        $groups = [
            ['name'=>'Backend','slug'=>'backend','sort_order'=>1],
            ['name'=>'Mobile','slug'=>'mobile','sort_order'=>2],
            ['name'=>'Data & Cache','slug'=>'data','sort_order'=>3],
            ['name'=>'Cloud & DevOps','slug'=>'cloud','sort_order'=>4],
        ];
        foreach ($groups as $g) { TechGroup::firstOrCreate(['slug'=>$g['slug']], $g); }

        $backend = TechGroup::where('slug','backend')->first();
        $mobile  = TechGroup::where('slug','mobile')->first();
        $data    = TechGroup::where('slug','data')->first();
        $cloud   = TechGroup::where('slug','cloud')->first();

        // Tech Items (pakai icon devicon atau teks)
        $techItems = [
            // backend
            ['tech_group_id'=>$backend->id,'name'=>'Go (Gin)','icon_url'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original-wordmark.svg','sort_order'=>1],
            ['tech_group_id'=>$backend->id,'name'=>'Go (Fast Http)','icon_url'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original-wordmark.svg','sort_order'=>2],
            ['tech_group_id'=>$backend->id,'name'=>'PHP (Laravel)','icon_url'=>'https://cdn.worldvectorlogo.com/logos/laravel-3.svg','sort_order'=>3],
            // mobile
            ['tech_group_id'=>$mobile->id,'name'=>'Flutter','icon_url'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg','sort_order'=>1],
            // data & cache
            ['tech_group_id'=>$data->id,'name'=>'MySQL','icon_url'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original-wordmark.svg','sort_order'=>1],
            ['tech_group_id'=>$data->id,'name'=>'PostgreSQL','icon_url'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original-wordmark.svg','sort_order'=>2],
            ['tech_group_id'=>$data->id,'name'=>'Redis','icon_url'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/redis/redis-original-wordmark.svg','sort_order'=>3],
            ['tech_group_id'=>$data->id,'name'=>'Elasticsearch','icon_url'=>'https://static.cdnlogo.com/logos/e/45/elastic.svg','sort_order'=>4],
            ['tech_group_id'=>$data->id,'name'=>'SingleStore','icon_url'=>'https://logo.svgcdn.com/l/singlestore.svg','sort_order'=>5],
            ['tech_group_id'=>$data->id,'name'=>'Couchbase','icon_url'=>'https://cdn.worldvectorlogo.com/logos/couchbase.svg','sort_order'=>6],
            
            // cloud & devops
            ['tech_group_id'=>$cloud->id,'name'=>'GCP','icon_url'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/googlecloud/googlecloud-original.svg','sort_order'=>1],
            ['tech_group_id'=>$cloud->id,'name'=>'Firebase','icon_url'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/firebase/firebase-plain-wordmark.svg','sort_order'=>2],
            ['tech_group_id'=>$cloud->id,'name'=>'Docker','icon_url'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original-wordmark.svg','sort_order'=>3],
            ['tech_group_id'=>$cloud->id,'name'=>'Kubernetes','icon_url'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/kubernetes/kubernetes-plain-wordmark.svg','sort_order'=>4],
            ['tech_group_id'=>$cloud->id,'name'=>'N8N Automation','icon_url'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/N8n-logo-new.svg/500px-N8n-logo-new.svg.png?20230204003316','sort_order'=>5],
        ];
        foreach ($techItems as $ti) { TechItem::firstOrCreate([
            'tech_group_id'=>$ti['tech_group_id'],'name'=>$ti['name']
        ], $ti); }

        // Categories
        $catBackend = ProjectCategory::firstOrCreate(['slug'=>'backend'],['name'=>'Backend','sort_order'=>1]);
        $catMobile  = ProjectCategory::firstOrCreate(['slug'=>'mobile'],['name'=>'Mobile','sort_order'=>2]);
        $catWeb     = ProjectCategory::firstOrCreate(['slug'=>'web'],    ['name'=>'Web','sort_order'=>3]);

        // Projects (contoh dari template)
        $p1 = Project::firstOrCreate(
            ['title'=>'Async Campaign Worker'],
            [
                'project_category_id'=>$catBackend->id,
                'role'=>'Backend Engineer',
                'hero_image_url'=>'https://placehold.co/600x400/8B5CF6/FFFFFF?text=Async+Worker',
                'description_html'=>'<p>Merancang worker asinkron untuk campaign massal berbasis MQ.</p><p><strong>Impact:</strong> Throughput +500%.</p>',
                'live_url'=>'#',
                'repo_url'=>'#',
                'sort_order'=>1,
            ]
        );

        $p2 = Project::firstOrCreate(
            ['title'=>'Admin CMS (Laravel)'],
            [
                'project_category_id'=>$catWeb->id,
                'role'=>'Fullstack Developer',
                'hero_image_url'=>'https://placehold.co/600x400/60A5FA/FFFFFF?text=Admin+CMS',
                'description_html'=>'<p>CMS internal RBAC, storage, caching Redis.</p>',
                'live_url'=>'#',
                'repo_url'=>'#',
                'sort_order'=>2,
            ]
        );

        $p3 = Project::firstOrCreate(
            ['title'=>'Flutter Client App'],
            [
                'project_category_id'=>$catMobile->id,
                'role'=>'Mobile Developer',
                'hero_image_url'=>'tb-warrior.png',
                'description_html'=>'<p>App cross-platform offline-first (SQLite) + Firebase.</p>',
                'live_url'=>null,
                'repo_url'=>'#',
                'sort_order'=>3,
            ]
        );

        // map tech ke projects (secukupnya)
        $go    = TechItem::where('name','like','Go%')->first();
        $larav = TechItem::where('name','like','PHP (Laravel)%')->first();
        $flut  = TechItem::where('name','Flutter')->first();
        $redis = TechItem::where('name','Redis')->first();

        if ($p1 && $go && $redis)   $p1->techItems()->syncWithoutDetaching([$go->id, $redis->id]);
        if ($p2 && $larav)          $p2->techItems()->syncWithoutDetaching([$larav->id]);
        if ($p3 && $flut)           $p3->techItems()->syncWithoutDetaching([$flut->id]);

        // Testimonials
        $testimonials = [
            ['name'=>'Andi Wijaya','role'=>'Project Manager, TechCorp','avatar_url'=>'https://placehold.co/100x100/0F172A/F1F5F9?text=AW','quote'=>'Kelvin selalu deliver solusi solid & efisien.'],
            ['name'=>'Siti Amelia','role'=>'Startup Founder','avatar_url'=>'https://placehold.co/100x100/0F172A/F1F5F9?text=SA','quote'=>'Proaktif memberi saran perbaikan produk. Highly recommended!'],
            ['name'=>'Budi Santoso','role'=>'Head of Engineering, FinTech Co.','avatar_url'=>'https://placehold.co/100x100/0F172A/F1F5F9?text=BS','quote'=>'Skalabilitas sistem meningkat drastis setelah refactor.'],
        ];
        foreach ($testimonials as $i => $t) {
            Testimonial::firstOrCreate(['name'=>$t['name'], 'quote'=>$t['quote']], $t + ['sort_order'=>$i+1]);
        }
    }
}

