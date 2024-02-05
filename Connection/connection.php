<!-- // the connection with the database // -->
<?php

class Connection{
    public $servername;
    public $username;
    public $password;
    public $database;
    public $connection;

    // ========== the constructor for the class here
    public function __construct($servername, $username, $password, $database)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        // ======== connection here ========== //
        $this->connection = mysqli_connect($servername, $username, $password, $database);
    }
    // ======== getters for the attributes here ============//
    public function get_servername() {
        return $this->servername;
    }
    // ===============// ============//
    public function get_username() {
        return $this->username;
    }
    // ================ // ============//
    public function get_password() {
        return $this->password;
    }
    //  =================// ============//
    public function get_database() {
        return $this->database;
    }
    // ===============// =============//
    public function get_connection() {
        return $this->connection;
    }
    // =========== function to establish the connection here ========//
    public function EstablishConnection() {
        try {
            if ($this->connection) {
            }
            else {
                print("failed to connect to the database");
            }
        }catch(Exception $ex) {
            print($ex);
        }
    }

    // ==================// ================// ================== //
    public function CreateJobDetailsTable() {
        try{
            // executing the qury here
            $sqlCommand = "CREATE TABLE IF NOT EXISTS JobDetails(
                job_id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                job_title VARCHAR(50) NOT NULL,
                job_location VARCHAR(50) NOT NULL,
                job_type VARCHAR(50) NOT NULL,
                email VARCHAR(50) NOT NULL,
                job_description VARCHAR(100) NOT NULL,
                company_overview VARCHAR(100) NOT NULL,
                qualification VARCHAR(50) NOT NULL,
                technical_skills VARCHAR(50) NOT NULL,
                benefits VARCHAR(50) NOT NULL,
                application_instruction VARCHAR(100) NOT NULL,
                query_phone_number VARCHAR(50) NOT NULL,
                application_deadline VARCHAR(50) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
            //  ========== running the database quey here =============//
            $results = mysqli_query($this->connection, $sqlCommand);
            if ($results) {

            }else {
                print("failed to create the table");
            }
        }catch(Exception $ex) {
            print($ex);
        }
    }

    // =============== function to create the applications Table ============== //
    public function CreateApplicationDetails() {
        try {
            // executing the qury here
            $sqlCommand = "CREATE TABLE IF NOT EXISTS ApplicationDetails(
                application_id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                first_name VARCHAR(50) NOT NULL,
                last_name VARCHAR(50) NOT NULL,
                phone_number VARCHAR(50) NOT NULL,
                email VARCHAR(80) NOT NULL,
                age VARCHAR(50) NOT NULL,
                gender VARCHAR(50) NOT NULL,
                cv VARCHAR(50) NOT NULL,
                cover_letter VARCHAR(50) NOT NULL,
                job_title VARCHAR(50) NOT NULL,
                job_id INT UNSIGNED,
                FOREIGN KEY (job_id) REFERENCES JobDetails(job_id),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
            //  ========== running the database quey here =============//
            $results = mysqli_query($this->connection, $sqlCommand);
            if ($results) {

            }else {
                print("failed to create the table");
            } 
        }catch(Exception $ex) {
            print($ex);
        }
    }

    // =============== function for creating the questions table here ==========//
    public function createInterviewQuestionTable() {
        try {
            // executing the qury here
            $sqlCommand = "CREATE TABLE IF NOT EXISTS InterviewQuestionsDetails(
                question_id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                question_1 VARCHAR(100) NOT NULL,
                question_2 VARCHAR(100) NOT NULL,
                question_3 VARCHAR(100) NOT NULL,
                question_4 VARCHAR(100) NOT NULL,
                question_5 VARCHAR(100) NOT NULL,
                question_6 VARCHAR(100) NOT NULL,
                question_7 VARCHAR(100) NOT NULL,
                question_8 VARCHAR(100) NOT NULL,
                question_9 VARCHAR(100) NOT NULL,
                question_10 VARCHAR(100) NOT NULL,
                interview_duration VARCHAR(100) NOT NULL,
                interview_date VARCHAR(100) NOT NULL,
                applicant_name VARCHAR(50) NOT NULL,
                application_id INT UNSIGNED,
                FOREIGN KEY (application_id) REFERENCES ApplicationDetails(application_id),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
            //  ========== running the database quey here =============//
            $results = mysqli_query($this->connection, $sqlCommand);
            if ($results) {

            }else {
                print("failed to create the table");
            } 
        }catch(Exception $ex) {
            print($ex);
        }
    }

}

// $conn = new Connection("localhost", "root", "", "SmartWayConstruction");
// $conn->EstablishConnection();

// // calling the create table function here
// $conn->createInterviewQuestionTable();

?>