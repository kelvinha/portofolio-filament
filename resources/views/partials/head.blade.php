<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelvin Hartanto - Backend Engineer & Mobile Enthusiast</title>

    <!-- Meta Tags for SEO -->
    <meta name="description" content="Portfolio pribadi Kelvin Hartanto, seorang Backend Engineer & Mobile Enthusiast yang berfokus pada performa, skalabilitas, dan automasi.">
    <meta name="keywords" content="Kelvin Hartanto, Backend Engineer, Mobile Enthusiast, Go, Gin, PHP, Laravel, Flutter, GCP, Docker, Portfolio">
    <meta name="author" content="Kelvin Hartanto">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://your-domain.com/">
    <meta property="twitter:title" content="Kelvin Hartanto - Backend Engineer & Mobile Enthusiast">
    <meta property="twitter:description" content="Portfolio pribadi Kelvin Hartanto, seorang Backend Engineer & Mobile Enthusiast yang berfokus pada performa, skalabilitas, dan automasi.">
    <meta property="twitter:image" content="https://placehold.co/1200x630/0F172A/F1F5F9?text=KH">

    <!-- Favicon -->
    <link rel = "icon" href = "https://placehold.co/32x32/FF00FF/FFFFFF?text=KH" type = "image/png">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
   <!-- Tailwind CSS -->
    <script src = "https://cdn.tailwindcss.com"></script>

    <!-- Custom Tailwind Config -->
    <script>
    tailwind.config = {
        darkMode: 'class',
        theme   : {
        extend: {
            fontFamily: {
            sans: ['Inter', 'sans-serif'],
            },
            colors: {
            'cyber-ink': '#0D1117',
            'plasma-cyan': '#00E5FF',
            'hyper-magenta': '#FF00FF',
            'glitch-green': '#39FF14',
            'slate-base': '#0F172A',
            'matrix-gray': {
                100: '#E5E5E5',
                300: '#A3A3A3',
                500: '#737373',
                700: '#404040',
                900: '#1A1A1A',
            },
            },
            animation: {
            'gradient-shine': 'gradient-shine 3s linear infinite',
            'marquee'       : 'marquee 40s linear infinite',
            },
            keyframes: {
            'gradient-shine': {
                '0%, 100%': { 'background-position': '0% 50%' },
                '50%'     : { 'background-position': '100% 50%' },
            },
            'marquee': {
                '0%'  : { transform: 'translateX(0%)' },
                '100%': { transform: 'translateX(-100%)' },
            }
            }
        }
        }
    }
    </script>

    <!-- Alpine.js for Interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.plugin(AlpineIntersect)
        })
    </script>
    
    <style>
        /* Base styles */
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0D1117 0%, #1A1A1A 100%);
            color: #E5E5E5;
            font-feature-settings: "cv02", "cv03", "cv04", "cv11";
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Smooth scroll for anchor links */
        html {
            scroll-behavior: smooth;
        }

        /* Reduced motion preferences */
        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }
        
        /* Modern glassy card effect */
        .card-glassy {
            background: rgba(26, 26, 26, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        /* Custom focus ring */
        .focus-ring-modern {
            outline: none;
            transition: all 0.2s ease;
        }
        
        .focus-ring-modern:focus {
            box-shadow: 0 0 0 3px rgba(0, 229, 255, 0.25);
            border-color: #00E5FF;
        }
        
        /* Subtle modern background pattern */
        .tech-pattern {
            background-image: 
                radial-gradient(circle at 1px 1px, rgba(0, 229, 255, 0.1) 1px, transparent 0);
            background-size: 40px 40px;
        }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #00E5FF, #FF00FF, #39FF14);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Button hover effects */
        .btn-modern {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #0D1117;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #00E5FF, #FF00FF);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #00B8CC, #CC00CC);
        }
    </style>

        <!-- Extra custom animations for fade-in, fade-in-up, and delay -->
    <style type="text/tailwindcss">
        @layer utilities {
        @keyframes fade-in { from {opacity:0} to {opacity:1} }
        @keyframes fade-in-up { from {opacity:0; transform:translateY(8px)} to {opacity:1; transform:translateY(0)} }

        .animate-fade-in { animation: fade-in .6s ease-out both; }
        .animate-fade-in-up { animation: fade-in-up .6s ease-out both; }
        .animation-delay-4000 { animation-delay: 4s; }
    }
    </style>
</head>