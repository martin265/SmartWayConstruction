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
                            <input type="submit" value="Apply for job" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>