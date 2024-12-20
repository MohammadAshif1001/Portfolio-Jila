<section id="contact-us">

    <div id="app" class="flex items-center gap-5 pt-10 min">
        <div class="m-w-fit mx-auto relative overflow-hidden z-10 bg-slate-850 p-8 rounded-lg shadow-md before:w-24 before:h-24 before:absolute before:bg-purple-600 before:rounded-full before:-z-10 before:blur-2xl after:w-32 after:h-32 after:absolute after:bg-sky-400 after:rounded-full after:-z-10 after:blur-xl after:top-24 after:-right-12">
            <div data-aos="flip-down" data-aos-duration="1500" class="contact-us flex flex-wrap justify-evenly gap-20 md:gap-x-40">
                <div class="about">
                    <div class="address">
                        <img src="include/img/Contact-Us.png" alt="Error">
                        <div class="des max-w-96 ml-4 md:ml-8">
                            <h4 class="font-serif text-gray-400 text-xl flex flex-wrap">For questions, technical assistance,
                                or collaboration opportunities via the contact information provided.</h4>
                        </div>
                        <div class="ml-4 md:ml-8 my-8">
                            <button class="bg-gradient-to-r from-purple-600 via-purple-400 to-blue-500 text-white w-6 h-6 border-1 rounded-full text-sm hover:text-white">
                                <a href="tel:<?php echo $user_mob; ?>"><i class="fab fa fa-phone"></i></a>
                            </button>
                            <span class="ml-2 text-gray-400 text-xs md:text-md  font-medium"><?php echo $user_mob; ?></span>
                        </div>
                        <div class="ml-4 md:ml-8 my-8">
                            <button class="bg-gradient-to-r from-purple-600 via-purple-400 to-blue-500 text-white w-6 h-6 border-1 rounded-full text-sm hover:text-white">
                                <i class="fab fa fa-envelope"></i>
                            </button>
                            <span class="ml-2 text-gray-400 text-xs md:text-md font-medium"><?php echo $user_email; ?></span>
                        </div>
                        <div class="ml-4 md:ml-8 my-8">
                            <button class="bg-gradient-to-r from-purple-600 via-purple-400 to-blue-500 text-white w-6 h-6 border-1 rounded-full text-sm hover:text-white">
                                <i class="fab fa fa-map-marker-alt"></i>
                            </button>
                            <span class="ml-2 text-gray-400 text-xs md:text-md  font-medium"><?php echo $user_add; ?></span>
                        </div>
                    </div>
                </div>
                <div class="contact-form md:my-12">
                    <form action="thank-you.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300" for="name">Full Name</label>
                            <input class="mt-1 p-2 w-full bg-slate-900 border border-cyan-400  rounded-md text-white focus:outline-none" type="text" id="name" name="name">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300" for="email">Email Address</label>
                            <input class="mt-1 p-2 w-full bg-slate-900 border border-cyan-400  rounded-md text-white focus:outline-none" type="email" id="email" name="email">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300" for="msg">Message</label>
                            <textarea class="mt-1 p-2 w-full bg-slate-900 border border-cyan-400 rounded-md text-white focus:outline-none" rows="3" id="msg" name="msg"></textarea>
                        </div>
                        <input type="hidden" name="admin_email" value="<?php echo $user_email; ?>">
                        <input type="hidden" name="admin_name" value="<?php echo $usr_name; ?>">

                        <div class="flex justify-center">
                            <button class="mt-6 bg-slate-700 hover:bg-slate-900 active:bg-slate-950 focus:outline-none focus:ring focus:ring-violet-300 rounded-md px-3 py-2 text-cyan-500 font-serif hover:text-cyan-400 shadow-md w-auto cursor-pointer" type="submit">Send Message</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>