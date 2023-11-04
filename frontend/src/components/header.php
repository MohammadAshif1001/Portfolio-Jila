<?php
$usr_name = "Mohammad Ashif";
$bg_color = "slate-950";

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <!-- StyleSheet -->
    <link rel="stylesheet" href="include/style.css">
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

    .blur{
    position: absolute;
    box-shadow: 0 0 1000px 50px #1d4ed8;
    z-index: -100;
}

</style>

<body class="bg-slate-950 scroll-smooth">
<div id="particles" class="absolute w-full h-full top-0 left-0 z-[-10] opacity-50"></div>

<!-- NavStart -->
    <nav class="max-w-screen-xl mx-auto px-4 py-8 flex items-center justify-between space-x-8">
        <div id="links" class="w-20 h-20 rounded-full">
            <a href="#" class="flex items-center">
             <img class="w-full h-full object-cover rounded-full" src="include/img/logo.png" alt="Logo">
            </a>
        </div>
<!-- NavLinks -->
        <ul class="text-cyan-400 font-semibold space-x-6 hidden md:flex z-20 cursor-pointer">
            <li class="hover-underline-animation"><a href="#">Wellcome</a></li>
            <li id="Resume" class="hover-underline-animation"><a href="#">Resume</a></li>
            <li id="Project" class="hover-underline-animation"><a href="#">Projects</a></li>
            <li id="Service" class="hover-underline-animation"><a href="#">Service</a></li>
            <li id="Contact" class="hover-underline-animation"><a href="#">Say Hii!</a></li>
        </ul>
        
        <button class="bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-md px-3 py-2 text-cyan-500 font-serif  hover:text-cyan-400 shadow-md cursor-pointer">Hire Me</button>
    </nav>
<!-- Nav End -->


<div class="md:flex md:justify-between items-center">
    <div class="content m-5">
        <h4 class="mb-5 text-white text-md font-medium text-indigo-500">Your Creative Vision, My Technical Expertise</h4>
        <span class="blur"></span>
            <span class="blur"></span>
        <h1 class="mb-8 text-slate-50 text-2xl md:text-6xl font-medium">Hi, I'm <span class="text-cyan-400"><?php echo $usr_name;?></span>,<br><span class="typing-animation">Full-Stack Developer</span></h1>
        <p class="mt-5 text-gray-400">
        Web development is not just my job; it's my creative outlet. I'm here to build robust and user-friendly websites that leave a lasting impression.
<span class="text-cyan-400">My journey is all about turning concepts into code. I take pride in solving complex challenges, delivering top-notch websites, and exceeding expectations.</span>
        </p>
        <button class="bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-md px-3 py-2 text-cyan-500 font-serif  hover:text-cyan-400 shadow-md mt-10 cursor-pointer">Let's Collaborate and Build Something Amazing</button>
    </div>
    <div class="avatar">
        <img src="include/img/man.png" alt="Man Image">
    </div>
</div>
<section class="bg-slate-900 flex items-center justify-center p-5"><button class="bg-slate-50 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
  <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
  <span>Download Resume</span>
</button></section>






