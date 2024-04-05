<html class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <!-- StyleSheet -->
    <link rel="stylesheet" href="include/style.css">

    <!-- FavIcon -->
    <link href="include/favicons_io/favicon.ico" rel="icon">

    <!--Animation Library-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <title><?php echo $usr_name; ?> Creative Portfolio | Portfolio Jila</title>
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

<body class="overflow-x-hidden bg-slate-950 scroll-smooth">


    <div id="particles" class="absolute w-full h-full top-0 left-0 z-[-10] opacity-50"></div>

    <!-- NavStart -->
    <nav class="max-w-screen-xl mx-auto px-4 pb-8 flex items-center justify-between space-x-8">
        <div id="links" class="w-24 h-24 rounded-full">
            <a href="#" class="flex items-center">
                <img class="w-50 h-50  py-4 object-cover rounded-full" src="include/img/portfoliojila.png" alt="Logo">
            </a>
        </div>
        <!-- NavLinks -->
        <ul class="text-cyan-400 font-semibold space-x-6 hidden md:flex z-20 cursor-pointer">
            <li class="hover-underline-animation"><a href="#">Wellcome</a></li>
            <li id="Resume" class="hover-underline-animation"><a href="#download-cv">Resume</a></li>
            <li id="Project" class="hover-underline-animation"><a href="#projects">Projects</a></li>
            <li id="Service" class="hover-underline-animation"><a href="#service">Service</a></li>
            <li id="Contact" class="hover-underline-animation"><a href="#contact-us">Say Hii!</a></li>
        </ul>

        <button class="md:hidden bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-md px-3 py-2 text-cyan-500 font-serif  hover:text-cyan-400 shadow-md cursor-pointer"><a href="<?php echo $whatsapp; ?>" target="_blank">Say Hii!</a></button>
        <button class="hidden md:block bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-md px-3 py-2 text-cyan-500 font-serif  hover:text-cyan-400 shadow-md cursor-pointer"><a href="../create-your-portfolio/">Create Your Profile</a></button>

    </nav>
    <!-- Nav End -->


    <div class="md:flex md:justify-between items-center">
        <div class="content px-4">
            <h4 class="mb-5 text-white text-md font-medium"><?php echo $bio; ?></h4>
            <span class="blur"></span>
            <span class="blur"></span>
            <h1 class="mb-8 text-slate-50 text-2xl md:text-6xl font-medium">Hi, I'm <span class="text-cyan-400"><?php echo $usr_name; ?></span>,<br><span class="typing-animation"><?php echo $profession; ?></span></h1>
            <p class="mt-5 text-gray-400">
                <?php echo $a_bt; ?> <br> <span class="text-cyan-400"><?php echo $ab_t; ?></span>
            </p>
            <button class="bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-md px-3 py-2 text-cyan-500 font-serif  hover:text-cyan-400 shadow-md mt-10 cursor-pointer"><a href="<?php echo $whatsapp; ?>" target="_blank">Let's Collaborate and Build Something Amazing</a></button>
        </div>
        <div class="avatar max-w-[350px] max-h-[520px]">
            <!-- <img src="include/img/female-developer.png" alt="Woman Image"> -->
            <?php
            if ($gen == 1) {
                $gender = 'female.png';
            } else {
                $gender = 'male.png';
            }
            ?>

            <img src="include/img/<?php echo htmlspecialchars($gender); ?>" alt="Man Image" >

        </div>

    </div>
    