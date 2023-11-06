<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/include/style.css">
    <title>Create Your Protfolio | with Protfolio Jila</title>
</head>


<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST" ){

        $user_name = $_REQUEST["name"];
        $bio = $_REQUEST["bio"];
        $profession = $_REQUEST["prof"];
        $a_bt = $_REQUEST["ab_1"];
        $ab_t = $_REQUEST["ab_2"];
        $cv_l = $_REQUEST["cv"];
        $date = $_REQUEST["cv"];


        if( !empty($user_name) && !empty($bio) && !empty($profession)  && !empty($ab_t) && !empty($a_bt) && !empty($cv_l))
        {
            $update_details = "INSERT INTO `users`(`user_name`, `user_email`, `user_bio`, `profesion`, `ab_1`, `ab_2`, `resume_link`, `date`) 
            VALUES ('$user_name','[value-2]','$bio','$profession','$a_bt','$ab_t','$cv_l','$date')";

            $profile_created = mysqli_query($conn , $update_details);

            if($profile_created){
                echo "<script> alert('Profile Created');
            </script>
            ";
            }

        } else {
            echo "<script> alert('Connection Failed');
            </script>
            ";
        }

    }
?>


<body class="bg-slate-950">
    <div class="flex flex-col items-center gap-5">
        <h1 class="text-slate-50 text-2xl font-semibold">Create Profile</h1>


        <form class="bg-slate-950 md:bg-slate-700 p-5 rounded-lg shadow-lg w-full  h-auto flex flex-col justify-center md:w-1/2" method="POST" enctype="multipart/form-data" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">


            <div class="mb-4">
                <label for="id_name" class="block text-cyan-400 text-sm font-medium">Name</label>
                <input type="text" id="id_name" name="name" class="mt-2 border w-full focus:ring focus:ring-violet-300 rounded-md px-3 py-2" placeholder="Mohammad Ashif">
            </div>         


            <div class="mb-4">
                <label for="id_bio" class="block text-cyan-400 text-sm font-medium">Bio</label>
                <input type="text" id="id_bio" name="bio" class="mt-2 border w-full focus:ring focus:ring-violet-300 rounded-md px-3 py-2" placeholder="Your Creative Vision, My Technical Expertise">
            </div>         


            <div class="mb-4">
                <label for="id_p" class="block text-cyan-400 text-sm font-medium">Profession</label>
                <input type="text" id="id_p" name="prof" class="mt-2 border w-full focus:ring focus:ring-violet-300 rounded-md px-3 py-2" placeholder="Full-Stack Developer">
            </div>         


            <div class="mb-4">
                <label for="ab_1" class="block text-cyan-400 text-sm font-medium">About</label>
                <textarea id="ab_1" name="ab_1" class="mt-2 border w-full focus:ring focus:ring-violet-300 rounded-md px-3 py-2" placeholder="Web development is not just my job; it's my creative outlet........"></textarea>
            </div>         


            <div class="mb-4">
                <label for="ab_2" class="block text-cyan-400 text-sm font-medium">About 2</label>
                <textarea id="ab_2" name="ab_2" class="mt-2 border w-full focus:ring focus:ring-violet-300 rounded-md px-3 py-2" placeholder="My journey is all about turning concepts into code......"></textarea>
            </div> 


            <div class="mb-4">
                <label for="cv" class="block text-cyan-400 text-sm font-medium">Resume Link</label>
                <input type="text" id="cv" name="cv" class="mt-2 border w-full focus:ring focus:ring-violet-300 rounded-md px-3 py-2" placeholder="G-Drive Link">
            </div>


            <div class="button flex justify-center">
                    <input class="bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-md px-3 py-2 text-cyan-500 font-serif  hover:text-cyan-400 shadow-md mt-10 cursor-pointer" value="Save" type="submit" name="form_data">
            </div>

        </form>
    </div>
    
</body>
</html>