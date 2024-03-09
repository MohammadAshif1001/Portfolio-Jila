<?php
$page = 'Activities';
ob_start();
unset($_SESSION['otp']);
include "admin/include/connection.php";
include "headerforoffer.php";
if (empty($_SESSION['otp'])) {
    header('Location:otp-verification?verify-otp-first');}
if (empty($_SESSION['email_id'])) {
    header('Location:login?login-first');
} else {
    $user_email = $_SESSION['email_id'];
    $user_name = $_SESSION['username'];
    $U_id = $_SESSION['user_id'];
?>
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }
    </style>
    <link rel="stylesheet" href="styles/activites.css">
    <div class="container4">
        <!--Profile -->
        <div class="coupon-card5" style="color:#000;">
            <div class="user-details">
                <div class='user-logo'>
                    <i class='bx bxs-user-circle' style='font-size:2.5rem; margin: 5px;'></i>
                </div>
                <div class='user-name' style="border: none;">
                    <span><?php echo $user_name; ?></span>
                </div>
                <div class='user-name' style="padding-bottom: 0.6rem; border:none;">
                    <i class="fas fa-envelope"> <?php echo ' ' . $user_email; ?></i>
                </div>
            </div>
            <!-- =====User reports===== -->
            <div class="withdraw">
                <div class='withdraw-div'>
                    <div class='user-report'>
                        <i class="fa fa-solid fa-wallet"></i>
                        <!-- fetch available amount from server -->
                        <?php
                        $fetch_user_balance = "SELECT `avl_amoun_t` FROM user WHERE `Id` = '{$U_id}'";
                        $run_fetch_cmnd = mysqli_query($conn, $fetch_user_balance);
                        $balance = mysqli_fetch_assoc($run_fetch_cmnd);
                        $available_amounts = $balance['avl_amoun_t'];
                        ?>
                        <span>&#8377; <?php echo $available_amounts; ?></span>
                        <button id="btn">Available Ballance</button>
                        <div class="select-bank">
                            <span>Withdraw Through</span>
                            <select>
                                <option value="bank" selected>Bank</option>
                                <option value="paytm">Paytm</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>


            <?php


            if (isset($_POST['withdraw_bank'])) {
                $mobile_num = mysqli_real_escape_string($conn, $_POST['mobail_number']);
                $a_h_name = mysqli_real_escape_string($conn, $_POST['a_h_name']);
                $bank_name = mysqli_real_escape_string($conn, $_POST["bank_name"]);
                $account_number = mysqli_real_escape_string($conn, $_POST['account_number']);
                $IFSC_code = mysqli_real_escape_string($conn, $_POST["IFSC_code"]);
                $amount = mysqli_real_escape_string($conn, $_POST["amount"]);

                if ($available_amounts >= $amount) {
                    $send_to_server = "INSERT INTO `withdrawal_request_bank`(`user_name`,`user_mail`, `user_mobail_number`, `bank_name`, `acount_holder_name`, `ifsc_code`, `account_number`,`amount`,`date`)
                    VALUES ('{$user_name}','{$user_email}','{$mobile_num}','{$bank_name}','{$a_h_name}','{$IFSC_code}','{$account_number}','{$amount}',NOW())";

                    if (mysqli_query($conn, $send_to_server)) {
                        $update_ballance = "UPDATE `user`
                        SET `avl_amoun_t`= avl_amoun_t - $amount WHERE `Id` = '{$U_id}'";
                        if (mysqli_query($conn, $update_ballance)) {
                            $genrate_history = "INSERT INTO `withdrawal_history`(`User_id`, `Amount`, `Status`, `Request_date`)
                            VALUES ('{$U_id}','{$amount}','0',NOW())";
                            $genrate = mysqli_query($conn, $genrate_history);

                            echo "<script>
                            alert('Accsepted your withdrawl request' );
                                 </script>
                                    ";
                        } else {
                            echo "<script>
                                        alert('Declined your withdrawl request');
                                   </script>
                                    ";
                        }
                    }
                } else {
                    echo "<script>
                        alert('Incuficient Ballance');
                    </script>
                                ";
                }
            }

            ?>

            <div class="withdraw">
                <div class='withdraw-div'>
                    <!-- Form -->
                    <form name="bank" id="bank" method="POST" enctype="multipart/form-data" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                        <div class="top-header">
                            <i class='bx bxs-bank'></i>
                            <span style="margin-bottom: 2rem;">Enter Bank Account Details</span>
                        </div>
                        <div class="withdraw-form">
                            <input id="a_h_name" type="text" name="a_h_name" oninput="this.value = this.value.toUpperCase()" class="form-control" autocomplete="off" required>
                            <span>Account Holder Name</span>
                        </div>
                        <div class="withdraw-form">
                            <input type="number" id="account_number" maxlength="18" name="account_number" class="form-control" autocomplete="off" required>
                            <span>Account Number</span>
                        </div>
                        <div class="withdraw-form">
                            <select style="margin-bottom:2rem;" name="bank_name" class="form-control" required>
                                <option selected="selected" value="0">--Select Bank --</option>
                                <option value="ALLAHABAD BANK">ALLAHABAD BANK</option>
                                <option value="ANDHRA BANK">ANDHRA BANK</option>
                                <option value="AXIS BANK">AXIS BANK</option>
                                <option value="STATE BANK OF INDIA">STATE BANK OF INDIA</option>
                                <option value="BANK OF BARODA">BANK OF BARODA</option>
                                <option value="UCO BANK">UCO BANK</option>
                                <option value="UNION BANK OF INDIA">UNION BANK OF INDIA</option>
                                <option value="BANK OF INDIA">BANK OF INDIA</option>
                                <option value="BANDHAN BANK LIMITED">BANDHAN BANK LIMITED</option>
                                <option value="CANARA BANK">CANARA BANK</option>
                                <option value="INDIAN BANK">INDIAN BANK</option>
                                <option value="PUNJAB AND SIND BANK">PUNJAB AND SIND BANK</option>
                                <option value="PUNJAB NATIONAL BANK">PUNJAB NATIONAL BANK</option>
                                <option value="SOUTH INDIAN BANK">SOUTH INDIAN BANK</option>
                                <option value="UNITED BANK OF INDIA">UNITED BANK OF INDIA</option>
                                <option value="CENTRAL BANK OF INDIA">CENTRAL BANK OF INDIA</option>
                                <option value="VIJAYA BANK">VIJAYA BANK</option>
                                <option value="DENA BANK">DENA BANK</option>
                                <option value="BHARATIYA MAHILA BANK LIMITED">BHARATIYA MAHILA BANK LIMITED</option>
                                <option value="FEDERAL BANK LTD ">FEDERAL BANK LTD </option>
                                <option value="HDFC BANK LTD">HDFC BANK LTD</option>
                                <option value="ICICI BANK LTD">ICICI BANK LTD</option>
                                <option value="IDBI BANK LTD">IDBI BANK LTD</option>
                                <option value="PAYTM BANK">PAYTM BANK</option>
                                <option value="FINO PAYMENT BANK">FINO PAYMENT BANK</option>
                                <option value="INDUSIND BANK LTD">INDUSIND BANK LTD</option>
                                <option value="KARNATAKA BANK LTD">KARNATAKA BANK LTD</option>
                                <option value="KOTAK MAHINDRA BANK">KOTAK MAHINDRA BANK</option>
                                <option value="YES BANK LTD">YES BANK LTD</option>
                                <option value="SYNDICATE BANK">SYNDICATE BANK</option>
                                <option value="BANK OF INDIA">BANK OF INDIA</option>
                                <option value="BANK OF MAHARASHTRA">BANK OF MAHARASHTRA</option>
                            </select>
                        </div>
                        <div class="withdraw-form">
                            <input id="IFSC_code" type="text" oninput="this.value = this.value.toUpperCase()" maxlength="11" name="IFSC_code" class="form-control" autocomplete="off" required>
                            <span>IFSC Code</span>
                        </div>
                        <div class="withdraw-form">
                            <input type="number" pattern="[6789][0-9]{9}" title="Please enter valid phone number" name="mobail_number" class="form-control" autocomplete="off" required>
                            <span>Mobile Number</span>
                        </div>
                        <div class="withdraw-form">
                            <input id="amount" type="number" min="150" max="10000" name="amount" class="form-control" autocomplete="off" required>
                            <span>Amount</span>
                        </div>
                        <input style="margin: 1em;" type="submit" name="withdraw_bank" class="btn btn-primary" value="Withdraw Now" required />
                    </form>
                    <!--/Form -->



                    <!-- Form2 -->


                    <?php


                    if (isset($_POST['withdraw_paytm'])) {
                        $mobile_num = mysqli_real_escape_string($conn, $_POST['mobail_number']);
                        $a_h_name = mysqli_real_escape_string($conn, $_POST['a_h_name']);
                        $account_number = mysqli_real_escape_string($conn, $_POST['account_number']);
                        $amount = mysqli_real_escape_string($conn, $_POST["amount"]);

                        if ($available_amounts >= $amount) {
                            $send_to_server1 = "INSERT INTO `withdrawal_request_paytm`(`user_name`,`user_mail`, `user_mobail_number`, `acount_holder_name`, `account_number`,`amount`,`date`)
                            VALUES ('{$user_name}','{$user_email}','{$mobile_num}','{$a_h_name}','{$account_number}','{$amount}',NOW())";

                            if (mysqli_query($conn, $send_to_server1)) {
                                $update_ballance = "UPDATE `user`
                                SET `avl_amoun_t`= avl_amoun_t - $amount WHERE `Id` = '{$U_id}'";
                                if (mysqli_query($conn, $update_ballance)) {
                                    $genrate_history = "INSERT INTO `withdrawal_history`(`User_id`, `Amount`, `Status`, `Request_date`)
                                    VALUES ('{$U_id}','{$amount}','0',NOW())";
                                    $genrate = mysqli_query($conn, $genrate_history);

                                    echo "<script>
                                            alert('Accsepted your withdrawl request');
                                            window.location.href = window.location.href;
                                            </script>
                                                    ";
                                } else {
                                    echo "<script>
                                                alert('Declined your withdrawl request');
                                        </script>
                                            ";
                                }
                            }
                        } else {
                            echo "<script>
                                        alert('Incuficient Ballance');
                                    </script>
                                                ";
                        }
                    }

                    ?>

                    <form style="display:none;" id="paytm" name="paytm" method="POST" enctype="multipart/form-data" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                        <div class='top-header'>
                            <i><img src="logo/paytm-withdraw.png" style="width: 5rem;"></i>
                            <span style="margin-bottom: 2rem;">Enter Your Paytm Account Details</span>
                        </div>
                        <div class="withdraw-form">
                            <input type="text" oninput="this.value = this.value.toUpperCase()" name="a_h_name" class="form-control" autocomplete="off" required>
                            <span>Paytm User Name</span>
                        </div>
                        <div class="withdraw-form">
                            <input type="number" name="account_number" pattern="[6789][0-9]{9}" title="Please Enter valid Paytm Number" class="form-control" autocomplete="off" required>
                            <span>Paytm Number</span>
                        </div>
                        <div class="withdraw-form">
                            <input type="number" pattern="[6789][0-9]{9}" title="Please enter valid phone number" name="mobail_number" class="form-control" autocomplete="off" required>
                            <span>Mobile Number</span>
                        </div>
                        <div class="withdraw-form">
                            <input id="amount" type="text" name="amount" class="form-control" autocomplete="off" required>
                            <span>Amount</span>
                        </div>
                        <input style="margin: 1em;" type="submit" name="withdraw_paytm" class="btn btn-primary" value="Withdraw Now" required />
                    </form>
                    <!--/Form -->

                </div>
            </div>
        </div>
    </div>
    <!--Withdraw History -->
    <div class="container6">
        <div class="other-data">
            <div class="container6" style="margin-top: 1rem;">
                <div class="coupon-card6" style="color:#000;">
                    <span style="font-family: is_double; border-bottom:1px dashed #000;border-top:1px dashed #000;">Withdraw History</span>
                    <!-- Collect Data From Database -->
                    <div id="table-data">
                        <table id="loadData1" border="1" width="100%">
                            <tr>
                                <th>S.No</th>
                                <th>Withdraw Amount</th>
                                <th>Date</th>
                                <th>In</th>
                                <th>Status</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <script type="text/javascript" src="js/jquery.js"></script>
            <script>
                $(document).ready(function() {
                    // Load Data from Database with Ajax
                    function loadTable1(page) {
                        $.ajax({
                            url: "withdraw-history.php",
                            type: "POST",
                            data: {
                                page_no: page
                            },
                            success: function(data) {
                                if (data) {
                                    $("#pagination1").remove();
                                    $("#loadData1").append(data);
                                } else {
                                    $("#ajaxbtn1").html("Finished");
                                    $("#ajaxbtn1").prop("disabled", true);
                                }
                            }
                        });
                    }
                    loadTable1();

                    // Add Click Event on ajaxbtn
                    $(document).on("click", "#ajaxbtn1", function() {
                        $("#ajaxbtn1").html("Loading...");
                        var pid = $(this).data("id");
                        loadTable1(pid);
                    });
                });
            </script>
        </div>
    </div>


    <?php
    include "hiw/hiw.php";
    include "footer/footer.php";
    ?>
<?php
}
?>
<script>
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
    }
</script>