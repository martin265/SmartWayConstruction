<?php
// =============== getting the connection here ================ //
include("Connection/connection.php");



class Applicant{
    public $first_name;
    public $last_name;
    public $phone_number;
    public $email;
    public $age;
    public $gender;
    public $cv;
    public $cover_letter;
    public $connection;

    // ============ the constructor function will be here =============== //
    public function __construct($first_name, $last_name, $phone_number, $email, $age, $gender, $cv, $cover_letter)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->phone_number = $phone_number;
        $this->email = $email;
        $this->age = $age;
        $this->gender = $gender;
        $this->cv = $cv;
        $this->cover_letter = $cover_letter;
        $this->connection = new Connection("localhost", "root", "", "SmartWayConstruction");;
    }

    // ================== the getters for the function will be here ================ //
    public function SaveApplicantDetails($job_title, $job_id) {
        try {
            // ========= getting the connection here =============== //
            $this->connection->EstablishConnection();
            $conn = $this->connection->get_connection();
            $sqlCommand = $conn->prepare(
                "INSERT INTO ApplicationDetails (
                    first_name, last_name, phone_number, email, age, gender,
                    cv, cover_letter, job_title, job_id
                ) VALUES(?,?,?,?,?,?,?,?,?,?)"
            );
            // =========== binding the parameters here ============= //
            $this->allowNotNull();
            $sqlCommand->bind_param(
                "ssssssssss",
                $this->first_name, $this->last_name, $this->phone_number, $this->email, 
                $this->age, $this->gender, $this->cv, $this->cover_letter, $job_title, $job_id
            );
            // ============ running the query here =============== //
            $sqlCommand->execute();
            
        }catch(Exception $ex) {
            print($ex);
        }
    }

    // =========== function to allow null values ================= //
    private function allowNotNull() {
        try {
            $this->first_name = $first_name ?? "";
            $this->last_name = $last_name ?? "";
            $this->phone_number = $phone_number ?? "";
            $this->email = $email ?? "";
            $this->age = $age ?? "";
            $this->gender = $gender ?? "";
            $this->cv = $cv ?? "";
            $this->cover_letter = $cover_letter ?? "";
        }catch(Exception $ex) {
            print($ex);
        }
    }
}

?>