<html class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <!-- StyleSheet -->
    <link rel="stylesheet" href="portfolio-jila/src/include/style.css">

    <!-- FavIcon -->
    <link href="portfolio-jila/src/include/favicons_io/favicon.ico" rel="icon">

    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <title>Wellcome to Portfolio Jila | Let's Your Portfolio</title>
</head>
<style>
    /* animation section  */
    @keyframes typing {
        from {
            width: 0;
        }

        to {
            width: 100%;
        }
    }

    .typing-animation {
        overflow: hidden;
        display: inline-block;
        white-space: nowrap;
        margin-right: 5px;
        animation: typing 3s steps(40) infinite;
    }

    /* typing animation section ending  */


    .hover-underline-animation {
        display: inline-block;
        position: relative;
    }

    .hover-underline-animation::after {
        content: '';
        position: absolute;
        width: 100%;
        transform: scaleX(0);
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: #0087ca;
        transform-origin: bottom right;
        transition: transform 0.35s ease-out;
    }

    .hover-underline-animation:hover::after {
        transform: scaleX(1);
        transform-origin: bottom left;
    }

    .blur {
        position: absolute;
        box-shadow: 0 0 1000px 50px #1d4ed8;
        z-index: -100;
    }
</style>

<body class="bg-slate-950 scroll-smooth ">
    <div id="particles" class="absolute w-full h-full top-0 left-0 z-[-10] opacity-50"></div>

    <!-- NavStart -->
    <nav class="max-w-screen-xl mx-auto px-4 pb-8 flex items-center justify-between space-x-8">
        <div id="links" class="w-24 h-24 rounded-full">
            <a href="#" class="flex items-center">
                <img class="w-50 h-50  py-4 object-cover rounded-full" src="portfolio-jila/src/include/img/portfoliojila.png" alt="Logo">
            </a>
        </div>
        <!-- NavLinks -->
        <ul class="text-cyan-400 font-semibold space-x-6 hidden md:flex z-20 cursor-pointer">
            <li class="hover-underline-animation"><a href="#">Wellcome</a></li>
            <li id="Project" class="hover-underline-animation"><a href="#how-to-use">How To Use</a></li>
            <li id="Project" class="hover-underline-animation"><a href="#responsive">Responsive</a></li>
            <li id="Service" class="hover-underline-animation"><a href="#templates">Templates</a></li>
        </ul>

        <button class="bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-md px-3 py-2 text-cyan-500 font-serif  hover:text-cyan-400 shadow-md cursor-pointer"><a href="portfolio-jila/create-your-portfolio/">Create Your Profile</a></button>

    </nav>
    <!-- Nav End -->




    <div class="content flex px-4 mb-4" style="display: flex; flex-direction: column; align-items: center;">
        <span class="blur"></span>
        <span class="blur"></span>
        <h1 class="mb-8 text-slate-50 text-2xl md:text-6xl font-medium" style="text-align: center;">Wellcome Back To <span class="text-cyan-400"> Portfolio Jila
            </span><br><span class="typing-animation">Lets Design Your Portfolio</span></h1>
        <p class="mt-5 text-gray-400" style="text-align: center;">
            <br> <span class="text-cyan-400"> Transform your aspirations into stunning reality with our hassle-free portfolio website builder.</span>
        </p>
        <button class="bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-md px-3 py-2 text-cyan-500 font-serif  hover:text-cyan-400 shadow-md mt-10 cursor-pointer"><a href="portfolio-jila/create-your-portfolio/">Create Your Profile</a></button>

    </div>

<section id="responsive">
    <div class="bg-slate-950 py-12 sm:py-16 lg:py-20 xl:py-24">
        <div class="container mx-auto">
            <div class="flex flex-col m-4 sm:flex-row items-center justify-between">
                <div class="sm:w-1/2 mb-8 sm:mb-0">
                    <h2 class="text-white text-xl sm:text-2xl lg:text-3xl font-semibold mb-4">Beautiful Designs</h2>
                    <p class="text-gray-300 text-base sm:text-lg lg:text-xl mb-6">Customize your design to suit your own preferences to create an online portfolio which is truly unique. Preview changes instantly without affecting your live site and without writing any code.</p>

                    <h2 class="text-white text-xl sm:text-2xl lg:text-3xl font-semibold mb-4">Accessible Everywhere</h2>
                    <p class="text-gray-300 text-base sm:text-lg lg:text-xl mb-6">All our portfolio website designs are responsive and automatically adapt to mobile devices. View your portfolio from a Desktop Computer, Tablet, or Smartphone, it doesn't matter!</p>
                </div>
                <div class="sm:w-1/2">
                    <img src="template/responsive.png" alt="responsive online portfolio websites for any device" title="Your online portfolio no matter what device you're using" class="mx-auto max-w-full h-auto">
                </div>
            </div>
        </div>
    </div>
    </section>

    <section id="how-to-use" class="bg-slate-950 py-12 sm:py-16 lg:py-20 xl:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-sm font-bold uppercase tracking-widest text-white">How It Works</p>
                <h2 class="mt-6 text-3xl font-bold tracking-tight text-white sm:text-4xl lg:text-5xl">Launch your Portfolio
                    in
                    4 easy steps
                </h2>
                <p class="mx-auto mt-4 max-w-2xl text-lg font-normal text-white lg:text-xl lg:leading-8">
                    Create your own Portfolio Website with us and launch it with just 4 easy steps
                </p>
            </div>
            <ul class="mx-auto mt-12 grid max-w-md grid-cols-1 gap-10 sm:mt-16 lg:mt-20 lg:max-w-5xl lg:grid-cols-4">
                <li class="flex-start group relative flex lg:flex-col">
                    <span class="absolute left-[18px] top-14 h-[calc(100%_-_32px)] w-px bg-gray-300 lg:right-0 lg:left-auto lg:top-[18px] lg:h-px lg:w-[calc(100%_-_72px)]" aria-hidden="true"></span>
                    
                    <div class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-gray-300 bg-gray-50 transition-all duration-200 group-hover:border-gray-900 group-hover:bg-gray-900">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 group-hover:text-white">
                            <path d="M22 12C22 17.5228 17.5228 22 12 22M22 12C22 6.47715 17.5228 2 12 2M22 12C22 9.79086 17.5228 8 12 8C6.47715 8 2 9.79086 2 12M22 12C22 14.2091 17.5228 16 12 16C6.47715 16 2 14.2091 2 12M12 22C6.47715 22 2 17.5228 2 12M12 22C14.2091 22 16 17.5228 16 12C16 6.47715 14.2091 2 12 2M12 22C9.79086 22 8 17.5228 8 12C8 6.47715 9.79086 2 12 2M2 12C2 6.47715 6.47715 2 12 2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <div class="ml-6 lg:ml-0 lg:mt-10">
                        <h3 class="text-xl font-bold text-white before:mb-2 before:block before:font-mono before:text-sm before:text-gray-500">Create Your Profile on Portfolio Jila</h3>
                        <h4 class="mt-2 text-base text-white">Navigate to the "Create Your Profile" section on the Portfolio Jila website.</h4>
                    </div>
                </li>
                <!-- Second Step -->
                <li class="flex-start group relative flex lg:flex-col">
                    <span class="absolute left-[18px] top-14 h-[calc(100%_-_32px)] w-px bg-gray-300 lg:right-0 lg:left-auto lg:top-[18px] lg:h-px lg:w-[calc(100%_-_72px)]" aria-hidden="true"></span>
                    <div class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-gray-300 bg-gray-50 transition-all duration-200 group-hover:border-gray-900 group-hover:bg-gray-900">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 group-hover:text-white">
                            <path d="M2 3L2 21M22 3V21M11.8 20H12.2C13.8802 20 14.7202 20 15.362 19.673C15.9265 19.3854 16.3854 18.9265 16.673 18.362C17 17.7202 17 16.8802 17 15.2V8.8C17 7.11984 17 6.27976 16.673 5.63803C16.3854 5.07354 15.9265 4.6146 15.362 4.32698C14.7202 4 13.8802 4 12.2 4H11.8C10.1198 4 9.27976 4 8.63803 4.32698C8.07354 4.6146 7.6146 5.07354 7.32698 5.63803C7 6.27976 7 7.11984 7 8.8V15.2C7 16.8802 7 17.7202 7.32698 18.362C7.6146 18.9265 8.07354 19.3854 8.63803 19.673C9.27976 20 10.1198 20 11.8 20Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>

                    <div class="ml-6 lg:ml-0 lg:mt-10">
                        <h3 class="text-xl font-bold text-white before:mb-2 before:block before:font-mono before:text-sm before:text-gray-500">Fill Personal Information</h3>
                        <h4 class="mt-2 text-base text-white">Enter your name and provide information about yourself.</h4>
                    </div>
                </li>
                <!-- Third Step -->
                <li class="flex-start group relative flex lg:flex-col">
                    <span class="absolute left-[18px] top-14 h-[calc(100%_-_32px)] w-px bg-gray-300 lg:right-0 lg:left-auto lg:top-[18px] lg:h-px lg:w-[calc(100%_-_72px)]" aria-hidden="true"></span>
                    <div class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-gray-300 bg-gray-50 transition-all duration-200 group-hover:border-gray-900 group-hover:bg-gray-900">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 group-hover:text-white">
                            <path d="M21 12C21 13.6569 16.9706 15 12 15C7.02944 15 3 13.6569 3 12M21 5C21 6.65685 16.9706 8 12 8C7.02944 8 3 6.65685 3 5M21 5C21 3.34315 16.9706 2 12 2C7.02944 2 3 3.34315 3 5M21 5V19C21 20.6569 16.9706 22 12 22C7.02944 22 3 20.6569 3 19V5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <div class="ml-6 lg:ml-0 lg:mt-10">
                        <h3 class="text-xl font-bold text-white before:mb-2 before:block before:font-mono before:text-sm before:text-gray-500">Upload CV</h3>
                        <h4 class="mt-2 text-base text-white">Upload your CV or resume, then proceed to the next step.</h4>
                    </div>
                </li>
                <!-- Fourth Step -->
                <li class="flex-start group relative flex lg:flex-col">
                   
                    <div class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-gray-300 bg-gray-50 transition-all duration-200 group-hover:border-gray-900 group-hover:bg-gray-900">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 group-hover:text-white">
                            <path d="M5.50049 10.5L2.00049 7.9999L3.07849 6.92193C3.964 6.03644 4.40676 5.5937 4.9307 5.31387C5.39454 5.06614 5.90267 4.91229 6.42603 4.86114C7.01719 4.80336 7.63117 4.92617 8.85913 5.17177L10.5 5.49997M18.4999 13.5L18.8284 15.1408C19.0742 16.3689 19.1971 16.983 19.1394 17.5743C19.0883 18.0977 18.9344 18.6059 18.6867 19.0699C18.4068 19.5939 17.964 20.0367 17.0783 20.9224L16.0007 22L13.5007 18.5M7 16.9998L8.99985 15M17.0024 8.99951C17.0024 10.1041 16.107 10.9995 15.0024 10.9995C13.8979 10.9995 13.0024 10.1041 13.0024 8.99951C13.0024 7.89494 13.8979 6.99951 15.0024 6.99951C16.107 6.99951 17.0024 7.89494 17.0024 8.99951ZM17.1991 2H16.6503C15.6718 2 15.1826 2 14.7223 2.11053C14.3141 2.20853 13.9239 2.37016 13.566 2.5895C13.1623 2.83689 12.8164 3.18282 12.1246 3.87469L6.99969 9C5.90927 10.0905 5.36406 10.6358 5.07261 11.2239C4.5181 12.343 4.51812 13.6569 5.07268 14.776C5.36415 15.3642 5.90938 15.9094 6.99984 16.9998V16.9998C8.09038 18.0904 8.63565 18.6357 9.22386 18.9271C10.343 19.4817 11.6569 19.4817 12.7761 18.9271C13.3643 18.6356 13.9095 18.0903 15 16.9997L20.1248 11.8745C20.8165 11.1827 21.1624 10.8368 21.4098 10.4331C21.6291 10.0753 21.7907 9.6851 21.8886 9.27697C21.9991 8.81664 21.9991 8.32749 21.9991 7.34918V6.8C21.9991 5.11984 21.9991 4.27976 21.6722 3.63803C21.3845 3.07354 20.9256 2.6146 20.3611 2.32698C19.7194 2 18.8793 2 17.1991 2Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <div class="ml-6 lg:ml-0 lg:mt-10">
                        <h3 class="text-xl font-bold text-white before:mb-2 before:block before:font-mono before:text-sm before:text-gray-500">Publish & Share</h3>
                        <h4 class="mt-2 text-base text-white">Publish your blog and share it with the world.</h4>
                    </div>
                </li>
            </ul>


            
        </div>
    </section>

    <section id="templates" class="mb-24">
        <h2 class="text-4xl font-extrabold text-gray-800 text-center mt-10 mb-8">Templates</h2>
        <div class="flex flex-col m-2 mt-16 md:flex-row justify-evenly space-y-4 md:space-y-0 md:space-x-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- 1st Card Start -->
                <div class="relative flex flex-col justify-between rounded-xl bg-slate-900 bg-clip-border text-slate-50 shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none mt-8">
                    <div class="relative mx-4 -mt-6 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-slate-900 to-slate-950 md:h-80">
                        <img src="template/2.jpg" alt="Project Image" class="rounded-md" class="object-contain w-full h-full">
                    </div>
                    <div class="p-6">
                        <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                            Creative Portfolio Showcase
                        </h5>
                        <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                            This template showcases your projects in a creative and visually appealing way. Display your work prominently and attractively to potential clients or employers.
                        </p>
                    </div>
                    <div class="p-6 pt-0">
                        <button data-ripple-light="true" type="button" class="select-none rounded-lg bg-slate-800 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                            <a href="portfolio-jila/src/">View</a>
                        </button>
                    </div>
                </div>
                <!-- 1st Card End -->
                <!-- 2st Card Start -->
                <div class="relative flex flex-col justify-between rounded-xl bg-slate-900 bg-clip-border text-slate-50 shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none mt-8">
                    <div class="relative mx-4 -mt-6 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-slate-900 to-slate-950 md:h-80">
                        <img src="template/1.jpg" alt="Project Image" class="rounded-md" class="object-contain w-full h-full">
                    </div>
                    <div class="p-6">
                        <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                            Minimalist Portfolio
                        </h5>
                        <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                            This template emphasizes simplicity and elegance, providing a clean and minimalist canvas to showcase your projects. Coming soon!
                        </p>
                    </div>
                    <div class="p-6 pt-0">
                        <button data-ripple-light="true" type="button" class="select-none rounded-lg bg-slate-800 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                            <a href="#">Soon</a>
                        </button>
                    </div>
                </div>
                <!-- 2st Card End -->
                <!-- 3st Card Start -->
                <div class="relative flex flex-col justify-between rounded-xl bg-slate-900 bg-clip-border text-slate-50 shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none mt-8">
                    <div class="relative mx-4 -mt-6 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-slate-900 to-slate-950 md:h-80">
                        <img src="template/1.jpg" alt="Project Image" class="rounded-md" class="object-contain w-full h-full">
                    </div>
                    <div class="p-6">
                        <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                            Modern Grid Portfolio
                        </h5>
                        <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                            With this template, your projects are presented in a sleek and modern grid layout, allowing for easy navigation and exploration. Stay tuned for its release!
                        </p>
                    </div>
                    <div class="p-6 pt-0">
                        <button data-ripple-light="true" type="button" class="select-none rounded-lg bg-slate-800 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                            <a href="#">Soon</a>
                        </button>
                    </div>
                </div>
                <!-- 1st Card End -->
            </div>
        </div>
    </section>

   





    <footer class="bg-slate-950 text-white mt-6">
        <div class="flex flex-col gap-5 md:flex-row justify-between m-5 space-y-4 sm:space-y-0 sm:space-x-6">
            <div class="w-full sm:w-1/2">
                <div class="logo">
                    <img src="portfolio-jila/src/include/img/portfoliojila.png" alt="Logo" class="w-16 h-16">
                </div>
                <p class="text-sm mt-4">
                    Transform your aspirations into stunning reality with our hassle-free portfolio website builder. Simply fill a form, and behold your personalized 3D portfolio website — no coding required. Start showcasing your brilliance today!
                </p>
                <button class="bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-md px-3 py-2 text-cyan-500 font-serif  hover:text-cyan-400 shadow-md cursor-pointer my-6"><a href="../create-your-portfolio/">Create Your Profile</a></button>
                <div class="info-text mt-2">
                    <a href="#" id="link3" class="scroll"><i class='bx bxs-down-arrow text-indigo-400 text-xl'></i></a>
                </div>
                <div class="socials mt-2">
                    <a href="#" class="mr-4"><i class="ri-youtube-line text-2xl"></i></a>
                    <a href="#" class="mr-4"><i class="ri-instagram-line text-2xl"></i></a>
                    <a href="#"><i class="ri-twitter-line text-2xl"></i></a>
                </div>
            </div>
            <div class="links">
                <h4 class="text-lg font-semibold mb-2"></h4>
                <!-- <div class="links flex flex-col gap-2 m-2">
            <a href="#" class="text-sm hover-underline-animation">Business</a>
            <a href="#" class="text-sm hover-underline-animation">Partnership</a>
            <a href="#" class="text-sm hover-underline-animation">Network</a>
            </div> -->






            </div>
            <div class="links">
                <h4 class="text-lg font-semibold mb-2">About Us</h4>
                <div class="links flex flex-col gap-2 m-2">
                    <a href="#" class="text-sm hover-underline-animation">Blogs</a>
                    <a href="#" class="text-sm hover-underline-animation">Channels</a>
                    <a href="#" class="text-sm hover-underline-animation">Sponsors</a>
                </div>
            </div>
            <div class="links">

                <h4 class="text-lg font-semibold mb-2">Contact</h4>
                <div class="links flex flex-col gap-2 m-2">
                    <a href="#" class="text-sm hover-underline-animation">Contact Us</a>
                    <a href="#" class="text-sm hover-underline-animation">Privacy Policy</a>
                    <a href="#" class="text-sm hover-underline-animation">Terms & Conditions</a>
                </div>
            </div>
        </div>

    </footer>

    <div class="bg-slate-950 text-white py-3 text-sm text-center m-8">
        Copyright © 2023 Protfolio Jila. All Rights Reserved.
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
    <script src="include/script.js"></script>
</body>

</html>