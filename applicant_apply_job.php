<?php
// ========== inclusing the connection here ============ //
include("Model/Job.php");
//  ================== // ================= // ======= //
$first_name = "";
$last_name = "";
$phone_number = "";
$email = "";
$age = "";
$gender = "";
$cv = "";
$cover_letter = "";
// ============== validating the values here ============== //
function ValidateInputs($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

// ============= the array for the errors ==================== //
$all_errors = array(
    "first_name"=>"", "last_name"=>"", "phone_number"=>"", "email"=>"", "age"=>"",
    "gender"=>"", "cover_letter"=>""
);
// =============== getting values from the form here ================= //
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = ValidateInputs($_POST["first_name"]);
    $last_name = ValidateInputs($_POST["last_name"]);
    $phone_number = ValidateInputs($_POST["phone_number"]);
    $email = ValidateInputs($_POST["email"]);
    $age = ValidateInputs($_POST["age"]);
    $gender = ValidateInputs($_POST["gender"]);
    $cv = ValidateInputs($_POST["cv"]);
    $cover_letter = ValidateInputs($_POST["cover_letter"]);

    // =============== passing the values here =================== //
    if (isset($_POST["save_details"])) {
        if (empty($_POST["first_name"])) {
            $all_errors["first_name"] = "fill in the blanks";
        }
        else {
            if (!preg_match("/^[a-zA-Z]*$/", $first_name)) {
                $all_errors["first_name"] = "provide valid characters";
            }
        }
        // ========================= //========================= //
        if (empty($_POST["last_name"])) {
            $all_errors["last_name"] = "fill in the blanks";
        }
        else {
            if (!preg_match("/^[a-zA-Z]*$/", $last_name)) {
                $all_errors["last_name"] = "provide valid characters";
            }
        }
        // ========================= //========================= //
        if (empty($_POST["phone_number"])) {
            $all_errors["phone_number"] = "fill in the blanks";
        }
        else {
            if (preg_match("/^[a-zA-Z]*$/", $phone_number)) {
                $all_errors["phone_number"] = "provide valid characters";
            }
        }
        // ========================= //========================= //
        if (empty($_POST["email"])) {
            $all_errors["email"] = "fill in the blanks";
        }
        else {
            if (!filter_var(FILTER_VALIDATE_EMAIL, $email)) {
                $all_errors["email"] = "provide valid email please";
            }
        }
        // ========================= //========================= //
        if (empty($_POST["age"])) {
            $all_errors["age"] = "fill in the blanks";
        }
        else {
            if (preg_match("/^[a-zA-Z]*$/", $age)) {
                $all_errors["age"] = "provide valid characters";
            }
        }
        // ========================= //========================= //
        if (empty($_POST["gender"])) {
            $all_errors["gender"] = "fill in the blanks";
        }
        else {
            if (preg_match("/^[a-zA-Z]*$/", $gender)) {
                $all_errors["gender"] = "provide valid characters";
            }
        }

        // ======================== // =============================== //
        if (array_filter($all_errors)) {
            $error_message = "form has errors";
        }
        else {
            // =================== class will be called here ================== //

        }
    }
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
    <!--  ================= // including the top navigation bar here ========= -->
    <div class="top-navigation-bar">
        <?php include("templates/header.php"); ?>
    </div>

    <!-- ============= wthe section for the content will be here -->
    <div class="job-application-title">
        <h1>apply for job here...</h1>
    </div>
    <!-- =============== // ================ // ============== -->
    <div class="container-xxl">
        <div class="row">
            <div class="col-lg-12">
                <div class="job-application-page shadow-sm">
                    <form action="applicant_apply_job.php" method="POST" class="job-application-form">
                        <div class="row mb-3">
                            <div class="col ms-3">
                                <label for="FirstName">
                                    <span class="fw-bold">first name</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                    <input type="text" name="first_name" class="form-control form-control-lg" placeholder="first name">
                                </div>
                                <div class="error-message">
                                    <?php echo($all_errors["first_name"]); ?>
                                </div>
                            </div>
                            <!-- ================= // ================= // -->
                            <div class="col me-3">
                                <label for="LastName">
                                    <span class="fw-bold">last name</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                    <input type="text" name="last_name" class="form-control form-control-lg" placeholder="last name">
                                </div>
                                <div class="error-message">
                                    <?php echo($all_errors["last_name"]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- ===================== thank you jesus christ please forgive me ================ -->
                        <div class="row mb-3">
                            <div class="col ms-3">
                                <label for="PhoneNumber">
                                    <span class="fw-bold">phone number</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                    <input type="text" name="phone_number" class="form-control form-control-lg" placeholder="phone number...">
                                </div>
                                <div class="error-message">
                                    <?php echo($all_errors["phone_number"]); ?>
                                </div>
                            </div>
                            <!-- ================= // ================= // -->
                            <div class="col me-3">
                                <label for="Email">
                                    <span class="fw-bold">Email</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="email">
                                </div>
                                <div class="error-message">
                                    <?php echo($all_errors["email"]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- ======================= // for the gender here // ================ -->
                        <div class="row mb-3">
                            <div class="col ms-3">
                                <label for="Age">
                                    <span class="fw-bold">Age</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                    <input type="number" name="age" class="form-control form-control-lg" placeholder="enter age...">
                                </div>
                                <div class="error-message">
                                    <?php echo($all_errors["age"]); ?>
                                </div>
                            </div>
                            <!-- ================= // ================= // -->
                            <div class="col me-3">
                                <label for="LastName">
                                    <span class="fw-bold">gender</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                    <select name="gender" id="" class="form-control form-control-lg">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                   
                                </div>
                                <div class="error-message">
                                    <?php echo($all_errors["gender"]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- ============= the section for applying for a job here ========= -->
                        <div class="row">
                            <div class="col ms-3">
                                <label for="ForFile">
                                    <span class="fw-bold"><i class="bi bi-file-earmark-person me-2"></i>Select Cv File</span>
                                </label>
                                <div class="input-group">
                                    <input type="file" class="form-control form-control-lg" name="cv">
                                </div>
                            </div>
                            <!-- ============== // ================ // -->
                            <div class="col me-3">
                                <label for="ForCoverLetter">
                                    <span class="fw-bold"><i class="bi bi-postcard me-2"></i>Upload Cover Letter</span>
                                </label>
                                <div class="input-group">
                                    <input type="file" class="form-control form-control-lg" name="cover_letter">
                                </div>
                            </div>
                        </div>

                        <!-- =============== the section for the form here =========== -->
                        <div class="save-details-btn mt-3 ms-3">
                            <input type="submit" value="Apply for job" class="btn btn-primary" name="save_details">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>