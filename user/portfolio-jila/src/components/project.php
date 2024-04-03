

<section id="projects">
    <h2 class="text-4xl font-extrabold text-gray-800 text-center mt-10 mb-8">Projects</h2>
    <div class="flex flex-col m-2 mt-16 md:flex-row justify-evenly space-y-4 md:space-y-0 md:space-x-8">

        <?php
        $pr_query = "SELECT * FROM `projects` WHERE `un_id` = '$apikey'";
        $projects = mysqli_query($conn, $pr_query);
        if ($projects) {
            $project = mysqli_fetch_assoc($projects);
        ?>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- 1st Card Start -->
                <div class="relative flex flex-col rounded-xl bg-slate-900 bg-clip-border text-slate-50 shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none mt-6">
                    <div class="relative mx-4 -mt-6 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600" style="height: 24rem;">
                        <img src="../create-your-portfolio/project-image/<?php echo $project['pr_img']; ?>" alt="Project Image" class="object-contain w-full h-full">
                    </div>



                    <div class="p-6">
                        <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                            <?php echo $project['pr_tittle']; ?>
                        </h5>
                        <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                            <?php echo $project['pr_desc']; ?>
                        </p>
                    </div>

                    <div class="p-6 pt-0">
                        <button data-ripple-light="true" type="button" class="select-none rounded-lg bg-slate-800 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                            <a href="<?php echo $project['pr_repo']; ?>">Preview</a>
                        </button>
                    </div>
                </div>
                <!-- 1st Card End -->

                <!-- 2st Card Start -->
                <div class="relative flex flex-col rounded-xl bg-slate-900 bg-clip-border text-slate-50 shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none mt-6">
                    <div class="relative mx-4 -mt-6 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600" style="height: 24rem;">
                        <img src="../create-your-portfolio/project-image/<?php echo $project['pr_img2']; ?>" alt="Project Image" class="object-contain w-full h-full">
                    </div>



                    <div class="p-6">
                        <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                            <?php echo $project['pr_tittle2']; ?>
                        </h5>
                        <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                            <?php echo $project['pr_desc2']; ?>
                        </p>
                    </div>

                    <div class="p-6 pt-0">
                        <button data-ripple-light="true" type="button" class="select-none rounded-lg bg-slate-800 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                            <a href="<?php echo $project['pr_repo2']; ?>">Preview</a>
                        </button>
                    </div>
                </div>
                <!-- 2st Card End -->
                <!-- 3st Card Start -->
                <div class="relative flex flex-col rounded-xl bg-slate-900 bg-clip-border text-slate-50 shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none mt-6">
                    <div class="relative mx-4 -mt-6 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600" style="height: 24rem;">
                        <img src="../create-your-portfolio/project-image/<?php echo $project['pr_img3']; ?>" alt="Project Image" class="object-contain w-full h-full">
                    </div>



                    <div class="p-6">
                        <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                            <?php echo $project['pr_tittle3']; ?>
                        </h5>
                        <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                            <?php echo $project['pr_desc3']; ?>
                        </p>
                    </div>

                    <div class="p-6 pt-0">
                        <button data-ripple-light="true" type="button" class="select-none rounded-lg bg-slate-800 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                            <a href="<?php echo $project['pr_repo3']; ?>">Preview</a>
                        </button>
                    </div>
                </div>
                <!-- 3st Card End -->

            </div>



        <?php
        }
        ?>
    </div>
</section>