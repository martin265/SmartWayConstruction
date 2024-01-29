<?php
// ========== inclusing the connection here ============ //
include("Model/Application.php");
//  ================== // ================= // ======= //
$connection = new Connection("localhost", "root", "", "SmartWayConstruction");
$connection->EstablishConnection();
$conn = $connection->get_connection();

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

// ================ function to get the job id here ================== //
function FetchJobID($conn) {
    try {
        if (isset($_GET["job_id"])) {
            $job_id = mysqli_real_escape_string($conn, $_GET["job_id"]);
            $sqlCommand = "SELECT * FROM JobDetails WHERE job_id = '$job_id'";
            $results = mysqli_query($conn, $sqlCommand);
            $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);

            // ============ looping to get the results here ============= //
            foreach($all_results as $single_record) {
                return $single_record["job_id"];
                print($single_record["job_id"]);
            }
        }
    }catch(Exception $ex) {
        print($ex);
    }
}

$job_id = FetchJobID($conn);




// ============== function to get the current Job title here ============//
function getJObTitle($conn) {
    try {
        if (isset($_GET["job_id"])) {
            $job_id = mysqli_real_escape_string($conn, $_GET["job_id"]);
            $sqlCommand = "SELECT job_title FROM JobDetails WHERE job_id = '$job_id'";
            $results = mysqli_query($conn, $sqlCommand);
            $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);
            
            foreach($all_results as $job_title) {
                return $job_title["job_title"];
            }
        }
    }catch(Exception $ex) {
        print($ex);
    }
}

$job_title = getJObTitle($conn);


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
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
            if (!preg_match("/^[a-zA-Z]*$/", $gender)) {
                $all_errors["gender"] = "provide valid characters";
            }
        }

        // ======================== // =============================== //
        if (array_filter($all_errors)) {
            $error_message = "form has errors";
            print($job_title);
        }
        else {
            // =================== class will be called here ================== //
            // Check for file uploads
            if (isset($_FILES['cv']) && isset($_FILES['cover_letter'])) {
                // File upload directory
                $uploadDirectory = "uploads/";
                // Extract first name and last name
                $firstName = ValidateInputs($_POST["first_name"]);
                $lastName = ValidateInputs($_POST["last_name"]);

                // Create a folder for each user based on their first name
                $userFolder = $uploadDirectory . $firstName . '/';

                if (!file_exists($userFolder)) {
                    mkdir($userFolder, 0755, true); // Create the user's folder if it doesn't exist
                }

                // Get file names
                $cvFileName = $_FILES['cv']['name'];
                $coverLetterFileName = $_FILES['cover_letter']['name'];

                // Append first name and last name to file names
                $cvFileNameWithNames = $firstName . '_' . $lastName . '_' . $cvFileName;
                $coverLetterFileNameWithNames = $firstName . '_' . $lastName . '_' . $coverLetterFileName;

                // Set file paths
                $cvFilePath = $userFolder . $cvFileNameWithNames;
                $coverLetterFilePath = $userFolder . $coverLetterFileNameWithNames;

                // Move uploaded files to the specified directory
                move_uploaded_file($_FILES['cv']['tmp_name'], $cvFilePath);
                move_uploaded_file($_FILES['cover_letter']['tmp_name'], $coverLetterFilePath);

                // ============= // calling the class here // ================ //
                $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
                $last_name = mysqli_escape_string($conn, $_POST["last_name"]);
                $phone_number = mysqli_escape_string($conn, $_POST["phone_number"]);
                $email = mysqli_escape_string($conn, $_POST["email"]);
                $age = mysqli_escape_string($conn, $_POST["age"]);
                $gender = mysqli_escape_string($conn, $_POST["gender"]);

                
                // =========== calling the class to save the details here ================= //
                $applicant = new Applicant(
                    $first_name, $last_name, $phone_number, $email, $age, $gender,
                    $cv, $cover_letter, $cvFileName, $coverLetterFileName
                );

               
                // =============== calling the function here =============== //
                //$applicant->SaveApplicantDetails($job_title, $job_id);
            }
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
                    <!-- ============ the form will be here ============= -->
                    <form action="applicant_apply_job.php" method="POST" class="job-application-form" enctype="multipart/form-data">
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
                                    <span class="input-group-text"><i class="bi bi-phone"></i></span>
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
                                    <span class="input-group-text"><i class="bi bi-envelope-paper"></i></span>
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
                                    <span class="input-group-text"><i class="bi bi-list-ol"></i></span>
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
                                    <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></i></span>
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