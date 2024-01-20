<?php
// ---------------// including the class here // ===============//
include("Model/Job.php");
$connection = new Connection("localhost", "root", "", "SmartWayConstruction");
// ==========getting values from the form here =============== //
$job_title = "";
$job_location = "";
$job_type = "";
$email = "";
$job_description = "";
$company_overview = "";
$application_instruction = "";
$query_phone_number = "";
$application_deadline = "";
$id_to_update = "";

// ========== function to validate the information here
function ValidateInputs($data) {
    try {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;

    }catch(Exception $ex) {
        print($ex);
    }
}

// ============== function to fetch the records here ================ //
function FetchSingleRecord() {
    try {
        // =========== getting the connection here ============ //
        $connection = new Connection("localhost", "root", "", "SmartWayConstruction");
        // ==========getting values from the form here =============== //
        $connection->EstablishConnection();
        $conn = $connection->get_connection();

        // fetching the record here
        if (isset($_GET["update_id"])) {
            $id_to_update = mysqli_real_escape_string($conn, $_GET["update_id"]);
            // getting the database records here
            $sqlCommand = "SELECT * FROM JobDetails WHERE job_id = $id_to_update";
            $results = mysqli_query($conn, $sqlCommand);
            // ================= converting the results to an associative array
            $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);
            // returning the values here
            foreach($all_results as $single_record) {
                return $single_record;
            }
            
        }
    }catch(Exception $ex) {
        print($ex);
    }
}

$single_record = FetchSingleRecord(); // calling the fecth function here
print_r($single_record);
// checking the values here
$all_errors = array("job_title"=>"", "job_location"=>"", "job_type"=>"", "email"=>"",
"job_description"=>"", "company_overview"=>"", "qualification"=>"", "technical_skills"=>"",
"benefits"=>"", "application_instruction"=>"", "query_phone_number"=>"", "application_deadline"=>"");
//  =================== checking if the values are empty or not here ============= //
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_title = ValidateInputs($_POST["job_title"]);
    $job_location = ValidateInputs($_POST["job_location"]);
    $job_type = ValidateInputs($_POST["job_type"]);
    $email = ValidateInputs($_POST["email"]);
    $job_description = ValidateInputs($_POST["job_description"]);
    $company_overview = ValidateInputs($_POST["company_overview"]);
    $application_instruction = ValidateInputs($_POST["application_instruction"]);
    $query_phone_number = ValidateInputs($_POST["query_phone_number"]);
    $application_deadline = ValidateInputs($_POST["application_deadline"]);

    //  =============== checking the inputs here ===========//
    if (isset($_POST["update_job_details"])) {
        // ================ validations here ===================//
        if (empty($_POST["job_title"])) {
            $all_errors["job_title"] = "fill in the blanks";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $job_title)) {
                $all_errors["job_title"] = "enter valid characters";
            }
        }
        // ================ validations here ===================//
        if (empty($_POST["job_location"])) {
            $all_errors["job_location"] = "fill in the blanks";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $job_location)) {
                $all_errors["job_location"] = "enter valid characters";
            }
        }
        // ================ validations here ===================//
        if (empty($_POST["job_type"])) {
            $all_errors["job_type"] = "fill in the blanks";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $job_type)) {
                $all_errors["job_type"] = "enter valid characters";
            }
        }
        // =========== validating the email field here ===========//
        if (empty($_POST["email"])) {
            $all_errors["email"] = "provide email";
        }
        else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $all_errors["email"] = "enter valide email";
            }
        }
        // =========== validating the email field here ===========//
        if (empty($_POST["query_phone_number"])) {
            $all_errors["query_phone_number"] = "provide email";
        }
        else {
            if(preg_match("/^[a-zA-Z-' ]*$/", $query_phone_number)) {
                $all_errors["query_phone_number"] = "enter valide phone number";
            }
        }
        // =========== validating the email field here ===========//
        if (empty($_POST["application_deadline"])) {
            $all_errors["application_deadline"] = "provide email";
        }
        else {
            if(preg_match("/^[a-zA-Z-' ]*$/", $application_deadline)) {
                $all_errors["application_deadline"] = "enter valide phone number";
            }
        }

        // ========= checking if the form has errors here ============== //
        if (!array_filter($all_errors)) {
            // getting the values from the form here
            // getting the connection here
            $connection->EstablishConnection();
            $conn = $connection->get_connection();
            $job_title = mysqli_real_escape_string($conn, $_POST["job_title"]);
            $job_location = mysqli_real_escape_string($conn, $_POST["job_location"]);
            $job_type = mysqli_real_escape_string($conn, $_POST["job_type"]);
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $job_description = mysqli_real_escape_string($conn, $_POST["job_description"]);
            $company_overview = mysqli_real_escape_string($conn, $_POST["company_overview"]);
            $qualification = mysqli_real_escape_string($conn, $_POST["qualification"]);
            $technical_skills = mysqli_real_escape_string($conn, $_POST["technical_skills"]);
            $benefits = mysqli_real_escape_string($conn, $_POST["benefits"]);
            $application_instruction = mysqli_real_escape_string($conn, $_POST["application_instruction"]);
            $query_phone_number = mysqli_real_escape_string($conn, $_POST["query_phone_number"]);
            $application_deadline = mysqli_real_escape_string($conn, $_POST["application_deadline"]);

            // ============= calling the class here ================//
            $job = new Job(
                $job_title, $job_location, $job_type, $email, $job_description, $company_overview,
                $qualification, $technical_skills, $benefits, $application_instruction,
                $query_phone_number, $application_deadline
            );
            // =============== getting the function to update the records here ======== //
            $job->UpdateJobDetails($id_to_update);
            $success_message = "job details updated successfully";
            //header("Location: administrator_job_records.php");
        }
        else {
            $error_message = "something is wrong";
        }

    }
    // ================== validations continues here ==============//
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- including the side navigation bar here -->
    <div class="main-content-container">
        <div class="side-navigation-area">
            <!-- the dashboard side navigation will be here -->
            <?php include("administrator_sidebar.php"); ?>
        </div>
        
        <div class="content-area">
            <!-- the content for the system will be here -->
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- the form for the job details will be here for the system -->
                        <div class="job-details-form-page shadow-sm">
                            <!-- ============ // the success message will be here ==========  -->
                            <div class="success-message mt-3 me-3 w-50 fw-bolder text-light">
                                    <?php if (isset($success_message)) : ?>
                                        <div id="successAlert" class="alert alert-success" role="alert">
                                            <?php echo $success_message; ?>
                                        </div>
                                        <script>
                                            // Automatically dismiss the success alert after 5 seconds
                                            setTimeout(function() {
                                                document.getElementById("successAlert").style.display = "none";
                                            }, 5000);
                                        </script>
                                    <?php elseif (isset($error_message)) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo($error_message); ?>
                                        </div>
                                    <?php endif; ?>
                            </div>

                            <form action="administrator_update_job.php" method="POST">
                                <!-- ============ the foreach loop will be here -->
                                <div class="row mb-3">
                                    <div class="col ms-3 mt-5">
                                        <label for="JobTitle fw-bolder">Job Title</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                            <input type="text" class="form-control form-control-lg" placeholder="job title" name="job_title" value="<?php echo($single_record["job_title"]); ?>">
                                        </div>
                                        <!-- ============ the div for showing the error message here -->
                                        <div class="error-message">
                                            <?php echo($all_errors["job_title"]); ?>
                                        </div>
                                    </div>
                                    <!-- ==================== the other control will be here ========== -->
                                    <div class="col me-3 mt-5">
                                        <label for="JobLocation fw-bolder">Job Location</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                            <input type="text" class="form-control form-control-lg" placeholder="job location..." name="job_location" value="<?php echo($single_record["job_location"]); ?>">
                                        </div>
                                        <!-- ============ the div for showing the error message here -->
                                        <div class="error-message">
                                            <?php echo($all_errors["job_location"]); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- ================= the other row for the main form here ============ -->
                                <div class="row mb-3">
                                    <div class="col ms-3">
                                        <label for="JobTitle fw-bolder">Job Type</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-feather"></i></span>
                                            <input type="text" class="form-control form-control-lg" placeholder="job type" name="job_type" value="<?php echo($single_record["job_type"]); ?>">
                                        </div>
                                        <!-- ============ the div for showing the error message here -->
                                        <div class="error-message">
                                            <?php echo($all_errors["job_type"]); ?>
                                        </div>
                                    </div>
                                    <!-- ==================== the other control will be here ========== -->
                                    <div class="col me-3">
                                        <label for="JobLocation fw-bolder">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-envelope-arrow-up"></i></span>
                                            <input type="email" class="form-control form-control-lg" placeholder="email" name="email" value="<?php echo($single_record["email"]); ?>">
                                        </div>
                                        <!-- ============ the div for showing the error message here -->
                                        <div class="error-message">
                                            <?php echo($all_errors["email"]); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- =========== the row for the other part of the form -->
                                <div class="row mb-3">
                                    <div class="col ms-3 me-3">
                                        <label for="JobDescription">Job Description</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-file-bar-graph"></i></span>
                                            <textarea name="job_description" id="" class="form-control form-control-lg text-start">
                                                <?php echo($single_record["job_description"]); ?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- =========== the row for the other part of the form -->
                                <div class="row mb-3">
                                    <div class="col ms-3 me-3">
                                        <label for="JobDescription">Company Overview</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-tree"></i></span>
                                            <textarea name="company_overview" id="" class="form-control form-control-lg">
                                                <?php echo($single_record["job_description"]); ?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- ============= // occupational history area -->
                                <div class="occupational-history">
                                    <h3>Qualifications</h3>
                                    <!-- ==============/for the occupation history here/================= -->
                                    <div class="row g-2 mb-2">
                                        <div class="col ms-3">
                                            <!-- =======================//================= -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Certificate" name="qualification" <?php echo ($single_record["qualification"] === "Certificate") ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="inlineCheckbox1">Certificate</label>
                                            </div>
                                            <!-- ==================//================= -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Diploma" name="qualification" <?php echo ($single_record["qualification"] === "Diploma") ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="inlineCheckbox2">Diploma</label>
                                            </div>
                                            <!-- ======================== // =============== -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Advanced Diploma" name="qualification" <?php echo ($single_record["qualification"] === "Advanced Diploma") ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="inlineCheckbox1">Advanced Diploma</label>
                                            </div>

                                            <!-- ================//================ -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Degree" name="qualification" <?php echo ($single_record["qualification"] === "Degree") ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="inlineCheckbox2">Degree</label>
                                            </div>
                                            <!-- ===============//=============== -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Masters Degree" name="qualification" <?php echo ($single_record["qualification"] === "Masters Degree") ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="inlineCheckbox2">Masters Degree</label>
                                            </div>
                                            <!-- ===============//=============== -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Retired" name="qualification" <?php echo ($single_record["qualification"] === "Retired") ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="inlineCheckbox2">Retired</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- ============= // occupational history area -->
                                <div class="Technical_skills">
                                    <h3>Technical Skills</h3>
                                    <!-- ==============/for the occupation history here/================= -->
                                    <div class="row g-2 mb-2">
                                        <div class="col ms-3">
                                            <!-- =======================//================= -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Construction Management" name="technical_skills" <?php echo ($single_record["qualification"] === "Construction Management") ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="inlineCheckbox1">Construction Management</label>
                                            </div>
                                            <!-- ==================//================= -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Civil Engineering" name="technical_skills" <?php echo ($single_record["qualification"] === "Civil Engineering") ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="inlineCheckbox2">Civil Engineering</label>
                                            </div>
                                            <!-- ===================//=============== -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Archtectural Design" name="technical_skills" <?php echo ($single_record["qualification"] === "Archtecrural Design") ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="inlineCheckbox1">Archtectural Design</label>
                                            </div>
                                            <!-- ================//================ -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Auto CAD and Building Information Modeling (BIM)" name="technical_skills" <?php echo ($single_record["qualification"] === "Auto CAD and Building Information Modeling (BIM)") ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="inlineCheckbox2">Auto CAD and Building Information Modeling (BIM)</label>
                                            </div>
                                            <!-- ===============//=============== -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Surveying and Site Planning" name="technical_skills" <?php echo ($single_record["qualification"] === "Surveying and Site Planning") ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="inlineCheckbox2">Surveying and Site Planning</label>
                                            </div>
                                            <!-- ===============//=============== -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Project management" name="technical_skills" <?php echo ($single_record["qualification"] === "Project Management") ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="inlineCheckbox2">Project Management</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ================= the area for the exeprience level and application deadline ====== -->
                                <!-- ================ // the control for the residental place here======= -->
                                <div class="checking-history-status">
                                    <h3>Benefits</h3>
                                    <p class="lead">Select all the benefts that will be associated with the 
                                        job application you are about to post to the applicants if any..
                                    </p>
                                </div>

                                <!-- ===============// the history controls will be here ====== -->
                                <div class="row g-2 mb-2">
                                    <div class="col ms-3">
                                        <!-- =======================//================= -->
                                        <label for="FirstName" class="form-label-lg ms-2 bold">
                                            <span class="fw-bold">Select all that apply:</span>
                                        </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Health Insurance" name="benefits" <?php echo ($single_record["qualification"] === "Health Insurance") ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineCheckbox1">Health Insurance</label>
                                        </div>
                                        <!-- ==================//================= -->
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Retirement Plans" name="benefits" <?php echo ($single_record["qualification"] === "Retirement Plans") ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineCheckbox2">Retirement Plans</label>
                                        </div>
                                        <!-- ================//================ -->
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Professional and Development Opportunities" name="benefits" <?php echo ($single_record["qualification"] === "Professional and Development Opportunities") ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineCheckbox2">Professional and Development Opportunities</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- ================ // the application instructions page//=============== -->
                                <div class="application-instructions">
                                    <h3>Application Instructions</h3>
                                    <p class="lead">
                                        Provide a decription that includes how the selection process,
                                        is conducted, and also specify if there are any requirements that 
                                        are required for the application to be a success.
                                    </p>
                                </div>
                                <!-- =========== the row for the other part of the form -->
                                <div class="row mb-3">
                                    <div class="col ms-3 me-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-journal-text"></i></span>
                                            <textarea name="application_instruction" id="" class="form-control form-control-lg">
                                                <?php echo($single_record["application_instruction"]); ?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- ============== // the controls for the application deadline will be here === -->
                                <div class="row g-2 mb-2">
                                    <div class="col ms-3">
                                        <label for="GuardianSignature" class="">Phone number</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-yelp"></i></span>
                                            <input type="text" class="form-control form-control-lg" name="query_phone_number" placeholder="phone number.." value="<?php echo($single_record["query_phone_number"]); ?>">
                                        </div>
                                        <!-- ============ the div for showing the error message here -->
                                        <div class="error-message">
                                            <?php echo($all_errors["query_phone_number"]); ?>
                                        </div>
                                    </div>
                                    <!-- input for the form here -->
                                    <div class="col me-3">
                                        <label for="SignatureDate" class="">Application Dealine</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-dash-square-dotted"></i></span>
                                            <input type="text" class="form-control form-control-lg" value="12-02-2024" id="ApplicationDeadlineDate" name="application_deadline" value="<?php echo($single_record["application_deadline"]); ?>">
                                        </div>
                                        <!-- ============ the div for showing the error message here -->
                                        <div class="error-message">
                                            <?php echo($all_errors["application_deadline"]); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- ============== // the css for the button will be here ======= -->
                                <div class="save-details-button mt-4 ms-3">
                                    <button type="submit" name="update_job_details" class="btn btn-info btn-lg">
                                        <span><i class="bi bi-arrow-clockwise"></i></span>Update job details
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Your Datepicker Initialization Script -->
    <script type="text/javascript">
        // ============getting the signature date here
        $(document).ready(function () {
            // Initialize the datepicker
            $.fn.datepicker.defaults.format = "mm/dd/yyyy";
            $('#ApplicationDeadlineDate').datepicker({
                autoclose: true
            });
        });
        // ============= the code for the input validations ===============//
    </script>
</body>
</html>