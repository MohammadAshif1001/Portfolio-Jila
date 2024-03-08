<?php
include("config/config.php");
?>


<?php 
    
    if( $_SERVER["REQUEST_METHOD"] == "POST" ){
        

           $title = $_REQUEST["title"];
           $description = $_REQUEST["description"];

           $img = $_FILES["N_img"]["name"];
           $img_temp_loc = $_FILES["N_img"]["tmp_name"];

           $temp_extension = explode(".",$N_img_name);
           $N_img_extension = strtolower( end($temp_extension) );
           $isallowded = array("jpg","png","jpeg" );


           if(isset($_POST['submit'])){
            $info=getimagesize($_FILES['image']['tmp_name']);
            if(isset($info['mime'])){
                if($info['mime']=="image/jpeg"){
                    $img=imagecreatefromjpeg($_FILES['image']['tmp_name']);
                }elseif($info['mime']=="image/png"){
                    $img=imagecreatefrompng($_FILES['image']['tmp_name']);
                }else{
                    echo "Only select jpg or png image";
                }
                if(isset($img)){
                    $output_image=time().'.jpg';
                    imagejpeg($img,$output_image,40);
                    echo "Processing done";
                }
            }else{
                echo "Only select jpg or png image";
            }
        }

          if( in_array( $N_img_extension , $isallowded ) ){
             $new_file_name =  uniqid("",true).".".$N_img_extension;      
             $location = "../img/img/".$new_file_name;  
          }else {
            $img_err = "<p style='color:red'> * Only JPG , JPEG and PNG files accepted </p>";
          }
        }

        if( !empty($description) && !empty($title) && !empty($img) ){
            move_uploaded_file($img_temp_loc,$location);

        $add_project = " INSERT INTO `projects`(`un_id`, `pr_tittle`, `pr_desc`, `pr_img`, `pr_repo`, `frontend`, `backend`, `dbase`) VALUES ('$uniq_Id','$title','$description','$new_file_name','$repo', '$fe' , '$be', '$db')";
        $result2= mysqli_query($conn , $add_project);

        if($result2){
            $title = $description = "";
        }
    }
?>

<body>
   


                                <form method="POST" enctype="multipart/form-data"
                                    action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                    <div class="form-group">
                                        <label>Select Post Category: </label>
                                        <select name="catg" class="form-control">
                                            <option selected>All</option>
                                            <option value="Python">Python</option>
                                            <option value="Java">Java</option>
                                            <option value="C">C Programing</option>
                                            <option value="C++">C++</option>
                                            <option value="Js">Java Script</option>
                                            <option value="Hacking">Hacking</option>
                                            <option value="Tool">Tool</option>
                                            <option value="Darkweb">Darkweb</option>
                                            <option value="Other">Other</option>
                                            <option value="Notes">Enginearing Notes</option>
                                        </select>
                                        <?php echo $category_err; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Post Heading:</label>
                                        <input type="text" class="form-control" value="<?php echo $title; ?>"
                                            name="title">
                                        <?php echo $title_err; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Final Price:</label>
                                        <input type="text" class="form-control" value="<?php echo $f_price; ?>"
                                            name="f_price">
                                        <?php echo $f_price_err; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Real Price:</label>
                                        <input type="text" class="form-control" value="<?php echo $d_price; ?>"
                                            name="d_price">
                                        <?php echo $d_price_err; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Discount in %:</label>
                                        <input type="text" class="form-control" value="<?php echo $d_count; ?>"
                                            name="d_count">
                                        <?php echo $d_count_err; ?>
                                    </div>
                                    <div class="form-group">
                                        <label> Add Notes Description: </label>
                                        <textarea name="description"
                                            id="description"><?php echo $description; ?></textarea>
                                        <?php echo $description_err; ?>
                                    </div>
                                    <div class="form-group">
                                        <label> Add Thumbnail: </label>
                                        <input type="file" name="N_img" class="form-control">
                                        <?php echo $N_img_err; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Add" class="btn login-form__btn submit w-10 "
                                            name="submit_expense">
                                    </div>

                                </form>
                            </div>
                            <!-- ckdescription function call -->
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        