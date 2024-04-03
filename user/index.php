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
            <li id="Project" class="hover-underline-animation"><a href="#projects">How To Use</a></li>
            <li id="Service" class="hover-underline-animation"><a href="#service">Pricing</a></li>
            <li id="Contact" class="hover-underline-animation"><a href="#contact-us">Say Hii!</a></li>
        </ul>

        <button class="bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-md px-3 py-2 text-cyan-500 font-serif  hover:text-cyan-400 shadow-md cursor-pointer"><a href="../create-your-portfolio/">Support</a></button>

    </nav>
    <!-- Nav End -->




    <div class="content flex px-4 mb-16" style="display: flex; flex-direction: column; align-items: center;">
        <span class="blur"></span>
        <span class="blur"></span>
        <h1 class="mb-8 text-slate-50 text-2xl md:text-6xl font-medium" style="text-align: center;">Wellcome Back To <span class="text-cyan-400"> Portfolio Jila
            </span><br><span class="typing-animation">Lets Design Your Portfolio</span></h1>
        <p class="mt-5 text-gray-400" style="text-align: center;">
            <br> <span class="text-cyan-400">Transform your aspirations into stunning reality with our hassle-free portfolio website </span>
        </p>
        <button class="bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-md px-3 py-2 text-cyan-500 font-serif  hover:text-cyan-400 shadow-md mt-10 cursor-pointer">Create Your Profile</button>
    </div>



    <section id="projects">
    <h2 class="text-4xl font-extrabold text-gray-800 text-center mt-10 mb-8">Projects</h2>
    <div class="flex flex-col m-2 mt-16 md:flex-row justify-evenly space-y-4 md:space-y-0 md:space-x-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- 1st Card Start -->
            <div class="relative flex flex-col rounded-xl bg-slate-900 bg-clip-border text-slate-50 shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                <div class="relative mx-4 -mt-6 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600" style="height: 24rem;">
                    <img src="template/2.jpg" alt="Project Image" class="object-contain w-full h-full">
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
                        <a href="portfolio-jila/create-your-portfolio/">Let's Start</a>
                    </button>
                </div>
            </div>
            <!-- 1st Card End -->
            <!-- 1st Card Start -->
            <div class="relative flex flex-col rounded-xl bg-slate-900 bg-clip-border text-slate-50 shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                <div class="relative mx-4 -mt-6 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600" style="height: 24rem;">
                    <img src="template/1.jpg" alt="Project Image" class="object-contain w-full h-full">
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
            <div class="relative flex flex-col rounded-xl bg-slate-900 bg-clip-border text-slate-50 shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                <div class="relative mx-4 -mt-6 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600" style="height: 24rem;">
                    <img src="template/1.jpg" alt="Project Image" class="object-contain w-full h-full">
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