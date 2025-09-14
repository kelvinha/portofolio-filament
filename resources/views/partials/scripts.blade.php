    
    <script>
        // Alpine.js data for projects
        function projectsData() {
            return {
                filter: 'all',
                projects: [
                    {
                        id: 1,
                        title: 'Async Campaign Worker',
                        role: 'Backend Lead',
                        category: 'backend',
                        image: 'https://placehold.co/600x400/8B5CF6/FFFFFF?text=Async+Worker',
                        tech: ['Go', 'Redis', 'GCP Pub/Sub', 'Docker'],
                        description: `<p>Merancang dan mengimplementasikan sistem worker asinkron untuk memproses pengiriman campaign (email, notifikasi) dalam jumlah besar. Menggunakan arsitektur berbasis message queue untuk memastikan keandalan dan skalabilitas.</p><p class="mt-4"><strong>Impact:</strong> Meningkatkan throughput pemrosesan hingga 500%, mengurangi duplikasi pesan hingga 99%, dan menurunkan latensi pengiriman secara signifikan.</p>`,
                        liveUrl: '#',
                        repoUrl: '#'
                    },
                    {
                        id: 2,
                        title: 'Admin CMS (Laravel)',
                        role: 'Fullstack Developer',
                        category: 'web',
                        image: 'https://placehold.co/600x400/60A5FA/FFFFFF?text=Admin+CMS',
                        tech: ['Laravel', 'PHP', 'MySQL', 'Redis', 'Bootstrap'],
                        description: `<p>Membangun Content Management System (CMS) internal dengan fitur Role-Based Access Control (RBAC) yang komprehensif, manajemen file terintegrasi dengan cloud storage, dan sistem caching menggunakan Redis untuk mempercepat waktu muat halaman.</p>`,
                        liveUrl: '#',
                        repoUrl: '#'
                    },
                    {
                        id         : 3,
                        title      : 'Flutter Client App',
                        role       : 'Mobile Developer',
                        category   : 'mobile',
                        image      : '/tb-warrior.png',
                        tech       : ['Flutter', 'Dart', 'Firebase', 'SQLite'],
                        description: `<p>Mengembangkan aplikasi mobile cross-platform untuk klien dengan strategi offline-first menggunakan SQLite. Terintegrasi dengan Firebase untuk otentikasi, Firestore database, dan push notifications.</p>`,
                        liveUrl    : null,
                        repoUrl    : '#'
                    },
                    {
                        id: 4,
                        title: 'Search Analytics Dashboard',
                        role: 'Backend Engineer',
                        category: 'backend',
                        image: 'https://placehold.co/600x400/F59E0B/FFFFFF?text=Search+Analytics',
                        tech: ['Elasticsearch', 'SingleStore', 'Go', 'Grafana'],
                        description: `<p>Membangun pipeline data untuk menganalisis query pencarian pengguna. Data diindeks ke Elasticsearch untuk pencarian teks dan diagregasi ke SingleStore untuk analisis cepat. Hasilnya divisualisasikan menggunakan Grafana.</p><p class="mt-4"><strong>Impact:</strong> Menurunkan latensi query analitik dari menit ke detik.</p>`,
                        liveUrl: '#',
                        repoUrl: null
                    },
                    {
                        id: 5,
                        title: 'n8n Automation Pipeline',
                        role: 'Automation Specialist',
                        category: 'backend',
                        image: 'https://placehold.co/600x400/EC4899/FFFFFF?text=n8n+Automation',
                        tech: ['n8n.io', 'Node.js', 'APIs', 'Google Sheets'],
                        description: `<p>Membuat pipeline automasi untuk job alert. Sistem ini secara otomatis melakukan scraping dari berbagai sumber, mem-parsing data, lalu mengirimkan notifikasi yang relevan ke WhatsApp dan mencatatnya di Google Sheets.</p>`,
                        liveUrl: '#',
                        repoUrl: '#'
                    },
                    {
                        id: 6,
                        title: 'Containerized Deployment CI/CD',
                        role: 'DevOps Engineer',
                        category: 'web',
                        image: 'https://placehold.co/600x400/10B981/FFFFFF?text=CI/CD',
                        tech: ['Docker', 'GitHub Actions', 'GCP'],
                        description: `<p>Mengimplementasikan proses CI/CD untuk beberapa layanan web menggunakan Docker dan GitHub Actions. Setiap push ke branch utama akan secara otomatis membangun image Docker, menjalankan tes, dan mendeploy ke Google Cloud Platform.</p>`,
                        liveUrl: null,
                        repoUrl: '#'
                    }
                ],
                filteredProjects() {
                    if (this.filter === 'all') {
                        return this.projects;
                    }
                    return this.projects.filter(p => p.category === this.filter);
                }
            }
        }

        // Alpine.js data for testimonials carousel
        function testimonialsCarousel() {
            return {
                currentIndex: 0,
                interval: null,
                testimonials: [
                    { id: 1, name: 'Andi Wijaya', role: 'Project Manager, TechCorp', avatar: 'https://placehold.co/100x100/0F172A/F1F5F9?text=AW', quote: 'Kelvin memiliki kemampuan teknis yang mendalam dan etos kerja yang luar biasa. Dia selalu memberikan solusi yang solid dan efisien, bahkan untuk masalah yang paling kompleks sekalipun.' },
                    { id: 2, name: 'Siti Amelia', role: 'Startup Founder', avatar: 'https://placehold.co/100x100/0F172A/F1F5F9?text=SA', quote: 'Bekerja dengan Kelvin sangat menyenangkan. Dia tidak hanya mengeksekusi tugas dengan baik, tetapi juga proaktif dalam memberikan saran untuk perbaikan produk kami. Sangat direkomendasikan!' },
                    { id: 3, name: 'Budi Santoso', role: 'Head of Engineering, FinTech Co.', avatar: 'https://placehold.co/100x100/0F172A/F1F5F9?text=BS', quote: 'Skalabilitas sistem kami meningkat drastis setelah di-refactor oleh Kelvin. Kemampuannya dalam arsitektur backend benar-benar terbukti.' }
                ],
                next() {
                    this.currentIndex = (this.currentIndex + 1) % this.testimonials.length;
                },
                prev() {
                    this.currentIndex = (this.currentIndex - 1 + this.testimonials.length) % this.testimonials.length;
                },
                start() {
                    this.interval = setInterval(() => {
                        this.next();
                    }, 5000);
                },
                stop() {
                    clearInterval(this.interval);
                },
                init() {
                    this.start();
                }
            }
        }
    </script>

</body>
</html>