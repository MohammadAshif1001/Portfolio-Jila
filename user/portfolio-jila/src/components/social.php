<section class="rounded-lg bg-slate-950 p-5" id="download-cv">
<div class="flex items-center justify-center">
<div class="grid grid-cols-4 gap-4 md:flex md:justify-between">


  
  <!--Linkedin Button-->
  <button id="linkedin" class="bg-white transform hover:-translate-y-3  border-2 w-12 h-12 rounded-full duration-500 text-blue-500 border-blue-500  hover:bg-blue-500 hover:text-white text-2xl">
    <a   href="<?php echo $linkdIn; ?>">
    <i class="fab fa-linkedin-in"></i>
    </a>
  </button>

   <!--Github Button-->
<button id="github" class="bg-white transform hover:-translate-y-3  border-2 w-12 h-12 rounded-full duration-500 text-black border-black hover:bg-black hover:text-white text-2xl">
  <a   href="<?php echo $gitHub; ?>">
   <i class="fab fa-github"></i>
   </a>
  </button>


  <!--İnstagram Button -->
  <button id="instagram" class=" border-2 hover:border-0 border-pink-500 bg-gradient-to-b text-2xl hover:from-indigo-600 hover:via-pink-600 hover:to-yellow-500 min-w-wull hover:text-white bg-white text-pink-600 w-12 h-12  transform hover:-translate-y-3 rounded-full duration-500 ">
    <a   href="<?php echo $insta; ?>">
    <i class="fab fa-instagram"></i>
    </a>
  </button>


 <!--Twitter Button -->
 <button id="twitter" class="bg-white  transform hover:-translate-y-3  border-2 w-12 h-12 rounded-full duration-500 text-blue-400 border-blue-400 hover:bg-blue-400 hover:text-white text-2xl">
   <a   href="<?php echo $x; ?>">
    <i class="fab fa-twitter"></i>
    </a>
  </button>
  
</div

<span class="blur"></span>
</div>
 <div class="bg-slate-950 container mx-auto p-4 text-center rounded-b-2xl flex items-center justify-center">
        
            <button id="downloadButton" class="bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-md px-3 py-2 text-cyan-500 font-serif  hover:text-cyan-400 shadow-md mt-2 cursor-pointer">
                <div class="flex items-center justify-center">
                    <!-- Download Icon -->
                    <svg class="download-icon download-arrow mr-2" width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 9L9 13M9 13L5 9M9 13V1" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1 17V18C1 18.7956 1.31607 19.5587 1.87868 20.1213C2.44129 20.6839 3.20435 21 4 21H14C14.7956 21 15.5587 20.6839 16.1213 20.1213C16.6839 19.5587 17 18.7956 17 18V17" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div class="button-copy uppercase"><a href="../create-your-portfolio/<?php echo $cv_l; ?>" download="newfilename">Download Resume </a></div>
                </div>
                 </button>
        </div>

</section>
<script>
    tippy('#instagram',{
      content:'Instagram',
      animation:'fade',
      delay:[200,200]
    });
    tippy('#twitter',{
      content:'Twitter',
      animation:'fade',
      delay:[200,200]
    });
    tippy('#github',{
      content:'Github',
      animation:'fade',
      placement: 'right-start',
      delay:[200,200]
    });
    tippy('#linkedin',{
      content:'Linkedin',
      animation:'fade',
      placement: 'top',
      delay:[200,200]
    });
  </script>
    <!-- <script>
        const downloadButton = document.getElementById('downloadButton');

        downloadButton.addEventListener('click', () => {
            // Simulating a download with a delay
            setTimeout(() => {
                alert('Document is being downloaded!');
            }, 1000);
        });

        // Add hover animation
        downloadButton.addEventListener('mouseover', () => {
            downloadButton.classList.add('scale-105');
        });

        downloadButton.addEventListener('mouseout', () => {
            downloadButton.classList.remove('scale-105');
        });
    </script> -->