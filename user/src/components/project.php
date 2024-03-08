<section>
    <h2 class="text-4xl font-extrabold text-gray-800 text-center mt-10 mb-8">Projects</h2>
    <div class="flex flex-col m-5 md:flex-row justify-center items-center space-y-4 md:space-y-0 md:space-x-8">

    <?php 
$pr_query = "SELECT * FROM `projects` WHERE `un_id` = '$apikey'";
$projects = mysqli_query($conn, $pr_query);
if($projects){
    $project = mysqli_fetch_assoc($projects);
?>
    <!-- Project Card -->
    <div class="bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:ring focus:ring-slate-50 rounded-lg p-5 hover:outline text-slate-50 font-serif hover:text-cyan-400 shadow-md">
        <div class="content">
            <h4 class="mb-4 text-xl font-bold "><?php echo $project['pr_tittle'];?></h4>
            <div class="image mb-4">
                <img src="../create-your-portfolio/project-image/<?php echo $project['pr_img'];?>" alt="Man Image">
            </div>

            <p class="mb-4 flex items-center">
            <?php echo $project['pr_desc'];?>
            </p>
        </div>
        <button class="mt-8 bg-slate-700 hover:bg-slate-950 active:bg-slate-950 focus:outline-none focus:ring focus:ring-violet-300 rounded-md px-3 py-2 text-cyan-500 font-serif hover:text-cyan-400 shadow-md w-full cursor-pointer ">Join Now</button>
    </div>
    <!-- End -->
    <!-- Project Card -->
    <div class="bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:ring focus:ring-slate-50 rounded-lg p-5 hover:outline text-slate-50 font-serif hover:text-cyan-400 shadow-md">
        <div class="content">
            <h4 class="mb-4 text-xl font-bold "><?php echo $project['pr_tittle2'];?></h4>
            <div class="image mb-4">
                <img src="../create-your-portfolio/project-image/<?php echo $project['pr_img2'];?>" alt="Man Image">
            </div>

            <p class="mb-4 flex items-center">
            <?php echo $project['pr_desc2'];?>
            </p>
        </div>
        <button class="mt-8 bg-slate-700 hover:bg-slate-950 active:bg-slate-950 focus:outline-none focus:ring focus:ring-violet-300 rounded-md px-3 py-2 text-cyan-500 font-serif hover:text-cyan-400 shadow-md w-full cursor-pointer ">Join Now</button>
    </div>
    <!-- End -->
    <!-- Project Card -->
    <div class="bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:ring focus:ring-slate-50 rounded-lg p-5 hover:outline text-slate-50 font-serif hover:text-cyan-400 shadow-md">
        <div class="content">
            <h4 class="mb-4 text-xl font-bold "><?php echo $project['pr_tittle3'];?></h4>
            <div class="image mb-4">
                <img src="../create-your-portfolio/project-image/<?php echo $project['pr_img3'];?>" alt="Man Image">
            </div>

            <p class="mb-4 flex items-center">
            <?php echo $project['pr_desc3'];?>
            </p>
        </div>
        <button class="mt-8 bg-slate-700 hover:bg-slate-950 active:bg-slate-950 focus:outline-none focus:ring focus:ring-violet-300 rounded-md px-3 py-2 text-cyan-500 font-serif hover:text-cyan-400 shadow-md w-full cursor-pointer ">Join Now</button>
    </div>
    <!-- End -->
<?php
}
?>


    </div>

</section>