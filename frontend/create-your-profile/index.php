<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/include/style.css">
    <title>Create Your Protfolio | with Protfolio Jila</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
</head>


<?php
session_start();



// Enable CORS (Cross-Origin Resource Sharing) if needed
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, API-Key");
?>


<body class="bg-slate-950">
    <div id="app" class="flex flex-col items-center gap-5"> 
        <h1 class="text-slate-50 text-2xl font-semibold">Create Profile</h1>

        <!-- <div class="flex items-center p-4 mb-4 text-sm  border rounded-lg bg-blue-50 dark:bg-gray-800 text-cyan-400 border-slate-100" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
           <div>
               <span class="font-medium"> &nbsp; Info alert! </span> Change a few things up and try submitting again.
            </div>
        </div> -->
         

    <!-- Step 1 -->
    <div v-if="step === 1" class="flex flex-col w-full justify-center items-center">
        <h2 class="text-2xl font-semibold mb-4">Step 1: Personal Information</h2>

        <!-- Form -->
        <form @submit.prevent="nextStep" class="bg-slate-950 md:bg-slate-700 p-5 rounded-lg shadow-lg w-full  h-auto flex flex-col justify-center md:w-1/2">
            <div class="mb-4">
                <label for="id_name" class="block text-cyan-400 text-sm font-medium">Name</label>
                <input type="text" v-model="formData.name" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" required placeholder="Mohammad Ashif">
            </div>

            <div class="mb-4">
                <label for="id_mail" class="block text-cyan-400 text-sm font-medium">Your Email Id</label>
                <input type="text" v-model="formData.mail" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" required placeholder="your@gmail.com">
            </div>
            
            <div class="mb-4">
                <label for="id_bio" class="block text-cyan-400 text-sm font-medium">Bio</label>
                <input type="text" v-model="formData.bio" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2"  required placeholder="Your Creative Vision, My Technical Expertise">
            </div>

            <div class="mb-4">
                <label for="id_p" class="block text-cyan-400 text-sm font-medium">Profession</label>
                <input type="text" v-model="formData.prof" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" required placeholder="Full-Stack Developer">
            </div>         


            <div class="mb-4">
                <label for="ab_1" class="block text-cyan-400 text-sm font-medium">About</label>
                <textarea v-model="formData.ab_1" class="h-12 mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2"    required placeholder="Web development is not just my job; it's my creative outlet........"></textarea>
            </div>         


            <div class="mb-4">
                <label for="ab_2" class="block text-cyan-400 text-sm font-medium">About 2</label>
                <textarea v-model="formData.ab_2" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2"  required placeholder="My journey is all about turning concepts into code......"></textarea>
            </div> 


            <div class="mb-4">
                <label for="cv" class="block text-cyan-400 text-sm font-medium">Resume Link</label>
                <input type="text" v-model="formData.cv" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" required placeholder="G-Drive Link">
                
            </div>
           
            <!-- Add more fields for Step 1 as needed -->


            <button type="submit" class="bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:outline-none focus:ring focus:ring-slate-950 rounded-md px-3 py-2 text-cyan-500 font-serif  hover:text-cyan-400 shadow-md mt-10 cursor-pointer">Next</button>
        </form>
    </div>



    <!-- Step 2 -->
<div v-if="step === 2" class="flex flex-col w-full justify-center items-center">
        <h2 class="text-2xl font-semibold mb-4">Step 2: Social Links</h2>
        <form @submit.prevent="nextStep" class="bg-slate-950 md:bg-slate-700 p-5 rounded-lg shadow-lg w-full  h-auto flex flex-col justify-center md:w-1/2">
            <div class="mb-4">
                <label class="block text-cyan-400 text-sm font-medium">LinkdIn</label>
                <input type="text" v-model="formData.L_in" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="No account? Put  #"  required>
            </div>         
           

            <div class="mb-4">
                <label  class="block text-cyan-400 text-sm font-medium">Instagram</label>
                <input type="text" v-model="formData.In_ta" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="No account? Put  #"  required>
            </div>         


            <div class="mb-4">
                <label class="block text-cyan-400 text-sm font-medium">Facebook</label>
                <input type="text" v-model="formData.f_b" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="No account? Put  #"  required>
            </div> 


            <div class="mb-4">
                <label class="block text-cyan-400 text-sm font-medium">Twiter</label>
                <input type="text" v-model="formData.tw_er" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="No account? Put  #"  required>
            </div>

            <div class="mb-4">
                <label class="block text-cyan-400 text-sm font-medium">Git Hub</label>
                <input type="text" v-model="formData.g_h" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="No account? Put  #"  required>
            </div>

            <div class="mb-4">
                <label class="block text-cyan-400 text-sm font-medium">WhatsApp</label>
                <input type="text" v-model="formData.w_a" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="No account? Put  #"  required>
            </div>
            <div class="mb-4">
                <label class="block text-cyan-400 text-sm font-medium">Teligram</label>
                <input type="text" v-model="formData.t_g" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="No account? Put  #"  required>
            </div>
            <div class="mb-4">
                <label class="block text-cyan-400 text-sm font-medium">You Tube</label>
                <input type="text" v-model="formData.y_t" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="No account? Put  #"  required>
            </div>
            <div class="mb-4">
                <label class="block text-cyan-400 text-sm font-medium">Pintres</label>
                <input type="text" v-model="formData.p_s" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="No account? Put  #"  required>
            </div>
            <div class="mb-4">
                <label class="block text-cyan-400 text-sm font-medium">Discord</label>
                <input type="text" v-model="formData.d_s" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="No account? Put  #"  required>
            </div>
            <div class="mb-4">
                <label class="block text-cyan-400 text-sm font-medium">Redit</label>
                <input type="text" v-model="formData.r_d" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="No account? Put  #"  required>
            </div>
            
        
            <button type="submit" class="bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:outline-none focus:ring focus:ring-slate-950 rounded-md px-3 py-2 text-cyan-500 font-serif  hover:text-cyan-400 shadow-md mt-10 cursor-pointer">Next</button>
        </form>
    </div>

    <!-- Step 3 -->
    <div v-if="step === 3" class="flex flex-col w-full justify-center items-center">
        <h2 class="text-2xl font-semibold mb-4">Step 3: Your Projects</h2>
        <form @submit.prevent="submitForm" class="bg-slate-950 md:bg-slate-700 p-5 rounded-lg shadow-lg w-full  h-auto flex flex-col justify-center md:w-1/2">
        <h2 class="text-2xl font-bold mb-4">Your Projects 1</h2>
            <div class="mb-4">
                <label  class="block text-cyan-400 text-sm font-medium">Project Title</label>
                <input type="text" v-model="formData.p_title" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="Project Title"  required>
            </div>
            
            <div class="mb-4">
                <label  class="block text-cyan-400 text-sm font-medium">Project Img</label>
                <input type="text" v-model="formData.p_img" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="Image Link"  required>
            </div>
            
            <div class="mb-4">
                <label class="block text-cyan-400 text-sm font-medium">Description</label>
                <textarea v-model="formData.p_dec" class="h-12 mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="Describe in 10-50 words" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-cyan-400 text-sm font-medium">Repo Link Or Live Link</label>
                <input type="text" v-model="formData.p_repo" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="No Link? Put  #"  required>
            </div>

            <h2 class="text-2xl font-bold mb-4 text-slate-50">Your Projects 2</h2>

            <div class="mb-4">
                <label  class="block text-cyan-400 text-sm font-medium">Project Title</label>
                <input type="text" v-model="formData.p_title2" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="Project Title"  required>
            </div>
            
            <div class="mb-4">
                <label  class="block text-cyan-400 text-sm font-medium">Project Img</label>
                <input type="text" v-model="formData.p_img2" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="Image Link"  required>
            </div>
            
            <div class="mb-4">
                <label class="block text-cyan-400 text-sm font-medium">Description</label>
                <textarea v-model="formData.p_dec2" class="h-12 mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="Describe in 10-50 words" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-cyan-400 text-sm font-medium">Repo Link Or Live Link</label>
                <input type="text" v-model="formData.p_repo2" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="No Link? Put  #"  required>
            </div>

            <h2 class="text-2xl font-bold mb-4  text-slate-50">Your Projects 3</h2>
            <div class="mb-4">
                <label  class="block text-cyan-400 text-sm font-medium">Project Title</label>
                <input type="text" v-model="formData.p_title3" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="Project Title"  required>
            </div>
            
            <div class="mb-4">
                <label  class="block text-cyan-400 text-sm font-medium">Project Img</label>
                <input type="text" v-model="formData.p_img3" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="Image Link"  required>
            </div>
            
            <div class="mb-4">
                <label class="block text-cyan-400 text-sm font-medium">Description</label>
                <textarea v-model="formData.p_dec3" class="h-12 mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="Describe in 10-50 words" required></textarea>
            </div>


            <div class="mb-4">
                <label class="block text-cyan-400 text-sm font-medium">Repo Link Or Live Link</label>
                <input type="text" v-model="formData.p_repo3" class="mt-2 border w-full focus:ring focus:ring-slate-950 rounded-md px-3 py-2" placeholder="No Link? Put  #"  required>
            </div>
            
            <button type="submit" class="bg-slate-900 hover:bg-slate-800 active:bg-slate-700 focus:outline-none focus:ring focus:ring-slate-950 rounded-md px-3 py-2 text-cyan-500 font-serif  hover:text-cyan-400 shadow-md mt-10 cursor-pointer">Submit</button>
        </form>
    </div>

</div>
<!-- Your HTML and Vue.js code -->
<script>
    new Vue({
        el: '#app',
        data: {
            step: 1,
            formData: {
                name: '',
                mail: '',
                bio: '',
                prof: '',
                ab_1: '',
                ab_2: '',
                cv: '',
                L_in: '',
                In_ta: '', 
                tw_er: '', 
                g_h: '', 
                w_a: '',
                t_g: '',
                f_b: '',
                y_t: '', 
                p_s: '',
                d_s: '',
                r_d: '',
                p_title: '',
                p_img: '',
                p_dec: '',
                p_repo: '',
                p_title2: '',
                p_img2: '',
                p_dec2: '',
                p_repo2: '',
                p_title3: '',
                p_img3: '',
                p_dec3: '',
                p_repo3: ''
            }
        },
           

        methods: {
            nextStep() {
                this.step += 1;
            },
            prevStep() {
                this.step -= 1;
            },
            submitForm() {
                // Handle form submission logic here
                // You can access form data using this.formData

                // Create an object to store the form data
                const postData = {
                    name: this.formData.name,
                    mail: this.formData.mail,
                    bio: this.formData.bio,
                    prof: this.formData.prof,
                    ab_1: this.formData.ab_1,
                    ab_2: this.formData.ab_2,
                    cv: this.formData.cv,
                    L_in: this.formData.L_in,
                    In_ta: this.formData.In_ta, 
                    tw_er: this.formData.tw_er, 
                    g_h: this.formData.g_h, 
                    w_a: this.formData.w_a,
                    t_g: this.formData.t_g,
                    f_b: this.formData.f_b,
                    y_t: this.formData.y_t, 
                    p_s: this.formData.p_s,
                    d_s: this.formData.d_s,
                    r_d: this.formData.r_d,
                    p_title: this.formData.p_title,
                    p_img: this.formData.p_img,
                    p_dec: this.formData.p_dec,
                    p_repo: this.formData.p_repo,
                    p_title2: this.formData.p_title2,
                    p_img2: this.formData.p_img2,
                    p_dec2: this.formData.p_dec2,
                    p_repo2: this.formData.p_repo2,
                    p_title3: this.formData.p_title3,
                    p_img3: this.formData.p_img3,
                    p_dec3: this.formData.p_dec3,
                    p_repo3: this.formData.p_repo3
                };
                const apiKey = 'key';
                // Use fetch or another AJAX library to send data to the server
                fetch('http://localhost/protfolio-jila/frontend/create-your-profile/insert_data.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'API-Key': apiKey,  // Include the API key in the headers
                    },
                    body: JSON.stringify(postData),
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the response from the server
                    console.log('Data inserted successfully:', data);

                    // Optionally, you can reset the form or redirect the user
                    this.step = 1;
                    this.formData = {
                        name: '',
                        mail: '',
                        bio: '',
                        prof: '',
                        ab_1: '',
                        ab_2: '',
                        cv: '',
                        L_in: '',
                        In_ta: '', 
                        tw_er: '', 
                        g_h: '', 
                        w_a: '',
                        t_g: '',
                        f_b: '',
                        y_t: '', 
                        p_s: '',
                        d_s: '',
                        r_d: '',
                        p_title: '',
                        p_img: '',
                        p_dec: '',
                        p_repo: '',
                        p_title2: '',
                        p_img2: '',
                        p_dec2: '',
                        p_repo2: '',
                        p_title3: '',
                        p_img3: '',
                        p_dec3: '',
                        p_repo3: ''
                        // Add more fields as needed
                    };
                })
                .catch(error => {
                    console.error('Error inserting data:', error);
                });
            }
        }
    });
</script>

    
</body>
</html>