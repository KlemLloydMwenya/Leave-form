<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/leave_form_style.css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/dark-hive/jquery-ui.css" />

    <title>CBU-IBIC Leave Form</title>
</head>

<link rel="icon" href="img/cbu_logo.jpg" type="image/x-icon" />

<body>

    <!--Header Section-->

    <header>
        <div class="logo">
            <img src="img/cbu_logo.jpg" alt="CBU_Logo" />
        </div>
        <h1>The Copperbelt University</h1>
        <h2>Office of The Registrar</h2>
        <h3>Leave Form</h3>
    </header>

    <div class="section">
        <form enctype="multipart/form-data" action="includes/post_data.php" method="POST" id="theForm">

            <!--Part 1-->

            <div class="parts_header">
                <h4 class="lead_header">Part I:</h4>
                <h4>Applicant</h4>
            </div>

            <div class="part1_a parts">

                <?php
                if (isset($_GET['name'])) {
                    $nameValue = $_GET['name'];
                    echo '                    
                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="Full name..." value="' . $nameValue . '" />';
                } else {
                    echo '                    
                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="Full name..." />';
                }

                if (isset($_GET['position'])) {
                    $positionValue = $_GET['position'];
                    echo '                    
                    <label for="position">Position:</label>
                    <input type="text" name="position" placeholder="Job title..." value="' . $positionValue . '" />';
                } else {
                    echo '                    
                    <label for="position">Position:</label>
                    <input type="text" name="position" placeholder="Job title..." />';
                }

                ?>
            </div>
            <div class="part1_b parts">
                <?php
                if (isset($_GET['employee_number'])) {
                    $manNumberValue = $_GET['employee_number'];
                    echo ' 
                    <label for="id">Employee no.:</label>
                    <input type="text" name="employee_number" placeholder="Work Id Number..." onkeyup="alphanumericOnly(this)" value="' . $manNumberValue . '" />';
                } else {
                    echo '
                    <label for="id">Employee no.:</label>
                    <input type="text" name="employee_number" placeholder="Work Id Number..." onkeyup="alphanumericOnly(this)" />';
                }

                if (isset($_GET['department'])) {
                    $departmentValue = $_GET['department'];
                    echo ' 
                    <label for="department">School/Department:</label>
                    <input type="text" name="department" placeholder="School or Department..." value="' . $departmentValue . '" />';
                } else {
                    echo '
                    <label for="department">School/Department:</label>
                    <input type="text" name="department" placeholder="School or Department..." />';
                }
                ?>
            </div>

            <!--Part 2-->

            <div class="parts_header">
                <h4 class="lp_headline">Leave Particulars</h4>
            </div>
            <div class="part2_a parts">
                <label for="request">Kindly approve my leave request from</label>
                <input type="date" name="start_date" id="start_date" placeholder="Click calender icon" />
                <label>To</label>
                <input type="date" name="end_date" id="end_date" placeholder="Click calender icon" disabled />
            </div>
            <div class="part2_b parts">
                <label for="vacation" class="checkbox_cells" id="vac_div">
                    <label for="vacation">Vacation</label>
                    <input type="checkbox" class="vac_check" id="vacation" name="leave_type" />
                </label>
                <label for="local" class="checkbox_cells" id="local_div">
                    <label for="local">Local. Non Cumulative</label>
                    <input type="checkbox" id="local" class="local" name="leave_type" />
                    <!--oninput="extractLabel()" -->
                </label>
                <label for="special" class="checkbox_cells" id="special_div">
                    <label for="special">Special Leave</label>
                    <input type="checkbox" class="special" id="special" name="leave_type" />
                </label>
                <label for="maternity" class="checkbox_cells" id="maternity_div">
                    <label for="maternity">Maternity Leave</label>
                    <input type="checkbox" class="maternity" id="maternity" name="leave_type" />
                </label>
            </div>
            <div class="part2_c parts">
                <label for="paid" class="checkbox_cells" id="paid_div">
                    <label for="paid">Paid Leave</label>
                    <input type="checkbox" class="paid" id="paid" name="leave_type" />
                </label>
                <label for="unpaid" class="checkbox_cells" id="unpaid_div">
                    <label for="unpaid">Unpaid Leave</label>
                    <input type="checkbox" class="unpaid" id="unpaid" name="leave_type" />
                </label>
                <label for="compassionate" class="checkbox_cells" id="compassionate_div">
                    <label for="compassionate">Compassionate Leave</label>
                    <input type="checkbox" class="compassionate" id="compassionate" name="leave_type" />
                </label>
                <label for="sick" class="checkbox_cells" id="sick_div">
                    <label for="sick">Sick Leave</label>
                    <input type="checkbox" class="sick" id="sick" name="leave_type" onclick="cleanBoxShadow(this)" />
                </label>

            </div>
            <div class="part2_c_i parts">
                <?php

                if (isset($_GET['selected_leave_type'])) {
                    $leaveTypeValue = $_GET['selected_leave_type'];
                    echo ' 
                    <label for="selectedLeaveType">Selected Leave Type</label>
                    <input type="text" name="selected_leave_type" id="selectedLeaveType" value="' . $leaveTypeValue . '" />';
                } else {
                    echo '
                    <label for="selectedLeaveType">Selected Leave Type</label>
                    <input type="text" name="selected_leave_type" id="selectedLeaveType" />';
                }

                ?>

            </div>

            <div class="leave_days_numbers">
                <div class="part2_d parts">
                    <?php
                    if (isset($_GET['days'])) {
                        $requestedDaysValue = $_GET['days'];
                        echo ' 
                        <label for="days">Number of Days Requested:</label>
                        <input type="number" placeholder="00" name="days" id="days" value="' . $requestedDaysValue . '" />';
                    } else {
                        echo '
                        <label for="days">Number of Days Requested:</label>
                        <input type="number" placeholder="00" name="days" id="days" />';
                    }

                    ?>

                </div>
                <div class="part2_e parts">
                    <?php
                    if (isset($_GET['commutation'])) {
                        $commutationValue = $_GET['commutation'];
                        echo ' 
                        <label for="commutation">Commutation of</label>
                        <input type="number" placeholder="00" name="commutation" id="commutation" value="' . $commutationValue . '" />
                        <label for="commutation">Leave Days for Cash</label>';
                    } else {
                        echo '
                        <label for="commutation">Commutation of</label>
                        <input type="number" placeholder="00" name="commutation" id="commutation" />
                        <label for="commutation">Leave Days for Cash</label>';
                    }

                    ?>
                </div>
            </div>

            <div class="file_attach">
                <p>(A signed and date-stamped Medical Certificate to be attached in case of sick leave.)</p>
                <input type="file" name="medical" id="medical" accept="application/pdf, image/*" />
            </div>
            <label for="text_area">Reasons for Leave:</label>
            <textarea type="text" class="textarea resize-ta" name="text" maxlength="150" onkeyup="textAreaAdjust(this)" placeholder="Enter text here... (Auto-Expanding Textarea)"></textarea>

            <button type="submit" value="submit" name="submit">Submit</button>

        </form>
    </div>

    <div class="footer_separator"></div>

    <footer class="center bg_dark">
        <div id="footer-inner">
            &copy;
            <span id="copyright">
                <script>
                    document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                </script>
            </span>
            CBU-IBIC
        </div>
    </footer>

    <!--Scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="js/cbu_ibic_lf.js"></script>



    <?php
    require_once 'includes/error_messages.php';
    ?>
</body>

</html>