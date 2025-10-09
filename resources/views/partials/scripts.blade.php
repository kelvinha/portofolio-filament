
    <script>
        function projectsData() {
            return {
                filter: 'all',
                projects: @json($projectsData),
                filteredProjects(){
                    if (this.filter === 'all') return this.projects;
                    return this.projects.filter(p => p.category === this.filter);
                }
            }
        }

        function testimonialsCarousel() {
            return {
                currentIndex: 0,
                interval: null,
                testimonials: @json($testimonialsData),
                next(){ this.currentIndex = (this.currentIndex + 1) % this.testimonials.length; },
                prev(){ this.currentIndex = (this.currentIndex - 1 + this.testimonials.length) % this.testimonials.length; },
                start(){ this.interval = setInterval(() => this.next(), 5000); },
                stop(){ if (this.interval) clearInterval(this.interval); },
                init(){ this.start(); }
            }
        }
    </script>

</body>
</html>
