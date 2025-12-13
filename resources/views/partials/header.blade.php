<header x-data="{ scrolled: false }" @scroll.window="scrolled = (window.scrollY > 50)"
        :class="{ 'bg-cyber-ink/80 backdrop-blur-lg border-b border-matrix-gray-700': scrolled }"
        class="fixed top-0 left-0 w-full z-50 transition-all duration-300">
<nav    class  = "container mx-auto px-6 py-4 flex justify-between items-center">
<a      href   = "#home" class                        = "text-2xl font-bold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-plasma-cyan to-hyper-magenta">
                KH
            </a>
            <div class="hidden md:flex items-center space-x-8">
                <a href="#home" class="text-matrix-gray-100 hover:text-plasma-cyan transition-colors">Home</a>
                <a href="#about" class="text-matrix-gray-100 hover:text-plasma-cyan transition-colors">About</a>
                <a href="#experience" class="text-matrix-gray-100 hover:text-plasma-cyan transition-colors">Experience</a>
                <a href="#skills" class="text-matrix-gray-100 hover:text-plasma-cyan transition-colors">Skills</a>
                <a href="#projects" class="text-matrix-gray-100 hover:text-plasma-cyan transition-colors">Projects</a>
                <!-- <a href="#testimonials" class="text-matrix-gray-100 hover:text-plasma-cyan transition-colors">Testimonials</a> -->
                <a href="#contact" class="text-matrix-gray-100 hover:text-plasma-cyan transition-colors">Contact</a>
            </div>
            <div class="hidden md:block">
                @if($profile && $profile->cv_url)
                    <a href="{{ Storage::url($profile->cv_url) }}" download class="px-5 py-2.5 text-sm font-semibold rounded-lg bg-matrix-gray-900 text-matrix-gray-100 hover:bg-matrix-gray-100 hover:text-cyber-ink transition-all duration-300 focus-ring-modern">
                        Download CV
                    </a>
                @endif
            </div>
            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-matrix-gray-100 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </nav>
        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform -translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform -translate-y-2"
             class="md:hidden bg-cyber-ink/95 backdrop-blur-sm absolute top-full left-0 w-full">
            <div class="flex flex-col items-center space-y-6 py-8">
                <a href="#home" @click="mobileMenuOpen = false" class="text-matrix-gray-100 hover:text-plasma-cyan transition-colors">Home</a>
                <a href="#about" @click="mobileMenuOpen = false" class="text-matrix-gray-100 hover:text-plasma-cyan transition-colors">About</a>
                <a href="#experience" @click="mobileMenuOpen = false" class="text-matrix-gray-100 hover:text-plasma-cyan transition-colors">Experience</a>
                <a href="#skills" @click="mobileMenuOpen = false" class="text-matrix-gray-100 hover:text-plasma-cyan transition-colors">Skills</a>
                <a href="#projects" @click="mobileMenuOpen = false" class="text-matrix-gray-100 hover:text-plasma-cyan transition-colors">Projects</a>
                <!-- <a href="#testimonials" @click="mobileMenuOpen = false" class="text-matrix-gray-100 hover:text-plasma-cyan transition-colors">Testimonials</a> -->
                <a href="#contact" @click="mobileMenuOpen = false" class="text-matrix-gray-100 hover:text-plasma-cyan transition-colors">Contact</a>
                @if($profile && $profile->cv_url)
                    <a href="{{ Storage::url($profile->cv_url) }}" download class="mt-4 px-6 py-3 text-sm font-semibold rounded-lg bg-matrix-gray-900 text-matrix-gray-100 hover:bg-matrix-gray-100 hover:text-cyber-ink transition-all duration-300 focus-ring-modern">
                        Download CV
                    </a>
                @endif
            </div>
        </div>
    </header>
