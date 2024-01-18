<?php
// ============ including the connection here ========//
include("Connection/connection.php");
// =============// =================// ============//
class Job{

    public $job_title;
    public $job_location;
    public $job_type;
    public $email;
    public $job_description;
    public $company_overview;
    public $qualification;
    public $technical_skills;
    public $benefits;
    public $application_instruction;
    public $query_phone_number;
    public $application_deadline;
    public $connection;

    // ==================== // the getters amd constructor will be here // ===================== //
    public function __construct($job_title, $job_location, $job_type, $email, $job_description, $company_overview, $qualification, $technical_skills, $benefits, $application_instruction, $query_phone_number, $application_deadline)
    {
        $this->job_title = $job_title;
        $this->job_location = $job_location;
        $this->job_type = $job_type;
        $this->email = $email;
        $this->job_description = $job_description;
        $this->company_overview = $company_overview;
        $this->qualification = $qualification;
        $this->technical_skills = $technical_skills;
        $this->benefits = $benefits;
        $this->application_instruction = $application_instruction;
        $this->query_phone_number = $query_phone_number;
        $this->application_deadline = $application_deadline;
        $this->connection = New Connection("localhost", "root", "", "SmartWayConstruction");
    }

    // ==================== // getters // ==========================//
    public function get_job_title() {
        return $this->job_title;
    }
    // ================== // ================== // ================//
    public function get_job_location() {
        return $this->job_location;
    }
    // ================== // ================== // ================//
    public function get_job_type() {
        return $this->job_type;;
    }
    // ================== // ================== // ================//
    public function get_email() {
        return $this->email;
    }
    // ================== // ================== // ================//
    public function get_job_description() {
        return $this->job_description;
    }
    // ================== // ================== // ================//
    public function get_company_overview() {
        return $this->company_overview;
    }
    // ================== // ================== // ================//
    public function get_qualification() {
        return $this->qualification;
    }
    // ================== // ================== // ================//
    public function get_technical_skills() {
        return $this->technical_skills;
    }
    // ================== // ================== // ================//
    public function get_benefits() {
        return $this->benefits;
    }
    // ================== // ================== // ================//
    public function get_application_instruction() {
        return $this->application_instruction;
    }
    // ================== // ================== // ================//
    public function get_phone_number() {
        return $this->query_phone_number;
    }
    // ================== // ================== // ================//
    public function get_application_deadline() {
        return $this->application_deadline;
    }
    // ================== // ================== // ================//

    public function SaveJobDetails() {
        try {
            // getting the connection with the database here
            $this->connection->EstablishConnection();
            $conn = $this->connection->get_connection();
            // =========== the sql command here ============= /
            $sqlCommand = $conn->prepare("INSERT INTO JobDetails(
                job_title, job_location, job_type, email, 
                job_description, company_overview, qualification,
                technical_skills, benefits, application_instruction, 
                query_phone_number, application_deadline
            ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
            // binding the parameters here ===========//
            $sqlCommand->bind_param(
                "ssssssssssss",
                $this->job_title, $this->job_location, $this->job_type,
                $this->email, $this->job_description, $this->company_overview,
                $this->qualification, $this->technical_skills, $this->benefits,
                $this->application_instruction, $this->query_phone_number,
                $this->application_deadline
            );
            //  =========== running the qury here ============//
            $sqlCommand->execute();
        }catch(Exception $ex) {
            print($ex);
        }
    }
    
}


?>