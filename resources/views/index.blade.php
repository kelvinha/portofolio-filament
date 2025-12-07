@include('partials.head')

<body x-data="{ activeSection: 'home', mobileMenuOpen: false, projectModalOpen: false, activeProject: {} }">

    <!-- Background Glow -->
    <div class="absolute top-0 left-0 -z-10 w-full h-full overflow-hidden">
        <div class="absolute top-[-20%] left-[-10%] w-[500px] h-[500px] bg-hyper-magenta/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-[-20%] right-[-10%] w-[500px] h-[500px] bg-plasma-cyan/10 rounded-full blur-3xl animate-pulse animation-delay-4000"></div>
    </div>

    <!-- Header / Navbar -->
    @include('partials.header')

    <main class="container mx-auto px-6">

        <!-- Hero Section -->
        <section id="home" class="min-h-screen flex items-center tech-pattern">
            <div class="w-full text-center md:text-left grid grid-cols-1 md:grid-cols-2 items-center gap-12">
                <div class="space-y-6 animate-fade-in-up">
                    <h1   class = "text-4xl md:text-6xl font-extrabold tracking-tight">
                    <span class="block animate-fade-in-up">{{ $profile->full_name ?? 'Your Name' }}</span>
                    <span class = "block bg-clip-text text-transparent bg-gradient-to-r from-plasma-cyan via-hyper-magenta to-glitch-green bg-[length:200%_200%] animate-gradient-shine mt-2">
                       {{ $profile->headline ?? 'Your Headline' }}
                    </span>
                    </h1>
                    <p class="max-w-xl mx-auto md:mx-0 text-lg md:text-xl text-matrix-gray-300 leading-8">
                        {{ $profile->bio ?? 'Short bio...' }}
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center md:justify-start gap-4 pt-4">
                        <a href="mailto:kelvinhartanto18@gmail.com" class="px-8 py-3.5 font-bold text-cyber-ink bg-glitch-green rounded-lg shadow-lg shadow-glitch-green/20 hover:scale-[1.02] hover:shadow-glitch-green/40 transition-all duration-200 focus-ring-modern">
                            Hire Me
                        </a>
                        <a href="#projects" class="px-8 py-3.5 font-bold text-matrix-gray-100 bg-transparent border-2 border-matrix-gray-500 rounded-lg hover:bg-matrix-gray-700 hover:border-matrix-gray-300 hover:scale-[1.02] transition-all duration-200 focus-ring-modern">
                            View Projects
                        </a>
                    </div>
                </div>
                <div class = "hidden md:flex justify-center items-center animate-fade-in">
                <div class = "relative">
                <div class="relative">
                    <div class="absolute inset-0 bg-matrix-gray-800 rounded-full animate-pulse"></div>
                    <img src="{{ Storage::url($profile->avatar_url) }}"
                         alt="Avatar {{ $profile->full_name ?? 'Your Name' }}"
                         class="rounded-full border-4 border-matrix-gray-700 shadow-2xl shadow-plasma-cyan/20 transition-opacity duration-300"
                         loading="lazy"
                         onload="this.style.opacity='1'"
                         style="opacity: 0">
                </div>
                        <div class="absolute -top-4 -right-4 p-3 bg-matrix-gray-900 rounded-full shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-hyper-magenta" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                        </div>
                         <div class="absolute -bottom-4 -left-4 p-3 bg-matrix-gray-900 rounded-full shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-glitch-green" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M12 6V3m0 18v-3" /></svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-24">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold tracking-tight">About Me</h2>
                <p class="text-lg text-matrix-gray-500 mt-2">A bit about my journey in the world of technology.</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-center">
                <div class="lg:col-span-3 text-lg text-matrix-gray-300 leading-8 space-y-4">
                    <p>
                        {{ $profile->about_me ?? 'Write something about yourself here...' }}
                    </p>
                </div>
                <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-6">
                    <div class="card-glassy p-6 text-center transform hover:scale-105 transition-transform duration-300">
                        <div class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-plasma-cyan to-hyper-magenta">{{ $profile->years_experience ?? 0 }}+</div>
                        <p class="text-matrix-gray-300 mt-2">Years of Experience</p>
                    </div>
                     <div class="card-glassy p-6 text-center transform hover:scale-105 transition-transform duration-300">
                        <div class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-plasma-cyan to-hyper-magenta">{{ $profile->projects_shipped ?? 0 }}+</div>
                        <p class="text-matrix-gray-300 mt-2">Projects Shipped</p>
                    </div>
                     <div class="card-glassy p-6 text-center transform hover:scale-105 transition-transform duration-300">
                        <div class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-plasma-cyan to-hyper-magenta">{{ $profile->industries_count  }}</div>
                        <p class="text-matrix-gray-300 mt-2">Industries</p>
                    </div>
                </div>
            </div>
        </section>

         <!-- Work Experience Section -->
         <section id="experience" class="py-24">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Work Experience</h2>
                <p class="text-lg text-matrix-gray-500 mt-2">My professional journey and career milestones.</p>
            </div>

            <div class="max-w-4xl mx-auto">
                @if(isset($workExperiencesData) && $workExperiencesData->count() > 0)
                    <div class="relative">
                        <!-- Timeline line -->
                        <div class="absolute left-1/2 transform -translate-x-0.5 w-0.5 h-full bg-gradient-to-b from-plasma-cyan to-hyper-magenta"></div>

                        <div class="space-y-12">
                            @foreach($workExperiencesData as $index => $experience)
                                <div class="relative flex items-center {{ $index % 2 === 0 ? 'justify-start' : 'justify-end' }} {{ $index % 2 === 0 ? 'pr-1/2' : 'pl-1/2' }}">
                                    <!-- Timeline dot -->
                                    <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-plasma-cyan rounded-full border-4 border-cyber-ink z-10"></div>

                                    <!-- Content card -->
                                    <div class="card-glassy p-6 max-w-md w-full {{ $index % 2 === 0 ? 'mr-8' : 'ml-8' }} hover:scale-105 transition-transform duration-300">
                                        <div class="flex items-start space-x-4">
                                            @if($experience['company_logo'])
                                                <div class="flex-shrink-0">
                                                    <img src="{{ Storage::url($experience['company_logo']) }}"
                                                         alt="{{ $experience['company_name'] }} Logo"
                                                         class="w-12 h-12 rounded-lg object-cover bg-matrix-gray-800"
                                                         loading="lazy">
                                                </div>
                                            @endif
                                            <div class="flex-1">
                                                <div class="flex items-center justify-between mb-2">
                                                    <h3 class="text-xl font-bold text-matrix-gray-100">{{ $experience['company_name'] }}</h3>
                                                    <span class="text-sm font-semibold text-plasma-cyan bg-plasma-cyan/10 px-2 py-1 rounded-full">
                                                        {{ $experience['work_start_year'] }}
                                                        @if($experience['work_end_year'])
                                                            - {{ $experience['work_end_year'] }}
                                                        @else
                                                            - Present
                                                        @endif
                                                    </span>
                                                </div>
                                                @if($experience['roles'])
                                                    <p class="text-sm font-semibold text-hyper-magenta mb-2">{{ $experience['roles'] }}</p>
                                                @endif
                                                @if($experience['description'])
                                                    <p class="text-matrix-gray-300 text-sm leading-relaxed">{{ $experience['description'] }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <!-- Empty state -->
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-matrix-gray-800 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-matrix-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-matrix-gray-300 mb-2">Work Experience Coming Soon</h3>
                        <p class="text-matrix-gray-500">Professional experience will be added through the admin panel.</p>
                    </div>
                @endif
            </div>
        </section>

{{--        <!-- Skills / Tech Stack Section -->--}}
        <section id="skills" class="py-24"
                 x-data="{ activeTab: '{{ $techGroups->first()->slug ?? 'backend' }}' }">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Tech Stack</h2>
                <p class="text-lg text-matrix-gray-500 mt-2">Tools and technologies I use on a daily basis.</p>
            </div>

            {{-- Tabs (otomatis dari DB) --}}
            <div class="flex justify-center mb-8 border-b border-matrix-gray-700">
                @foreach ($techGroups as $g)
                    <button
                        @click="activeTab = '{{ $g->slug }}'"
                        :class="{ 'text-plasma-cyan border-plasma-cyan': activeTab === '{{ $g->slug }}',
                      'text-matrix-gray-500 border-transparent': activeTab !== '{{ $g->slug }}' }"
                        class="px-6 py-3 font-semibold border-b-2 transition-colors duration-300">
                        {{ $g->name }}
                    </button>
                @endforeach
            </div>

            @foreach ($techGroups as $g)
                <div x-show="activeTab === '{{ $g->slug }}'"
                     class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 text-center">
                    @foreach ($g->items as $item)
                        <div class="card-glassy p-6 flex flex-col items-center justify-center space-y-3 transform hover:-translate-y-2 transition-transform duration-300">
                            @if($item->icon_url)
                                <img src="{{ $item->icon_url }}"
                                     class="h-12 transition-opacity duration-300"
                                     alt="{{ $item->name }}"
                                     loading="lazy"
                                     onload="this.style.opacity='1'"
                                     style="opacity: 0">
                            @else
                                <p class="text-2xl font-bold">{{ $item->name }}</p>
                            @endif
                            <span class="font-semibold">{{ $item->name }}</span>
                        </div>
                    @endforeach
                </div>
            @endforeach

                <div x-data x-intersect.once.margin.-100px="$el.classList.add('visible')" class="reveal mt-16 w-full overflow-hidden relative">
                    <div class="absolute inset-y-0 left-0 w-16 bg-gradient-to-r from-slate-base/30 to-transparent z-10"></div>
                    <div class="absolute inset-y-0 right-0 w-16 bg-gradient-to-l from-slate-base/30 to-transparent z-10"></div>
                    <div class="flex animate-marquee whitespace-nowrap">
                        <span class="mx-4 text-slate-400">Kubernetes</span>
                        <span class="mx-4 text-slate-400">CI/CD</span>
                        <span class="mx-4 text-slate-400">Terraform</span>
                        <span class="mx-4 text-slate-400">Prometheus</span>
                        <span class="mx-4 text-slate-400">Grafana</span>
                        <span class="mx-4 text-slate-400">Git</span>
                        <span class="mx-4 text-slate-400">Linux</span>
                        <span class="mx-4 text-slate-400">Nginx</span>
                        <!-- Duplicate for seamless loop -->
                        <span class="mx-4 text-slate-400">Kubernetes</span>
                        <span class="mx-4 text-slate-400">CI/CD</span>
                        <span class="mx-4 text-slate-400">Terraform</span>
                        <span class="mx-4 text-slate-400">Prometheus</span>
                        <span class="mx-4 text-slate-400">Grafana</span>
                        <span class="mx-4 text-slate-400">Git</span>
                        <span class="mx-4 text-slate-400">Linux</span>
                        <span class="mx-4 text-slate-400">Nginx</span>
                    </div>
                </div>
        </section>

        <!-- Featured Projects Section -->
        <section id="projects" class="py-24" x-data="projectsData()">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Featured Projects</h2>
                <p class="text-lg text-matrix-gray-500 mt-2">Some projects I've worked on.</p>
            </div>

            <!-- Filter Buttons -->
            <div class="flex justify-center flex-wrap gap-3 mb-12">
                <button @click="filter = 'all'" :class="{ 'bg-plasma-cyan text-cyber-ink': filter === 'all', 'bg-matrix-gray-900 text-matrix-gray-300': filter !== 'all' }"
                        class="px-5 py-2 text-sm font-semibold rounded-full transition-colors duration-300">
                    All
                </button>
                <button @click="filter = 'backend'" :class="{ 'bg-plasma-cyan text-cyber-ink': filter === 'backend', 'bg-matrix-gray-900 text-matrix-gray-300': filter !== 'backend' }"
                        class="px-5 py-2 text-sm font-semibold rounded-full transition-colors duration-300">
                    Backend
                </button>
                <button @click="filter = 'mobile'" :class="{ 'bg-plasma-cyan text-cyber-ink': filter === 'mobile', 'bg-matrix-gray-900 text-matrix-gray-300': filter !== 'mobile' }"
                        class="px-5 py-2 text-sm font-semibold rounded-full transition-colors duration-300">
                    Mobile
                </button>
                <button @click="filter = 'web'" :class="{ 'bg-plasma-cyan text-cyber-ink': filter === 'web', 'bg-matrix-gray-900 text-matrix-gray-300': filter !== 'web' }"
                        class="px-5 py-2 text-sm font-semibold rounded-full transition-colors duration-300">
                    Web
                </button>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <template x-for="project in filteredProjects()" :key="project.id">
                    <div @click="activeProject = project; projectModalOpen = true"
                         class="card-glassy p-6 group cursor-pointer overflow-hidden transform hover:scale-[1.02] transition-transform duration-300">
                        <div class="relative aspect-video rounded-lg overflow-hidden mb-4">
                            <img :src="project.image" :alt="project.title" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            <div class="absolute inset-0 bg-black/20"></div>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-xl font-bold text-matrix-gray-100" x-text="project.title"></h3>
                            <span class="text-sm font-semibold text-plasma-cyan bg-plasma-cyan/10 px-2 py-1 rounded-full" x-text="project.year"></span>
                        </div>
                        <p class="text-sm text-matrix-gray-500 mb-4" x-text="project.role"></p>
                        <div class="flex flex-wrap gap-2">
                            <template x-for="tech in project.tech" :key="tech">
                                <span class="text-xs font-semibold bg-matrix-gray-900 text-matrix-gray-300 px-2.5 py-1 rounded-full" x-text="tech"></span>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
        </section>

        <!-- Testimonials Section -->
        <!-- <section id="testimonials" class="py-24" x-data="testimonialsCarousel()">
             <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Testimonials</h2>
                <p class="text-lg text-matrix-gray-500 mt-2">What they say about working with me.</p>
            </div>
            <div class="relative w-full max-w-3xl mx-auto overflow-hidden" @mouseenter="stop" @mouseleave="start">
                <div class="flex transition-transform duration-500 ease-in-out" :style="{ transform: `translateX(-${currentIndex * 100}%)` }">
                    <template x-for="testimonial in testimonials" :key="testimonial.id">
                        <div class="w-full flex-shrink-0 px-4">
                            <div class="card-glassy p-8 md:p-12 text-center">
                                <p class="text-lg md:text-xl italic text-matrix-gray-300 leading-relaxed">" <span x-text="testimonial.quote"></span> "</p>
                                <div class="mt-8 flex items-center justify-center">
                                    <img :src="testimonial.avatar"
                                         :alt="testimonial.name"
                                         class="w-14 h-14 rounded-full border-2 border-hyper-magenta transition-opacity duration-300"
                                         loading="lazy"
                                         onload="this.style.opacity='1'"
                                         style="opacity: 0">
                                    <div class="ml-4 text-left">
                                        <p class="font-bold text-matrix-gray-100" x-text="testimonial.name"></p>
                                        <p class="text-sm text-matrix-gray-500" x-text="testimonial.role"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
                <button @click="prev()" class="absolute top-1/2 left-0 -translate-y-1/2 -translate-x-1/2 p-2 bg-matrix-gray-900/50 rounded-full hover:bg-matrix-gray-700 transition-colors focus-ring-modern">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button @click="next()" class="absolute top-1/2 right-0 -translate-y-1/2 translate-x-1/2 p-2 bg-matrix-gray-900/50 rounded-full hover:bg-matrix-gray-700 transition-colors focus-ring-modern">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </section> -->

        <!-- Social Links Section -->
        <section id="contact" class="py-24">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Connect With Me</h2>
                <p class="text-lg text-matrix-gray-500 mt-2">Find me on various digital platforms</p>
            </div>

            <div class="max-w-4xl mx-auto">
                @if($profile && $profile->socialLinks->count() > 0)
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                        @foreach($profile->socialLinks as $socialLink)
                            <a href="{{ $socialLink->url }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="group card-glassy p-6 hover:scale-105 transition-all duration-300 hover:shadow-lg hover:shadow-plasma-cyan/20"
                               title="Visit {{ $socialLink->platform }}">
                                <div class="flex flex-col items-center text-center space-y-4">
                                    <div class="p-4 bg-matrix-gray-900 rounded-full group-hover:bg-matrix-gray-800 transition-colors duration-300">
                                        <div class="w-8 h-8 text-matrix-gray-400 group-hover:text-plasma-cyan transition-colors duration-300">
                                            {!! $socialLink->icon_svg !!}
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-matrix-gray-200 group-hover:text-white transition-colors duration-300">
                                            {{ $socialLink->platform }}
                                        </h3>
                                        <p class="text-sm text-matrix-gray-500 group-hover:text-matrix-gray-400 transition-colors duration-300">
                                            Follow me here
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <!-- Fallback social links jika belum ada data di CMS -->
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-matrix-gray-800 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-matrix-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-matrix-gray-300 mb-2">Social Links Coming Soon</h3>
                        <p class="text-matrix-gray-500">Social media links akan segera ditambahkan melalui admin panel.</p>
                    </div>
                @endif

                <!-- Contact Info -->
                <div class="text-center mt-16">
                    <div class="card-glassy p-8 max-w-md mx-auto">
                        <h3 class="text-xl font-semibold text-matrix-gray-200 mb-4">Get In Touch</h3>
                        <p class="text-matrix-gray-500 mb-6">Interested in working together? Let's discuss your project!</p>
                        <a href="mailto:kelvinhartanto18@gmail.com"
                           class="inline-flex items-center px-6 py-3 font-bold text-cyber-ink bg-glitch-green rounded-lg shadow-lg shadow-glitch-green/20 hover:scale-[1.02] hover:shadow-glitch-green/40 transition-all duration-200 focus-ring-modern">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Send Email
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>

      <!-- Project Modal -->
    <div         x-show                 = "projectModalOpen"
    x-transition:enter                  = "ease-out duration-300"
    x-transition:enter-start            = "opacity-0"
    x-transition:enter-end              = "opacity-100"
    x-transition:leave                  = "ease-in duration-200"
    x-transition:leave-start            = "opacity-100"
    x-transition:leave-end              = "opacity-0"
                 class                  = "fixed inset-0 z-50 flex items-center justify-center bg-cyber-ink/80 backdrop-blur-sm p-4"
                 @keydown.escape.window = "projectModalOpen = false">
    <div         @click.away            = "projectModalOpen = false"
                 class                  = "relative w-full max-w-3xl max-h-[90vh] card-glassy p-8 rounded-2xl overflow-y-auto">
    <button      @click                 = "projectModalOpen = false" class = "absolute top-4 right-4 text-matrix-gray-500 hover:text-white transition-colors">
    <svg         class                  = "w-6 h-6" fill                   = "none" stroke = "currentColor" viewBox = "0 0 24 24"><path stroke-linecap = "round" stroke-linejoin = "round" stroke-width = "2" d = "M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-3xl font-bold" x-text="activeProject.title"></h3>
                <span class="text-lg font-semibold text-plasma-cyan bg-plasma-cyan/10 px-3 py-1 rounded-full" x-text="activeProject.year"></span>
            </div>
            <p class="text-md text-matrix-gray-500 mb-6" x-text="activeProject.role"></p>
            <img :src="activeProject.image" :alt="activeProject.title" class="w-full aspect-video object-cover rounded-lg mb-6">
            <div class="text-matrix-gray-300 space-y-4 leading-7" x-html="activeProject.description"></div>
            <div class="mt-6">
                <h4 class="font-bold text-lg mb-3">Tech Stack</h4>
                <div class="flex flex-wrap gap-2">
                    <template x-for="tech in activeProject.tech" :key="tech">
                        <span class="text-sm font-semibold bg-matrix-gray-900 text-matrix-gray-300 px-3 py-1.5 rounded-full" x-text="tech"></span>
                    </template>
                </div>
            </div>
            <div class="mt-8 flex gap-4">
                <a :href="activeProject.liveUrl" target="_blank" x-show="activeProject.liveUrl" class="flex-1 text-center px-6 py-3 font-bold text-cyber-ink bg-glitch-green rounded-lg shadow-lg shadow-glitch-green/20 hover:scale-[1.02] hover:shadow-glitch-green/40 transition-all duration-200 focus-ring-modern">
                    Live Demo
                </a>
                <a :href="activeProject.repoUrl" target="_blank" x-show="activeProject.repoUrl" class="flex-1 text-center px-6 py-3 font-bold text-matrix-gray-100 bg-transparent border-2 border-matrix-gray-500 rounded-lg hover:bg-matrix-gray-700 hover:border-matrix-gray-300 hover:scale-[1.02] transition-all duration-200 focus-ring-modern">
                    GitHub Repo
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('partials.footer')

@include('partials.scripts')
