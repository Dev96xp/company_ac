<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lalos Heating and Cooling</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            scroll-behavior: smooth;
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
        }

        .hero-bg {
            background: linear-gradient(135deg, #0D1117 0%, #0D1117 40%, #0F2044 70%, #0D1117 100%);
        }

        .hero-glow {
            background: radial-gradient(ellipse 60% 50% at 70% 50%, rgba(37, 99, 235, 0.25) 0%, transparent 70%);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-14px)
            }
        }

        @keyframes snowflake {
            0% {
                opacity: 0;
                transform: translateY(0) scale(.6)
            }

            20% {
                opacity: .8
            }

            100% {
                opacity: 0;
                transform: translateY(60px) scale(1)
            }
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(.9);
                opacity: .7
            }

            100% {
                transform: scale(1.5);
                opacity: 0
            }
        }

        .ac-float {
            animation: float 4s ease-in-out infinite;
        }

        .flake {
            animation: snowflake 2.5s ease-in infinite;
        }

        .flake:nth-child(2) {
            animation-delay: .4s
        }

        .flake:nth-child(3) {
            animation-delay: .8s
        }

        .flake:nth-child(4) {
            animation-delay: 1.2s
        }

        .flake:nth-child(5) {
            animation-delay: 1.6s
        }

        .flake:nth-child(6) {
            animation-delay: 2s
        }

        .badge-pulse::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 9999px;
            background: rgba(96, 165, 250, .4);
            animation: pulse-ring 1.8s ease-out infinite;
        }

        .card-hover {
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, .15);
        }

        .nav-link {
            position: relative;
            transition: color .2s;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: #2563EB;
            transition: width .3s;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link:hover {
            color: white;
        }

        .gradient-text {
            background: linear-gradient(90deg, #60A5FA, #3B82F6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .gradient-text-red {
            background: linear-gradient(90deg, #F87171, #DC2626);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, .15);
        }

        .avail-open {
            background: #166534;
            border-color: #16a34a;
            color: #bbf7d0;
        }

        .avail-busy {
            background: #7f1d1d;
            border-color: #dc2626;
            color: #fca5a5;
        }

        .avail-maybe {
            background: #713f12;
            border-color: #d97706;
            color: #fde68a;
        }

        .avail-slot {
            transition: background .2s, transform .2s;
            cursor: pointer;
        }

        .avail-slot:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 antialiased">

    {{-- ===================== NAVBAR ===================== --}}
    <nav class="fixed top-0 left-0 right-0 z-50 bg-gray-950 bg-opacity-95 backdrop-blur-md border-b border-gray-800">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="#" class="flex items-center gap-3 group">
                <div
                    class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center group-hover:bg-blue-500 transition-colors shadow-lg shadow-blue-900/40">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white"
                        stroke-width="2.2" stroke-linecap="round">
                        <rect x="2" y="7" width="20" height="10" rx="2" />
                        <path d="M7 17v3M12 17v3M17 17v3" />
                        <path d="M6 11h8M16 11h2" />
                    </svg>
                </div>
                <div class="leading-tight">
                    <span class="text-white font-bold text-base">Lalos</span>
                    <span class="text-blue-400 font-bold text-base"> Heating &amp; Cooling</span>
                </div>
            </a>

            <div class="hidden md:flex items-center gap-6">
                <a href="#services" class="nav-link text-gray-400 text-sm font-medium">Services</a>
                <a href="#why-us" class="nav-link text-gray-400 text-sm font-medium">Why Us</a>
                <a href="#testimonials" class="nav-link text-gray-400 text-sm font-medium">Reviews</a>
                <a href="#location" class="nav-link text-gray-400 text-sm font-medium">Location</a>
                <a href="#contact" class="nav-link text-gray-400 text-sm font-medium">Contact</a>
            </div>

            <div class="flex items-center gap-3">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="text-gray-400 hover:text-white text-sm transition-colors">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-400 hover:text-white text-sm transition-colors">Log
                            in</a>
                    @endauth
                @endif
                <a href="#appointment"
                    class="bg-red-600 hover:bg-red-500 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition-all shadow-lg shadow-red-900/30">
                    Book Appointment
                </a>
            </div>
        </div>
    </nav>

    {{-- ===================== HERO ===================== --}}
    <section class="hero-bg relative overflow-hidden min-h-screen flex items-center pt-20">
        <div class="hero-glow absolute inset-0 pointer-events-none"></div>
        <div class="absolute inset-0 pointer-events-none opacity-5"
            style="background-image:linear-gradient(#60A5FA 1px,transparent 1px),linear-gradient(90deg,#60A5FA 1px,transparent 1px);background-size:60px 60px;">
        </div>

        <div class="relative max-w-6xl mx-auto px-6 py-24 grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <div
                    class="inline-flex items-center gap-2.5 bg-blue-950 border border-blue-800 rounded-full px-4 py-2 mb-8">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="badge-pulse absolute inline-flex h-full w-full rounded-full bg-blue-400"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-blue-400"></span>
                    </span>
                    <span class="text-blue-300 text-sm font-medium">Available 24/7 — Emergency Service</span>
                </div>

                <div class="mb-4">
                    <p class="text-3xl lg:text-4xl font-extrabold text-white tracking-wide leading-tight">
                        Lalos
                        <span class="text-blue-400">Heating</span>
                        <span class="text-gray-400 font-light">&amp;</span>
                        <span class="text-red-400">Cooling</span>
                    </p>
                    <div class="mt-2 h-1 w-24 rounded-full bg-gradient-to-r from-blue-500 to-red-500"></div>
                </div>

                <h1
                    class="text-5xl lg:text-6xl xl:text-7xl font-extrabold text-white leading-[1.05] mb-6 tracking-tight">
                    Stay Cool.<br>
                    <span class="gradient-text">Stay Warm.</span><br>
                    <span class="gradient-text-red">Stay Comfortable.</span>
                </h1>

                <p class="text-3xl lg:text-4xl font-extrabold text-white tracking-wide leading-tight">
                    <span class="text-blue-400">(402) 906-3334</span>
                </p>

                <p class="text-gray-400 text-lg leading-relaxed mb-10 max-w-lg">
                    Professional heating and cooling solutions for your home and business.
                    Expert technicians, fast response, and comfort you can count on — every season.
                </p>
                <div class="flex flex-wrap gap-4 mb-14">
                    <a href="#appointment"
                        class="bg-red-600 hover:bg-red-500 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-xl shadow-red-900/30 text-base">
                        Book an Appointment
                    </a>
                    <a href="#services"
                        class="border border-blue-700 text-blue-300 hover:bg-blue-950 hover:border-blue-500 px-8 py-3.5 rounded-xl font-semibold transition-all text-base">
                        Our Services
                    </a>
                </div>
                <div class="flex items-center gap-3 mb-10">
                    <div class="flex items-center gap-2 bg-blue-950 border border-blue-800 rounded-xl px-4 py-2.5">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#60A5FA" stroke-width="2" stroke-linecap="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                            <path d="M9 22V12h6v10"/>
                        </svg>
                        <span class="text-blue-300 text-sm font-semibold">Residential</span>
                    </div>
                    <span class="text-gray-600 font-bold">&amp;</span>
                    <div class="flex items-center gap-2 bg-red-950 border border-red-900 rounded-xl px-4 py-2.5">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#F87171" stroke-width="2" stroke-linecap="round">
                            <rect x="2" y="7" width="20" height="14" rx="2"/>
                            <path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/>
                            <path d="M12 12v3M9 12h6"/>
                        </svg>
                        <span class="text-red-300 text-sm font-semibold">Commercial</span>
                    </div>
                </div>

                <div class="flex gap-8">
                    <div>
                        <div class="text-4xl font-extrabold text-white">15+</div>
                        <div class="text-gray-500 text-sm mt-0.5">Years of Experience</div>
                    </div>
                    <div class="border-l border-gray-700 pl-8">
                        <div class="text-4xl font-extrabold text-white">2K+</div>
                        <div class="text-gray-500 text-sm mt-0.5">Happy Clients</div>
                    </div>
                    <div class="border-l border-gray-700 pl-8">
                        <div class="text-4xl font-extrabold text-white">24/7</div>
                        <div class="text-gray-500 text-sm mt-0.5">Support Available</div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center items-center">
                <div class="ac-float">
                    <svg viewBox="0 0 460 380" width="420" height="320" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <radialGradient id="bgGlow" cx="50%" cy="40%" r="55%">
                                <stop offset="0%" stop-color="#1D4ED8" stop-opacity=".35" />
                                <stop offset="100%" stop-color="#1D4ED8" stop-opacity="0" />
                            </radialGradient>
                            <linearGradient id="unitGrad" x1="0" y1="0" x2="0"
                                y2="1">
                                <stop offset="0%" stop-color="#293548" />
                                <stop offset="100%" stop-color="#1a2233" />
                            </linearGradient>
                            <linearGradient id="panelGrad" x1="0" y1="0" x2="0"
                                y2="1">
                                <stop offset="0%" stop-color="#0f172a" />
                                <stop offset="100%" stop-color="#0a0f1c" />
                            </linearGradient>
                            <filter id="acShadow">
                                <feDropShadow dx="0" dy="8" stdDeviation="12" flood-color="#1D4ED8"
                                    flood-opacity=".35" />
                            </filter>
                        </defs>

                        <ellipse cx="230" cy="175" rx="180" ry="145" fill="url(#bgGlow)" />

                        {{-- AC unit body --}}
                        <rect x="50" y="85" width="360" height="120" rx="18" fill="url(#unitGrad)"
                            filter="url(#acShadow)" />
                        <rect x="62" y="97" width="336" height="96" rx="12" fill="url(#panelGrad)" />

                        {{-- Vent grilles --}}
                        <rect x="76" y="118" width="220" height="4" rx="2" fill="#1e3a5f"
                            opacity=".9" />
                        <rect x="76" y="128" width="220" height="4" rx="2" fill="#1e3a5f"
                            opacity=".9" />
                        <rect x="76" y="138" width="220" height="4" rx="2" fill="#1e3a5f"
                            opacity=".9" />
                        <rect x="76" y="148" width="220" height="4" rx="2" fill="#1e3a5f"
                            opacity=".9" />
                        <rect x="76" y="158" width="220" height="4" rx="2" fill="#1e3a5f"
                            opacity=".9" />
                        <rect x="76" y="168" width="220" height="4" rx="2" fill="#1e3a5f"
                            opacity=".9" />
                        <rect x="140" y="176" width="90" height="6" rx="3" fill="#2563EB"
                            opacity=".5" />

                        {{-- Brand label --}}
                        <rect x="76" y="108" width="82" height="14" rx="3" fill="#1e3a5f"
                            opacity=".4" />
                        <text x="117" y="119" text-anchor="middle" fill="#93C5FD" font-size="7"
                            font-family="sans-serif" font-weight="600" letter-spacing="1">LALOS H&amp;C</text>

                        {{-- Control panel --}}
                        <rect x="312" y="102" width="76" height="86" rx="8" fill="#0f172a"
                            opacity=".6" />
                        <rect x="320" y="110" width="60" height="32" rx="5" fill="#060d1a" />
                        <text x="350" y="120" text-anchor="middle" fill="#60A5FA" font-size="7"
                            font-family="monospace" opacity=".7">LALOS A/C</text>
                        <text x="350" y="134" text-anchor="middle" fill="#93C5FD" font-size="13"
                            font-family="monospace" font-weight="bold">72F</text>

                        {{-- Power button --}}
                        <circle cx="350" cy="164" r="10" fill="#1a0505" stroke="#DC2626"
                            stroke-width="1.5" />
                        <path d="M350 157 L350 161" stroke="#EF4444" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M344.5 159.5 A7 7 0 1 0 355.5 159.5" stroke="#EF4444" stroke-width="1.5"
                            fill="none" stroke-linecap="round" />

                        <circle cx="325" cy="178" r="3" fill="#22c55e" opacity=".9" />
                        <circle cx="337" cy="178" r="3" fill="#3B82F6" opacity=".6" />

                        {{-- Shadow under unit --}}
                        <rect x="50" y="200" width="360" height="8" rx="4" fill="#1D4ED8"
                            opacity=".18" />

                        {{-- Cold air streams --}}
                        <path d="M90 215 Q100 235 88 258" stroke="#93C5FD" stroke-width="2.5" fill="none"
                            stroke-linecap="round" opacity=".5" />
                        <path d="M130 215 Q141 238 127 262" stroke="#93C5FD" stroke-width="2" fill="none"
                            stroke-linecap="round" opacity=".45" />
                        <path d="M170 215 Q182 240 168 265" stroke="#93C5FD" stroke-width="2.5" fill="none"
                            stroke-linecap="round" opacity=".55" />
                        <path d="M210 215 Q221 237 208 260" stroke="#93C5FD" stroke-width="2" fill="none"
                            stroke-linecap="round" opacity=".4" />
                        <path d="M250 215 Q261 238 248 263" stroke="#93C5FD" stroke-width="2.5" fill="none"
                            stroke-linecap="round" opacity=".5" />

                        {{-- Floating snowflakes --}}
                        <g class="flake"><text x="85" y="285" fill="#93C5FD" font-size="22" opacity=".8">*</text>
                        </g>
                        <g class="flake"><text x="133" y="300" fill="#BAE6FD" font-size="16"
                                opacity=".6">*</text></g>
                        <g class="flake"><text x="178" y="292" fill="#93C5FD" font-size="24"
                                opacity=".7">*</text></g>
                        <g class="flake"><text x="223" y="296" fill="#BAE6FD" font-size="18"
                                opacity=".55">*</text></g>
                        <g class="flake"><text x="265" y="287" fill="#93C5FD" font-size="20"
                                opacity=".65">*</text></g>

                        {{-- Outdoor compressor unit --}}
                        <rect x="345" y="258" width="78" height="68" rx="8" fill="#1a2233"
                            stroke="#293548" stroke-width="1.5" />
                        <circle cx="384" cy="292" r="22" fill="none" stroke="#1D4ED8"
                            stroke-width="1.5" opacity=".6" />
                        <circle cx="384" cy="292" r="5" fill="#1D4ED8" opacity=".8" />
                        <path d="M384 270 L386 278 L384 292 L382 278 Z" fill="#3B82F6" opacity=".6" />
                        <path d="M406 292 L398 294 L384 292 L398 290 Z" fill="#3B82F6" opacity=".6" />
                        <path d="M384 314 L382 306 L384 292 L386 306 Z" fill="#3B82F6" opacity=".6" />
                        <path d="M362 292 L370 290 L384 292 L370 294 Z" fill="#3B82F6" opacity=".6" />
                        {{-- Connecting pipe --}}
                        <path d="M300 200 Q310 240 345 268" stroke="#374151" stroke-width="5" fill="none"
                            stroke-linecap="round" />
                        <path d="M300 200 Q310 240 345 268" stroke="#1e3a5f" stroke-width="3" fill="none"
                            stroke-linecap="round" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 60" fill="none" preserveAspectRatio="none">
                <path d="M0 60 L0 30 Q360 0 720 30 Q1080 60 1440 30 L1440 60 Z" fill="#f9fafb" />
            </svg>
        </div>
    </section>

    {{-- ===================== SERVICES ===================== --}}
    <section id="services" class="py-24 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-widest">What We Do</span>
                <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-900 mt-2 mb-4">Our Services</h2>
                <p class="text-gray-500 text-lg max-w-xl mx-auto">From full installations to emergency fixes — we
                    handle every HVAC need, every season.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="card-hover bg-white rounded-3xl p-8 border border-gray-100 shadow-sm">
                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mb-6">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" stroke="#2563EB"
                            stroke-width="2" stroke-linecap="round">
                            <rect x="3" y="10" width="28" height="14" rx="4" />
                            <path d="M8 15h12M8 19h7" />
                            <circle cx="26" cy="15" r="2.5" />
                            <path d="M11 24v5M22 24v5" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">AC Installation</h3>
                    <p class="text-gray-500 leading-relaxed mb-5">Professional installation of new air conditioning
                        systems for homes and businesses — all brands and models.</p>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center gap-2 text-gray-600"><span
                                class="text-blue-500 font-bold">✓</span> Free site evaluation</li>
                        <li class="flex items-center gap-2 text-gray-600"><span
                                class="text-blue-500 font-bold">✓</span> Same-day installation available</li>
                        <li class="flex items-center gap-2 text-gray-600"><span
                                class="text-blue-500 font-bold">✓</span> 2-year warranty on labor</li>
                    </ul>
                </div>

                <div
                    class="card-hover bg-gray-900 rounded-3xl p-8 border border-gray-800 shadow-xl relative overflow-hidden">
                    <div class="absolute top-4 right-4 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                        Most Popular</div>
                    <div
                        class="w-16 h-16 bg-red-950 rounded-2xl flex items-center justify-center mb-6 border border-red-900">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" stroke="#EF4444"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 4l-5 5-9 9 5 5 9-9 5-5-5-5z" />
                            <path d="M4 30l9-9" />
                            <path d="M24 7c2.5 2.5 5 6 5 10a10 10 0 01-10 10" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Repairs &amp; Diagnostics</h3>
                    <p class="text-gray-400 leading-relaxed mb-5">Fast, accurate HVAC diagnosis and repair. We fix it
                        right the first time — guaranteed.</p>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center gap-2 text-gray-300"><span
                                class="text-red-400 font-bold">✓</span> Emergency 24/7 service</li>
                        <li class="flex items-center gap-2 text-gray-300"><span
                                class="text-red-400 font-bold">✓</span> Transparent, upfront pricing</li>
                        <li class="flex items-center gap-2 text-gray-300"><span
                                class="text-red-400 font-bold">✓</span> All major brands serviced</li>
                    </ul>
                </div>

                <div class="card-hover bg-white rounded-3xl p-8 border border-gray-100 shadow-sm">
                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mb-6">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" stroke="#2563EB"
                            stroke-width="2" stroke-linecap="round">
                            <circle cx="17" cy="17" r="13" />
                            <path d="M17 8v4M17 22v4M8 17h4M22 17h4" />
                            <circle cx="17" cy="17" r="5" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Preventive Maintenance</h3>
                    <p class="text-gray-500 leading-relaxed mb-5">Keep your system running at peak efficiency
                        year-round with our comprehensive maintenance plans.</p>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center gap-2 text-gray-600"><span
                                class="text-blue-500 font-bold">✓</span> Seasonal tune-ups</li>
                        <li class="flex items-center gap-2 text-gray-600"><span
                                class="text-blue-500 font-bold">✓</span> Filter replacement service</li>
                        <li class="flex items-center gap-2 text-gray-600"><span
                                class="text-blue-500 font-bold">✓</span> Priority scheduling</li>
                    </ul>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mt-8">
                <div
                    class="card-hover bg-white rounded-2xl p-6 border border-gray-100 shadow-sm flex items-start gap-5">
                    <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" stroke="#DC2626"
                            stroke-width="2" stroke-linecap="round">
                            <path d="M13 2v10M8 7l5-5 5 5" />
                            <path d="M6 14c0 3.9 3.1 7 7 7s7-3.1 7-7" />
                            <path d="M4 20h18" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-1">Heating Systems</h4>
                        <p class="text-gray-500 text-sm">Furnaces, heat pumps, and boilers installed and serviced.</p>
                    </div>
                </div>
                <div
                    class="card-hover bg-white rounded-2xl p-6 border border-gray-100 shadow-sm flex items-start gap-5">
                    <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" stroke="#2563EB"
                            stroke-width="2" stroke-linecap="round">
                            <rect x="2" y="4" width="22" height="16" rx="3" />
                            <path d="M9 20v2M17 20v2M6 12h14" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-1">Commercial HVAC</h4>
                        <p class="text-gray-500 text-sm">Full-scale solutions for offices, retail, and industrial
                            spaces.</p>
                    </div>
                </div>
                <div
                    class="card-hover bg-white rounded-2xl p-6 border border-gray-100 shadow-sm flex items-start gap-5">
                    <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" stroke="#DC2626"
                            stroke-width="2" stroke-linecap="round">
                            <path d="M13 3L3 9v4c0 5.5 4.3 10.7 10 12 5.7-1.3 10-6.5 10-12V9L13 3z" />
                            <path d="M9 13l3 3 5-5" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-1">Air Quality &amp; Filtration</h4>
                        <p class="text-gray-500 text-sm">Purifiers, UV systems, and duct cleaning for healthy indoor
                            air.</p>
                    </div>
                </div>
            </div>

            {{-- New Construction Banner --}}
            <div class="mt-10 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 rounded-3xl border border-gray-700 p-8 flex flex-col md:flex-row items-center gap-6 shadow-xl">
                <div class="w-16 h-16 bg-blue-900 bg-opacity-60 border border-blue-800 rounded-2xl flex items-center justify-center flex-shrink-0">
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 17L17 4l14 13"/>
                        <path d="M7 13v14h6v-7h8v7h6V13"/>
                    </svg>
                </div>
                <div class="flex-1 text-center md:text-left">
                    <div class="inline-block bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full mb-2 uppercase tracking-wide">New Construction</div>
                    <h3 class="text-white font-extrabold text-xl mb-1">Complete HVAC Installations for New Homes</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Building a new home? We handle the full HVAC setup from the ground up — ductwork, units, thermostats, and everything in between. We work directly with contractors and developers to ensure your new construction is comfort-ready from day one.
                    </p>
                </div>
                <a href="#contact" class="flex-shrink-0 bg-blue-600 hover:bg-blue-500 text-white px-6 py-3 rounded-xl font-semibold text-sm transition-all shadow-lg shadow-blue-900/30 whitespace-nowrap">
                    Get a Quote →
                </a>
            </div>

        </div>
    </section>

    {{-- ===================== WHY US ===================== --}}
    <section id="why-us" class="py-24 bg-gray-900 relative overflow-hidden">
        <div
            class="absolute top-0 left-0 w-96 h-96 bg-blue-950 rounded-full opacity-30 -translate-x-1/2 -translate-y-1/2">
        </div>
        <div
            class="absolute bottom-0 right-0 w-80 h-80 bg-red-950 rounded-full opacity-30 translate-x-1/3 translate-y-1/3">
        </div>

        <div class="relative max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-red-400 font-semibold text-sm uppercase tracking-widest">Our Difference</span>
                <h2 class="text-4xl lg:text-5xl font-extrabold text-white mt-2 mb-4">Why Choose Lalos?</h2>
                <p class="text-gray-400 text-lg max-w-xl mx-auto">We're not just fixing machines — we're building
                    comfort and trust in every home we serve.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-gray-800 bg-opacity-50 border border-gray-700 rounded-2xl p-6 text-center card-hover">
                    <div
                        class="w-16 h-16 bg-blue-900 bg-opacity-60 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" stroke="#60A5FA"
                            stroke-width="2" stroke-linecap="round">
                            <circle cx="15" cy="15" r="12" />
                            <path d="M15 8v7l4 2" />
                        </svg>
                    </div>
                    <h4 class="text-white font-bold text-lg mb-2">Fast Response</h4>
                    <p class="text-gray-400 text-sm leading-relaxed">Same-day service for most repairs. Emergency calls
                        answered within the hour.</p>
                </div>
                <div class="bg-gray-800 bg-opacity-50 border border-gray-700 rounded-2xl p-6 text-center card-hover">
                    <div
                        class="w-16 h-16 bg-red-900 bg-opacity-40 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" stroke="#F87171"
                            stroke-width="2" stroke-linecap="round">
                            <path d="M15 3l2.8 8.6H26l-6.9 5 2.6 8.6L15 20l-6.7 5.2 2.6-8.6L4 11.6h8.2L15 3z" />
                        </svg>
                    </div>
                    <h4 class="text-white font-bold text-lg mb-2">Certified Experts</h4>
                    <p class="text-gray-400 text-sm leading-relaxed">Fully licensed, insured technicians trained on the
                        latest systems.</p>
                </div>
                <div class="bg-gray-800 bg-opacity-50 border border-gray-700 rounded-2xl p-6 text-center card-hover">
                    <div
                        class="w-16 h-16 bg-blue-900 bg-opacity-60 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" stroke="#60A5FA"
                            stroke-width="2" stroke-linecap="round">
                            <path d="M15 3C9 3 4 8 4 14c0 8 11 16 11 16s11-8 11-16c0-6-5-11-11-11z" />
                            <circle cx="15" cy="14" r="4" />
                        </svg>
                    </div>
                    <h4 class="text-white font-bold text-lg mb-2">Local &amp; Trusted</h4>
                    <p class="text-gray-400 text-sm leading-relaxed">Proudly serving our community for over 15 years
                        with integrity.</p>
                </div>
                <div class="bg-gray-800 bg-opacity-50 border border-gray-700 rounded-2xl p-6 text-center card-hover">
                    <div
                        class="w-16 h-16 bg-red-900 bg-opacity-40 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" stroke="#F87171"
                            stroke-width="2" stroke-linecap="round">
                            <path d="M5 15l7 7L25 8" />
                        </svg>
                    </div>
                    <h4 class="text-white font-bold text-lg mb-2">100% Satisfaction</h4>
                    <p class="text-gray-400 text-sm leading-relaxed">If you're not happy, we make it right — no
                        questions asked.</p>
                </div>
            </div>

            <div class="mt-14 rounded-3xl overflow-hidden border border-gray-700 grid grid-cols-2 shadow-2xl">
                <div class="bg-gradient-to-br from-blue-900 to-blue-950 p-10 flex items-center gap-6">
                    <div class="text-6xl">❄️</div>
                    <div>
                        <div class="text-blue-200 font-extrabold text-2xl mb-1">Cooling Experts</div>
                        <div class="text-blue-300 text-sm">AC installation, repairs and tune-ups for every system.
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-red-900 to-red-950 p-10 flex items-center gap-6">
                    <div class="text-6xl">🔥</div>
                    <div>
                        <div class="text-red-200 font-extrabold text-2xl mb-1">Heating Experts</div>
                        <div class="text-red-300 text-sm">Furnaces, heat pumps and boilers — warm all winter.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ===================== APPOINTMENT BOOKING ===================== --}}
    <section id="appointment" class="py-24 bg-blue-600 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image:radial-gradient(circle,white 1px,transparent 1px);background-size:40px 40px;">
        </div>

        <div class="relative max-w-5xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-blue-200 font-semibold text-sm uppercase tracking-widest">Appointments</span>
                <h2 class="text-4xl lg:text-5xl font-extrabold text-white mt-2 mb-4">Book Your Appointment</h2>
                <p class="text-blue-100 text-lg max-w-xl mx-auto">Schedule a service visit at your convenience.
                    Confirmation within 30 minutes.</p>
            </div>

            <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-12">
                <form class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-gray-600 text-sm mb-1.5 block font-semibold">First Name</label>
                        <input type="text" placeholder="John"
                            class="w-full bg-gray-50 border border-gray-200 text-gray-800 rounded-xl px-4 py-3 text-sm outline-none transition-all focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>
                    <div>
                        <label class="text-gray-600 text-sm mb-1.5 block font-semibold">Last Name</label>
                        <input type="text" placeholder="Doe"
                            class="w-full bg-gray-50 border border-gray-200 text-gray-800 rounded-xl px-4 py-3 text-sm outline-none transition-all focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>
                    <div>
                        <label class="text-gray-600 text-sm mb-1.5 block font-semibold">Phone Number</label>
                        <input type="tel" placeholder="(555) 000-0000"
                            class="w-full bg-gray-50 border border-gray-200 text-gray-800 rounded-xl px-4 py-3 text-sm outline-none transition-all focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>
                    <div>
                        <label class="text-gray-600 text-sm mb-1.5 block font-semibold">Email Address</label>
                        <input type="email" placeholder="john@example.com"
                            class="w-full bg-gray-50 border border-gray-200 text-gray-800 rounded-xl px-4 py-3 text-sm outline-none transition-all focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>
                    <div>
                        <label class="text-gray-600 text-sm mb-1.5 block font-semibold">Service Type</label>
                        <select
                            class="w-full bg-gray-50 border border-gray-200 text-gray-800 rounded-xl px-4 py-3 text-sm outline-none transition-all focus:border-blue-500">
                            <option value="">Select a service...</option>
                            <option>AC Installation</option>
                            <option>AC Repair</option>
                            <option>Heating Installation</option>
                            <option>Heating Repair</option>
                            <option>Preventive Maintenance</option>
                            <option>Air Quality &amp; Filtration</option>
                            <option>Emergency Service</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-gray-600 text-sm mb-1.5 block font-semibold">Property Type</label>
                        <select
                            class="w-full bg-gray-50 border border-gray-200 text-gray-800 rounded-xl px-4 py-3 text-sm outline-none transition-all focus:border-blue-500">
                            <option value="">Select property type...</option>
                            <option>Residential – House</option>
                            <option>Residential – Apartment</option>
                            <option>Commercial – Office</option>
                            <option>Commercial – Retail</option>
                            <option>Industrial</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-gray-600 text-sm mb-1.5 block font-semibold">Preferred Date</label>
                        <input type="date"
                            class="w-full bg-gray-50 border border-gray-200 text-gray-800 rounded-xl px-4 py-3 text-sm outline-none transition-all focus:border-blue-500">
                    </div>
                    <div>
                        <label class="text-gray-600 text-sm mb-1.5 block font-semibold">Preferred Time</label>
                        <select
                            class="w-full bg-gray-50 border border-gray-200 text-gray-800 rounded-xl px-4 py-3 text-sm outline-none transition-all focus:border-blue-500">
                            <option value="">Select a time slot...</option>
                            <option>8:00 AM – 10:00 AM</option>
                            <option>10:00 AM – 12:00 PM</option>
                            <option>1:00 PM – 3:00 PM</option>
                            <option>3:00 PM – 5:00 PM</option>
                            <option>5:00 PM – 7:00 PM</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="text-gray-600 text-sm mb-1.5 block font-semibold">Address &amp; Notes</label>
                        <textarea rows="3" placeholder="Your address and any details about the issue..."
                            class="w-full bg-gray-50 border border-gray-200 text-gray-800 rounded-xl px-4 py-3 text-sm outline-none transition-all focus:border-blue-500 focus:ring-2 focus:ring-blue-100 resize-none">
                    </textarea>
                    </div>
                    <div class="md:col-span-2">
                        <button type="submit"
                            class="w-full bg-red-600 hover:bg-red-500 text-white py-4 rounded-xl font-bold text-base transition-all shadow-lg shadow-red-200/50">
                            Confirm Appointment →
                        </button>
                        <p class="text-gray-400 text-xs text-center mt-3">We'll email a confirmation and call you
                            within 30 minutes to verify.</p>
                    </div>
                </form>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 60" fill="none" preserveAspectRatio="none">
                <path d="M0 60 L0 40 Q360 0 720 30 Q1080 60 1440 20 L1440 60 Z" fill="#f9fafb" />
            </svg>
        </div>
    </section>

    {{-- ===================== TESTIMONIALS ===================== --}}
    <section id="testimonials" class="py-24 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-widest">Testimonials</span>
                <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-900 mt-2 mb-4">What Our Clients Say</h2>
                <p class="text-gray-500 text-lg">Real stories from real customers in our community.</p>
                <div class="flex items-center justify-center gap-2 mt-4">
                    <span class="text-yellow-400 text-2xl">★★★★★</span>
                    <span class="text-gray-700 font-bold text-xl">4.9</span>
                    <span class="text-gray-400">/ 5 · Based on 340+ reviews</span>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-10">
                <div class="card-hover bg-white rounded-3xl p-7 border border-gray-100 shadow-sm">
                    <div class="text-yellow-400 text-xl mb-4">★★★★★</div>
                    <p class="text-gray-600 italic leading-relaxed mb-6">"Lalos' team came out the same day my AC broke
                        during a heat wave. They had it running in under 2 hours. Absolutely incredible service!"</p>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-11 h-11 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            M</div>
                        <div>
                            <div class="font-semibold text-gray-800">Maria R.</div>
                            <div class="text-gray-400 text-sm">Homeowner · June 2024</div>
                        </div>
                    </div>
                </div>
                <div class="card-hover bg-gray-900 rounded-3xl p-7 border border-gray-800 shadow-xl">
                    <div class="text-yellow-400 text-xl mb-4">★★★★★</div>
                    <p class="text-gray-300 italic leading-relaxed mb-6">"Professional, punctual, and fairly priced.
                        They installed a new system for my whole office — the difference is night and day!"</p>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-11 h-11 bg-red-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            J</div>
                        <div>
                            <div class="font-semibold text-white">James T.</div>
                            <div class="text-gray-400 text-sm">Business Owner · Aug 2024</div>
                        </div>
                    </div>
                </div>
                <div class="card-hover bg-white rounded-3xl p-7 border border-gray-100 shadow-sm">
                    <div class="text-yellow-400 text-xl mb-4">★★★★★</div>
                    <p class="text-gray-600 italic leading-relaxed mb-6">"Been using Lalos for maintenance for 3 years.
                        Never had a single breakdown. They know their stuff and always treat you with respect."</p>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-11 h-11 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            S</div>
                        <div>
                            <div class="font-semibold text-gray-800">Sandra K.</div>
                            <div class="text-gray-400 text-sm">Long-term Client · Jan 2025</div>
                        </div>
                    </div>
                </div>
                <div class="card-hover bg-white rounded-3xl p-7 border border-gray-100 shadow-sm">
                    <div class="text-yellow-400 text-xl mb-4">★★★★★</div>
                    <p class="text-gray-600 italic leading-relaxed mb-6">"Called at 11 PM for an emergency and they
                        showed up within 45 minutes. Quick, honest, and effective. Couldn't ask for more."</p>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-11 h-11 bg-red-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            C</div>
                        <div>
                            <div class="font-semibold text-gray-800">Carlos M.</div>
                            <div class="text-gray-400 text-sm">Homeowner · Dec 2024</div>
                        </div>
                    </div>
                </div>
                <div class="card-hover bg-white rounded-3xl p-7 border border-gray-100 shadow-sm">
                    <div class="text-yellow-400 text-xl mb-4">★★★★☆</div>
                    <p class="text-gray-600 italic leading-relaxed mb-6">"Very knowledgeable technician. He explained
                        everything clearly and helped me choose the right system for my budget."</p>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-11 h-11 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            L</div>
                        <div>
                            <div class="font-semibold text-gray-800">Linda F.</div>
                            <div class="text-gray-400 text-sm">Apartment Owner · Feb 2025</div>
                        </div>
                    </div>
                </div>
                <div class="card-hover bg-white rounded-3xl p-7 border border-gray-100 shadow-sm">
                    <div class="text-yellow-400 text-xl mb-4">★★★★★</div>
                    <p class="text-gray-600 italic leading-relaxed mb-6">"The maintenance plan is worth every penny. My
                        energy bill dropped 20% after they tuned up the system. Amazing team!"</p>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-11 h-11 bg-gray-700 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            R</div>
                        <div>
                            <div class="font-semibold text-gray-800">Robert W.</div>
                            <div class="text-gray-400 text-sm">Homeowner · Mar 2025</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-100 rounded-3xl p-8 text-center shadow-sm">
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Had a great experience?</h3>
                <p class="text-gray-500 mb-6">Your review helps us grow and helps others find the comfort they deserve.
                </p>
                <a href="#contact"
                    class="inline-block bg-blue-600 hover:bg-blue-500 text-white px-8 py-3 rounded-xl font-semibold transition-all">
                    Leave a Review
                </a>
            </div>
        </div>
    </section>

    {{-- ===================== LOCATION / MAP ===================== --}}
    <section id="location" class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-red-500 font-semibold text-sm uppercase tracking-widest">Where We Are</span>
                <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-900 mt-2 mb-4">Find Us</h2>
                <p class="text-gray-500 text-lg max-w-xl mx-auto">Serving our local community and surrounding areas.
                    Come visit us or we'll come to you.</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8 items-start">
                <div class="space-y-6">
                    <div class="bg-gray-50 rounded-2xl border border-gray-100 p-6">
                        <h4 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="#2563EB"
                                stroke-width="2" stroke-linecap="round">
                                <path d="M9 1C6.2 1 4 3.2 4 6c0 4.5 5 10 5 10s5-5.5 5-10c0-2.8-2.2-5-5-5z" />
                                <circle cx="9" cy="6" r="2" />
                            </svg>
                            Our Address
                        </h4>
                        <p class="text-gray-600 leading-relaxed">Downtown,<br>Suite 100<br>Omaha, NE 68101</p>
                        <a href="https://www.openstreetmap.org" target="_blank"
                            class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-500 text-sm font-medium mt-3 transition-colors">
                            Get Directions
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M9 3V9H3M2 10L9 3" stroke-linecap="square" />
                            </svg>
                        </a>
                    </div>

                    <div class="bg-gray-50 rounded-2xl border border-gray-100 p-6">
                        <h4 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="#2563EB"
                                stroke-width="2" stroke-linecap="round">
                                <circle cx="9" cy="9" r="8" />
                                <path d="M9 4v5l3 2" />
                            </svg>
                            Business Hours
                        </h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between text-gray-600"><span>Mon – Fri</span><span
                                    class="font-medium text-gray-800">7:00 AM – 8:00 PM</span></div>
                            <div class="flex justify-between text-gray-600"><span>Saturday</span><span
                                    class="font-medium text-gray-800">8:00 AM – 6:00 PM</span></div>
                            <div class="flex justify-between text-gray-600"><span>Sunday</span><span
                                    class="font-medium text-gray-800">9:00 AM – 4:00 PM</span></div>
                            <div class="flex justify-between text-gray-600 pt-2 border-t border-gray-200 mt-2">
                                <span>Emergency</span><span class="text-red-500 font-semibold">24/7</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-red-50 rounded-2xl border border-red-100 p-6">
                        <h4 class="font-bold text-gray-900 mb-2">Call Us</h4>
                        <p class="text-red-700 font-bold text-xl">(402) 906-3334</p>
                        <p class="text-red-500 text-sm mt-1">Emergency line — always answered</p>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="rounded-3xl overflow-hidden border border-gray-200 shadow-lg" style="height:440px;">
                        <iframe
                            src="https://www.openstreetmap.org/export/embed.html?bbox=-80.2500%2C25.7600%2C-80.1800%2C25.8000&layer=mapnik&marker=25.7800%2C-80.2150"
                            width="100%" height="100%" frameborder="0" scrolling="no" style="border:0;"
                            title="Lalos Heating and Cooling location" loading="lazy">
                        </iframe>
                    </div>
                    <p class="text-gray-400 text-xs text-center mt-2">
                        Map data &copy; <a href="https://www.openstreetmap.org/copyright"
                            class="underline hover:text-gray-600" target="_blank">OpenStreetMap</a> contributors
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== CONTACT / MESSAGES ===================== --}}
    <section id="contact" class="py-24 bg-gray-900 relative overflow-hidden">
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-blue-950 rounded-full opacity-20 translate-x-1/3 -translate-y-1/3">
        </div>
        <div
            class="absolute bottom-0 left-0 w-80 h-80 bg-red-950 rounded-full opacity-20 -translate-x-1/3 translate-y-1/3">
        </div>

        <div class="relative max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-red-400 font-semibold text-sm uppercase tracking-widest">Contact Us</span>
                <h2 class="text-4xl lg:text-5xl font-extrabold text-white mt-2 mb-4">Send Us a Message</h2>
                <p class="text-gray-400 text-lg max-w-xl mx-auto">Have a question? Need a quote? Drop us a message and
                    we'll get back to you fast.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-16 items-start">
                <div>
                    <div class="space-y-5 mb-10">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-blue-900 bg-opacity-60 border border-blue-800 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    stroke="#60A5FA" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.67A2 2 0 012 1h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 15z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-white font-semibold text-lg">(402) 906-3334</div>
                                <div class="text-gray-400 text-sm">Call us anytime — 24/7 emergency line</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-red-950 border border-red-900 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    stroke="#F87171" stroke-width="2" stroke-linecap="round">
                                    <rect x="2" y="4" width="20" height="16" rx="2" />
                                    <path d="M22 7L12 13 2 7" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-white font-semibold text-lg">contact@lalosheatcooling.com</div>
                                <div class="text-gray-400 text-sm">We reply within 1 hour during business hours</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-blue-900 bg-opacity-60 border border-blue-800 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    stroke="#60A5FA" stroke-width="2" stroke-linecap="round">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                                    <circle cx="12" cy="9" r="2.5" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-white font-semibold text-lg">Miami, FL &amp; Surrounding Areas</div>
                                <div class="text-gray-400 text-sm">Fast dispatch — technicians always nearby</div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-800 border border-gray-700 rounded-2xl p-6">
                        <h4 class="text-white font-bold mb-4">Trusted by Our Community</h4>
                        <div class="grid grid-cols-3 gap-4 text-center">
                            <div>
                                <div class="text-2xl font-extrabold text-white">340+</div>
                                <div class="text-gray-400 text-xs mt-1">5-Star Reviews</div>
                            </div>
                            <div class="border-x border-gray-700">
                                <div class="text-2xl font-extrabold text-white">15+</div>
                                <div class="text-gray-400 text-xs mt-1">Years Serving</div>
                            </div>
                            <div>
                                <div class="text-2xl font-extrabold text-white">2K+</div>
                                <div class="text-gray-400 text-xs mt-1">Happy Clients</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-800 border border-gray-700 rounded-3xl p-8 shadow-2xl">
                    <h3 class="text-2xl font-bold text-white mb-7">Send a Message</h3>
                    <form class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-gray-400 text-sm mb-1.5 block font-medium">First Name</label>
                                <input type="text" placeholder="John"
                                    class="w-full bg-gray-700 border border-gray-600 text-white rounded-xl px-4 py-3 text-sm placeholder-gray-500 transition-all">
                            </div>
                            <div>
                                <label class="text-gray-400 text-sm mb-1.5 block font-medium">Last Name</label>
                                <input type="text" placeholder="Doe"
                                    class="w-full bg-gray-700 border border-gray-600 text-white rounded-xl px-4 py-3 text-sm placeholder-gray-500 transition-all">
                            </div>
                        </div>
                        <div>
                            <label class="text-gray-400 text-sm mb-1.5 block font-medium">Phone Number</label>
                            <input type="tel" placeholder="(555) 000-0000"
                                class="w-full bg-gray-700 border border-gray-600 text-white rounded-xl px-4 py-3 text-sm placeholder-gray-500 transition-all">
                        </div>
                        <div>
                            <label class="text-gray-400 text-sm mb-1.5 block font-medium">Email Address</label>
                            <input type="email" placeholder="john@example.com"
                                class="w-full bg-gray-700 border border-gray-600 text-white rounded-xl px-4 py-3 text-sm placeholder-gray-500 transition-all">
                        </div>
                        <div>
                            <label class="text-gray-400 text-sm mb-1.5 block font-medium">Subject</label>
                            <select
                                class="w-full bg-gray-700 border border-gray-600 text-white rounded-xl px-4 py-3 text-sm transition-all">
                                <option value="">What's this about?</option>
                                <option>Request a Quote</option>
                                <option>Service Inquiry</option>
                                <option>Billing Question</option>
                                <option>Warranty Claim</option>
                                <option>General Question</option>
                                <option>Emergency</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-gray-400 text-sm mb-1.5 block font-medium">Your Message</label>
                            <textarea rows="4" placeholder="Tell us how we can help you..."
                                class="w-full bg-gray-700 border border-gray-600 text-white rounded-xl px-4 py-3 text-sm placeholder-gray-500 transition-all resize-none">
                        </textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-red-600 hover:bg-red-500 text-white py-3.5 rounded-xl font-bold text-base transition-all shadow-lg shadow-red-900/30 mt-2">
                            Send Message →
                        </button>
                        <p class="text-gray-500 text-xs text-center">No spam. We only use your info to respond to your
                            inquiry.</p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== FOOTER ===================== --}}
    <footer class="bg-gray-950 border-t border-gray-800 py-14">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-10 mb-12">
                <div class="md:col-span-1">
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-900/40">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white"
                                stroke-width="2.2" stroke-linecap="round">
                                <rect x="2" y="7" width="20" height="10" rx="2" />
                                <path d="M7 17v3M12 17v3M17 17v3" />
                                <path d="M6 11h8M16 11h2" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-white font-bold">Lalos</span>
                            <span class="text-blue-400 font-bold"> H&amp;C</span>
                        </div>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed">Your comfort is our mission. Professional heating
                        and cooling since 2009.</p>
                </div>

                <div>
                    <h5 class="text-white font-semibold mb-4 text-sm uppercase tracking-wide">Services</h5>
                    <ul class="space-y-2 text-gray-500 text-sm">
                        <li><a href="#services" class="hover:text-white transition-colors">AC Installation</a></li>
                        <li><a href="#services" class="hover:text-white transition-colors">Repairs &amp;
                                Diagnostics</a></li>
                        <li><a href="#services" class="hover:text-white transition-colors">Preventive Maintenance</a>
                        </li>
                        <li><a href="#services" class="hover:text-white transition-colors">Heating Systems</a></li>
                        <li><a href="#services" class="hover:text-white transition-colors">Commercial HVAC</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="text-white font-semibold mb-4 text-sm uppercase tracking-wide">Company</h5>
                    <ul class="space-y-2 text-gray-500 text-sm">
                        <li><a href="#why-us" class="hover:text-white transition-colors">Why Choose Us</a></li>
                        <li><a href="#testimonials" class="hover:text-white transition-colors">Testimonials</a></li>
                        <li><a href="#location" class="hover:text-white transition-colors">Our Location</a></li>
                        <li><a href="#appointment" class="hover:text-white transition-colors">Book Appointment</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h5 class="text-white font-semibold mb-4 text-sm uppercase tracking-wide">Get In Touch</h5>
                    <div class="space-y-3 text-sm">
                        <div>
                            <span class="text-gray-500 block text-xs mb-0.5">Phone</span>
                            <span class="text-white">(555) 123-4567</span>
                        </div>
                        <div>
                            <span class="text-gray-500 block text-xs mb-0.5">Email</span>
                            <span class="text-white">contact@lalosheatcooling.com</span>
                        </div>
                        <div>
                            <span class="text-gray-500 block text-xs mb-0.5">Address</span>
                            <span class="text-white">Downtown, Omaha, NE 68101</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-6 flex flex-col md:flex-row items-center justify-between gap-3">
                <span class="text-gray-600 text-sm">&copy; {{ date('Y') }} Lalos Heating and Cooling. All rights
                    reserved.</span>
                <div class="flex items-center gap-2 bg-red-950 border border-red-900 rounded-full px-4 py-2">
                    <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                    <span class="text-red-300 text-sm font-medium">24/7 Emergency: (402) 906-3334</span>
                </div>
                <span class="text-gray-600 text-sm">Licensed &bull; Insured &bull; Trusted</span>
            </div>
        </div>
    </footer>

</body>

</html>
