<!DOCTYPE html>
<?php include("../../config.php");
include("../../inc/portal_authentication.php");
include("../../inc/branch_config.php"); 
include("../../inc/extra.inc"); 
////MENU ID FOR ACTIVE CLASS TO ADD IN MENU ////////////
$menu_page_id = "billing_main";
//---//MENU ID FOR ACTIVE CLASS TO ADD IN MENU ////////---////
?> 
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo $app_path; ?>/assets/" data-template="vertical-menu-template-starter">
<head>
    <title>Issue E-Pass | SAI SAMSTHANA</title>
    <?php include("../../inc/header_script.php"); ?> 
    <style>
    .forms-container {
        
        background-color: #FFFFFF;
        border: solid #FFFFFF ; /* Add a border with your desired style */
        
    }
</style>

</head>
<body>
    <?php include("../../inc/head_nav.php"); ?> 

    <!-- Content Change Starts Here -->
    <h2 class="card-title">GENERATE BILL | SAI SAMASTHANA</h2> 
    <div class="forms-container">
    <!--First form starts here-->
    <div class="container mt-4">
        
            <div class="card-body">
                <h4 class="card-title">Seva / Donation Form</h4>
                <!-- Your Form Goes Here -->
                <form id="issue_epass" action="your_action_url.php" method="POST">
                    <!-- Form Fields -->
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" />
                        </div>
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Company</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc." />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                        <div class="col-sm-4">
                            <div class="input-group input-group-merge">
                                <input
                                    type="text"
                                    id="basic-default-email"
                                    class="form-control"
                                    placeholder="john.doe"
                                    aria-label="john.doe"
                                    aria-describedby="basic-default-email2"
                                />
                                <span class="input-group-text" id="basic-default-email2">@example.com</span>
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone No</label>
                        <div class="col-sm-4">
                            <input
                                type="text"
                                id="basic-default-phone"
                                class="form-control phone-mask"
                                placeholder="658 799 8941"
                                aria-label="658 799 8941"
                                aria-describedby="basic-default-phone"
                            />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Message</label>
                        <div class="col-sm-10">
                            <textarea
                                id="basic-default-message"
                                class="form-control"
                                placeholder="Hi, Do you have a moment to talk Joe?"
                                aria-label="Hi, Do you have a moment to talk Joe?"
                                aria-describedby="basic-icon-default-message2"
                            ></textarea>
                        </div>
                    </div>
                    
                </form>
            </div>
        
    </div>
    <!--First form ends here-->

    <!--Second form starts here-->
    <div class="container mt-4">
        
            <div class="card-body">
                
                <!-- Seva/Donation Amount Sub-heading -->
                <h4 class="card-subtitle mb-4">Seva/Donation Amount</h4>
                <form id="issue_epass">
                    <!-- Form Fields -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="seva_amount" class="form-label">Enter Seva/Donation Amount</label>
                            <div class="input-group input-group-merge">
                            <span class="input-group-text">$</span>
			                <input type="number" class="form-control input-lg" name="amount" placeholder="Amount" id="seva_amount" autocomplete="off" required onfocusout="check_annadhana_amount()">
							</div>

                        </div>
                        <div class="col-md-6">
                            <label for="seva" class="form-label">Seva Name</label>
                            <input type="text" class="form-control" name="seva" id="seva" required list="seva_listtt" placeholder="Choose" />
                            <datalist id="seva_listtt">
                                <!-- Add your Seva options here -->
                                <option value="Kshira Abhisheka">
                                <option value="Dhuni Pooja">
                                <option value="Thomala Seva">
                                <!-- Add more options as needed -->
                            </datalist>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="seva_date" class="form-label">Seva Date</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i data-feather="calendar"></i></span>
                                <input type="text" class="form-control seva-date" placeholder="DD-MM-YY" name="seva_date" id="seva_date" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="pay_date" class="form-label">Payment Date</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i data-feather="calendar"></i></span>
                                <input value="<?php echo date("d-m-Y"); ?>" type="text" class="form-control payment-date" placeholder="DD-MM-YYYY" autocomplete="off" name="pay_date" id="pay_date" />
                            </div>
                            <small>Default will be the present day (change if needed).</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Payment Mode</label>
                            <div class="input-group input-group-merge">
                            <span class="input-group-text">((*))</span>
                                <select required name="pay_mode" class="form-select">
                                    <option value="">Select</option>
                                    <option value="Cash">Cash</option>
                                    <option value="UPI SCAN">UPI / SCAN</option>
                                    <option value="QR_CODE">QR CODE</option>
                                    <option value="Card Swipe">Card Swipe</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="NEFT / IMPS">NEFT / IMPS</option>
                                    <option value="Non-Cash">Non-Cash</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Donor PAN Card (Need 80G?)</label>
                            
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="pan_card" id="pan_card" placeholder="Enter PAN Card Number" />
                                <button type="button" class="btn btn-primary fetch-pan">Fetch</button>
                            </div>
                            <p>Fill the Pancard if eligible for 80G or fetch if already exits</p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Billing Type</label>
                        <div class="custom-options-checkable g-1">
                            <div class="col-md-4">
                                <div class="mb-1">
                                    <input class="custom-option-item-check" type="radio" name="seva_type" id="seva_type_puja" value="PUJA" checked />
                                    <label class="custom-option-item p-1" for="seva_type_puja">
                                        <span class="d-flex justify-content-between flex-wrap mb-50">
                                            <span class="fw-bolder">PUJA / POOJA</span>
                                            <span class="fw-bolder"></span>
                                        </span>
                                        <small class="d-block">Pujas, Thomala Seva, Abhisheka, Homa Other Seva's</small>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-1">
                                    <input class="custom-option-item-check" type="radio" name="seva_type" id="seva_type_donation" value="DONATION" />
                                    <label class="custom-option-item p-1" for="seva_type_donation">
                                        <span class="d-flex justify-content-between flex-wrap mb-50">
                                            <span class="fw-bolder">DONATION / ANNADHANA</span>
                                            <span class="fw-bolder"></span>
                                        </span>
                                        <small class="d-block">Annadhana, Building Fund, Charity, Old-Age, Etc..</small>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
       
    </div>
    <!--Second form ends here-->

    <!--Third form starts here-->
    <div class="container mt-5">
        
            <div class="card-body">
                
                <!-- Devotee/Donor Info Sub-heading -->
                <h4 class="card-subtitle mb-4">Devotee/Donor Info</h4>
                <!-- Devotee/Donor Info Form -->
                <form id="devotee_donor_info_form">
                    <!-- Name, Email, and Profession/Work/Business in one line -->
                    <div class="mb-3 row">
                        <div class="col-sm-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Devika rao" name="name" required />
                        </div>
                        <div class="col-sm-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="devika@example.com" name="email" required />
                           
                        </div>
                        <div class="col-sm-4">
                            <label for="profession" class="form-label">Profession/Work/Business</label>
                            <input type="text" class="form-control" id="profession" name="profession" required />
                        </div>
                    </div>
                    <!-- Date of Birth, Anniversary/Special Day, and WhatsApp Number in one line -->
                    <div class="mb-3 row">
                        <div class="col-sm-4">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" />
                        </div>
                        <div class="col-sm-4">
                            <label for="anniversary" class="form-label">Anniversary/Special Day</label>
                            <input type="date" class="form-control" id="anniversary" name="anniversary" />
                        </div>
                        <div class="col-sm-4">
                            <label for="whatsapp" class="form-label">WhatsApp Number</label>
                            <input type="tel" class="form-control" id="whatsapp" name="whatsapp" />
                        </div>
                    </div>
                    <!-- Residence Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Residence Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                    </div>
                    <!-- Previous Button with Arrow -->
                    
                    <!-- Next Button (You can add the Next button here) -->
                </form>
            </div>
       
    </div>
    <!--Third form ends here-->

    <!--Fourth form begins here-->
    <div class="container mt-5">
        
            <div class="card-body">
                
                <!-- Birth Signs/Remarks Sub-heading -->
                <h4 class="card-subtitle mb-4">Birth Signs/Remarks if Any</h4>
                <p class="card-subtitle mb-4">Enter the details in case if only Annadhana Seva or any other Puja</p>
                <!-- Birth Signs/Remarks Form -->
                <form id="birth_signs_remarks_form">
                    <!-- Gothra, Rashi, Nakshatra in one line -->
                    <div class="mb-3 row">
                        <div class="col-sm-4">
                            <label for="gothra" class="form-label">Gothra</label>
                            <input type="text" class="form-control" id="gothra" name="gothra" required />
                        </div>
                        <div class="col-sm-4">
                            <label for="rashi" class="form-label">Rashi</label>
                            <input type="text" class="form-control" id="rashi" name="rashi" required />
                        </div>
                        <div class="col-sm-4">
                            <label for="nakshatra" class="form-label">Nakshatra</label>
                            <input type="text" class="form-control" id="nakshatra" name="nakshatra" required />
                            
                        </div>
                    </div>
                    <!-- Remarks -->
                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
                    </div>
                    <!-- Previous Button with Arrow -->
                    <div class="mb-4 text-center">
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                    <!-- Next Button (You can add the Next button here) -->
                </form>
            </div>
        
    </div>
    <!--Fourth form ends here-->
</div>
    <!-- Content Change Ends Here -->

    <!-- Footer -->
    <?php include("../../inc/footer_data.php"); ?> 
    <!-- / Footer -->

    <?php include("../../inc/footer_script.php"); ?> 

    <script>
        $("#issue_epass").submit(function(e) {
            e.preventDefault();
            var block_ele = $(this).closest('.card');
            block_card(block_ele);
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(),
                success: function(data) {
                    $(".result_ajax").html(data);
                    $(".blockUI").fadeOut("slow").remove(20000);
                }
            });
        });
    </script>
    <script>
    feather.replace();
</script>

</body>
</html>