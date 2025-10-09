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
                        <a href="#contact" class="px-8 py-3.5 font-bold text-cyber-ink bg-glitch-green rounded-lg shadow-lg shadow-glitch-green/20 hover:scale-[1.02] hover:shadow-glitch-green/40 transition-all duration-200 focus-ring-modern">
                            Hire Me
                        </a>
                        <a href="#projects" class="px-8 py-3.5 font-bold text-matrix-gray-100 bg-transparent border-2 border-matrix-gray-500 rounded-lg hover:bg-matrix-gray-700 hover:border-matrix-gray-300 hover:scale-[1.02] transition-all duration-200 focus-ring-modern">
                            View Projects
                        </a>
                    </div>
                </div>
                <div class = "hidden md:flex justify-center items-center animate-fade-in">
                <div class = "relative">
                <img src="/vin.jpg" alt="Avatar Kelvin Hartanto" class="rounded-full border-4 border-matrix-gray-700 shadow-2xl shadow-plasma-cyan/20">
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
                <p class="text-lg text-matrix-gray-500 mt-2">Sedikit tentang perjalanan saya di dunia teknologi.</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-center">
                <div class="lg:col-span-3 text-lg text-matrix-gray-300 leading-8 space-y-4">
                    <p>
                        Sebagai seorang engineer, saya terobsesi dengan performa, keandalan, dan efisiensi. Saya menikmati proses merancang arsitektur sistem backend yang mampu menangani beban tinggi, serta mengotomatisasi proses-proses repetitif untuk meningkatkan produktivitas.
                    </p>
                    <p>
                        Di sisi mobile, saya antusias dengan Flutter karena kemampuannya membangun aplikasi cross-platform yang indah dan cepat. Saya percaya bahwa kombinasi backend yang kuat dan frontend yang responsif adalah kunci untuk menciptakan produk digital yang luar biasa.
                    </p>
                </div>
                <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-6">
                    <div class="card-glassy p-6 text-center transform hover:scale-105 transition-transform duration-300">
                        <div class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-plasma-cyan to-hyper-magenta">{{ $profile->years_experience ?? 0 }}+</div>
                        <p class="text-matrix-gray-300 mt-2">Years of Experience</p>
                    </div>
                     <div class="card-glassy p-6 text-center transform hover:scale-105 transition-transform duration-300">
                        <div class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-plasma-cyan to-hyper-magenta">{{ $profile->project_shipped ?? 0 }}+</div>
                        <p class="text-matrix-gray-300 mt-2">Projects Shipped</p>
                    </div>
                     <div class="card-glassy p-6 text-center transform hover:scale-105 transition-transform duration-300">
                        <div class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-plasma-cyan to-hyper-magenta">{{ $profile->industries_count  }}</div>
                        <p class="text-matrix-gray-300 mt-2">Industries</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Skills / Tech Stack Section -->
        <section id="skills" class="py-24" x-data="{ activeTab: 'backend' }">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Tech Stack</h2>
                <p class="text-lg text-matrix-gray-500 mt-2">Tools dan teknologi yang saya gunakan sehari-hari.</p>
            </div>

            <!-- Tabs -->
            <div class="flex justify-center mb-8 border-b border-matrix-gray-700">
                <button @click="activeTab = 'backend'" :class="{ 'text-plasma-cyan border-plasma-cyan': activeTab === 'backend', 'text-matrix-gray-500 border-transparent': activeTab !== 'backend' }"
                        class="px-6 py-3 font-semibold border-b-2 transition-colors duration-300">
                    Backend
                </button>
                <button @click="activeTab = 'mobile'" :class="{ 'text-plasma-cyan border-plasma-cyan': activeTab === 'mobile', 'text-matrix-gray-500 border-transparent': activeTab !== 'mobile' }"
                        class="px-6 py-3 font-semibold border-b-2 transition-colors duration-300">
                    Mobile
                </button>
                <button @click="activeTab = 'data'" :class="{ 'text-plasma-cyan border-plasma-cyan': activeTab === 'data', 'text-matrix-gray-500 border-transparent': activeTab !== 'data' }"
                        class="px-6 py-3 font-semibold border-b-2 transition-colors duration-300">
                    Data & Cache
                </button>
                <button @click="activeTab = 'cloud'" :class="{ 'text-plasma-cyan border-plasma-cyan': activeTab === 'cloud', 'text-matrix-gray-500 border-transparent': activeTab !== 'cloud' }"
                        class="px-6 py-3 font-semibold border-b-2 transition-colors duration-300">
                    Cloud & DevOps
                </button>
            </div>

            <!-- Skill Content -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 text-center">
                <!-- Backend -->
                <template x-if="activeTab === 'backend'">
                    <div class="card-glassy p-6 flex flex-col items-center justify-center space-y-3 transform hover:-translate-y-2 transition-transform duration-300">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original-wordmark.svg" class="h-12" alt="Go Icon"/>
                        <span class="font-semibold">Go (Gin)</span>
                    </div>
                </template>
                 <template x-if="activeTab === 'backend'">
                    <div class="card-glassy p-6 flex flex-col items-center justify-center space-y-3 transform hover:-translate-y-2 transition-transform duration-300">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain-wordmark.svg" class="h-12" alt="Laravel Icon"/>
                        <span class="font-semibold">PHP (Laravel)</span>
                    </div>
                </template>
                <!-- Mobile -->
                <template x-if="activeTab === 'mobile'">
                    <div class="card-glassy p-6 flex flex-col items-center justify-center space-y-3 transform hover:-translate-y-2 transition-transform duration-300">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg" class="h-12" alt="Flutter Icon"/>
                        <span class="font-semibold">Flutter</span>
                    </div>
                </template>
                <!-- Data & Cache -->
                <template x-if="activeTab === 'data'">
                    <div class="card-glassy p-6 flex flex-col items-center justify-center space-y-3 transform hover:-translate-y-2 transition-transform duration-300">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original-wordmark.svg" class="h-12" alt="MySQL Icon"/>
                        <span class="font-semibold">MySQL</span>
                    </div>
                </template>
                <template x-if="activeTab === 'data'">
                    <div class="card-glassy p-6 flex flex-col items-center justify-center space-y-3 transform hover:-translate-y-2 transition-transform duration-300">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original-wordmark.svg" class="h-12" alt="PostgreSQL Icon"/>
                        <span class="font-semibold">PostgreSQL</span>
                    </div>
                </template>
                 <template x-if="activeTab === 'data'">
                    <div class="card-glassy p-6 flex flex-col items-center justify-center space-y-3 transform hover:-translate-y-2 transition-transform duration-300">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/redis/redis-original-wordmark.svg" class="h-12" alt="Redis Icon"/>
                        <span class="font-semibold">Redis</span>
                    </div>
                </template>
                <template x-if="activeTab === 'data'">
                    <div class="card-glassy p-6 flex flex-col items-center justify-center space-y-3 transform hover:-translate-y-2 transition-transform duration-300">
                        <p class="text-2xl font-bold">Elastic</p>
                        <span class="font-semibold">Elasticsearch</span>
                    </div>
                </template>
                 <template x-if="activeTab === 'data'">
                    <div class="card-glassy p-6 flex flex-col items-center justify-center space-y-3 transform hover:-translate-y-2 transition-transform duration-300">
                        <p class="text-2xl font-bold">SingleStore</p>
                        <span class="font-semibold">SingleStore</span>
                    </div>
                </template>
                <!-- Cloud & DevOps -->
                <template x-if="activeTab === 'cloud'">
                    <div class="card-glassy p-6 flex flex-col items-center justify-center space-y-3 transform hover:-translate-y-2 transition-transform duration-300">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/googlecloud/googlecloud-original.svg" class="h-12" alt="GCP Icon"/>
                        <span class="font-semibold">GCP</span>
                    </div>
                </template>
                <template x-if="activeTab === 'cloud'">
                    <div class="card-glassy p-6 flex flex-col items-center justify-center space-y-3 transform hover:-translate-y-2 transition-transform duration-300">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/firebase/firebase-plain-wordmark.svg" class="h-12" alt="Firebase Icon"/>
                        <span class="font-semibold">Firebase</span>
                    </div>
                </template>
                <template x-if="activeTab === 'cloud'">
                    <div class="card-glassy p-6 flex flex-col items-center justify-center space-y-3 transform hover:-translate-y-2 transition-transform duration-300">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original-wordmark.svg" class="h-12" alt="Docker Icon"/>
                        <span class="font-semibold">Docker</span>
                    </div>
                </template>
                <template x-if="activeTab === 'cloud'">
                     <div class="card-glassy p-6 flex flex-col items-center justify-center space-y-3 transform hover:-translate-y-2 transition-transform duration-300">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/kubernetes/kubernetes-plain-wordmark.svg" class="h-12" alt="Kubernetes Icon"/>
                        <span class="font-semibold">Kubernetes</span>
                    </div>
                </template>
                 <template x-if="activeTab === 'cloud'">
                    <div class="card-glassy p-6 flex flex-col items-center justify-center space-y-3 transform hover:-translate-y-2 transition-transform duration-300">
                        <p class="text-2xl font-bold">n8n</p>
                        <span class="font-semibold">n8n.io</span>
                    </div>
                </template>
            </div>

              <!-- Marquee -->
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
                <p class="text-lg text-matrix-gray-500 mt-2">Beberapa proyek yang pernah saya kerjakan.</p>
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
                        <h3 class="text-xl font-bold text-matrix-gray-100" x-text="project.title"></h3>
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
        <section id="testimonials" class="py-24" x-data="testimonialsCarousel()">
             <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Testimonials</h2>
                <p class="text-lg text-matrix-gray-500 mt-2">Apa kata mereka tentang kerja sama dengan saya.</p>
            </div>
            <div class="relative w-full max-w-3xl mx-auto overflow-hidden" @mouseenter="stop" @mouseleave="start">
                <div class="flex transition-transform duration-500 ease-in-out" :style="{ transform: `translateX(-${currentIndex * 100}%)` }">
                    <template x-for="testimonial in testimonials" :key="testimonial.id">
                        <div class="w-full flex-shrink-0 px-4">
                            <div class="card-glassy p-8 md:p-12 text-center">
                                <p class="text-lg md:text-xl italic text-matrix-gray-300 leading-relaxed">" <span x-text="testimonial.quote"></span> "</p>
                                <div class="mt-8 flex items-center justify-center">
                                    <img :src="testimonial.avatar" :alt="testimonial.name" class="w-14 h-14 rounded-full border-2 border-hyper-magenta">
                                    <div class="ml-4 text-left">
                                        <p class="font-bold text-matrix-gray-100" x-text="testimonial.name"></p>
                                        <p class="text-sm text-matrix-gray-500" x-text="testimonial.role"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
                <!-- Carousel Controls -->
                <button @click="prev()" class="absolute top-1/2 left-0 -translate-y-1/2 -translate-x-1/2 p-2 bg-matrix-gray-900/50 rounded-full hover:bg-matrix-gray-700 transition-colors focus-ring-modern">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button @click="next()" class="absolute top-1/2 right-0 -translate-y-1/2 translate-x-1/2 p-2 bg-matrix-gray-900/50 rounded-full hover:bg-matrix-gray-700 transition-colors focus-ring-modern">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </section>

        <!-- Contact Section -->
        <section id    = "contact" class = "py-24">
        <div     class = "text-center mb-16">
        <h2      class = "text-3xl md:text-4xl font-bold tracking-tight">Get In Touch</h2>
        <p       class = "text-lg text-matrix-gray-500 mt-2">Mari berdiskusi tentang proyek Anda selanjutnya.</p>
            </div>
            <div class="max-w-2xl mx-auto card-glassy p-8 md:p-12">
                <form action="mailto:your.email@example.com" method="get" enctype="text/plain">
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-matrix-gray-300">Name</label>
                            <input type="text" name="subject" id="name" required class="mt-1 block w-full bg-matrix-gray-900 border border-matrix-gray-700 rounded-lg shadow-sm py-3 px-4 text-matrix-gray-100 focus:border-plasma-cyan focus:ring focus:ring-plasma-cyan focus:ring-opacity-50">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-matrix-gray-300">Email</label>
                            <input type="email" name="cc" id="email" required class="mt-1 block w-full bg-matrix-gray-900 border border-matrix-gray-700 rounded-lg shadow-sm py-3 px-4 text-matrix-gray-100 focus:border-plasma-cyan focus:ring focus:ring-plasma-cyan focus:ring-opacity-50">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-matrix-gray-300">Message</label>
                            <textarea id="message" name="body" rows="4" required class="mt-1 block w-full bg-matrix-gray-900 border border-matrix-gray-700 rounded-lg shadow-sm py-3 px-4 text-matrix-gray-100 focus:border-plasma-cyan focus:ring focus:ring-plasma-cyan focus:ring-opacity-50"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="w-full px-8 py-3.5 font-bold text-cyber-ink bg-glitch-green rounded-lg shadow-lg shadow-glitch-green/20 hover:scale-[1.02] hover:shadow-glitch-green/40 transition-all duration-200 focus-ring-modern">
                                Send Message
                            </button>
                        </div>
                    </div>
                </form>
                <div class="text-center mt-8">
                    <p class="text-matrix-gray-500">Saya biasanya merespon dalam 1-2 hari kerja.</p>
                    <p class="text-matrix-gray-500">Location: {{ $profile->location ?? 'Jakarta, Indonesia' }}</p>
                    <div class="flex justify-center space-x-6 mt-6">
                        <a href="#" class="text-matrix-gray-500 hover:text-plasma-cyan transition-colors"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12.013c0 4.418 2.865 8.166 6.839 9.49.5.092.682-.217.682-.482 0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.031-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.378.203 2.398.1 2.651.64.7 1.03 1.595 1.03 2.688 0 3.848-2.338 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.001 10.001 0 0022 12.013C22 6.477 17.523 2 12 2z" clip-rule="evenodd" /></svg></a>
                        <a href="#" class="text-matrix-gray-500 hover:text-plasma-cyan transition-colors"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.71v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg></a>
                        <a href="#" class="text-matrix-gray-500 hover:text-plasma-cyan transition-colors"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.206v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.337 8.905H4v-8.59h2.674v8.59zM17.638 2H6.362A4.362 4.362 0 002 6.362v11.276A4.362 4.362 0 006.362 22h11.276A4.362 4.362 0 0022 17.638V6.362A4.362 4.362 0 0017.638 2z" clip-rule="evenodd" /></svg></a>
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
            <h3 class="text-3xl font-bold mb-2" x-text="activeProject.title"></h3>
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
