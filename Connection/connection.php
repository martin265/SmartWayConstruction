<?php

class Connection {
    public $servername;
    public $username;
    public $password;
    public $database;
    public $connection;

    // ========== the constructor for the class here
    public function __construct($servername, $username, $password, $database) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        // ======== connection here ========== //
        $this->connection = mysqli_connect($servername, $username, $password);
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        // Create new database
        $sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS $database";
        if (mysqli_query($this->connection, $sqlCreateDatabase)) {
           
        } else {
            echo "Error creating database: " . mysqli_error($this->connection) . "\n";
            die();
        }

        // Select the created database
        mysqli_select_db($this->connection, $database);
    }

    // =========== function to establish the connection here ========//
    public function EstablishConnection() {
        return $this->connection;
    }

    // ============== function to get the connection
    public function get_connection() {
        return $this->connection;
    }

    // ==================// ================// ================== //
    public function CreateJobDetailsTable() {
        // executing the query here
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
        //  ========== running the database query here =============//
        $results = mysqli_query($this->connection, $sqlCommand);
        if ($results) {
            
        } else {
            echo "Failed to create the JobDetails table: " . mysqli_error($this->connection) . "\n";
        }
    }

    // =============== function to create the applications Table ============== //
    public function CreateApplicationDetails() {
        // executing the query here
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
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        //  ========== running the database query here =============//
        $results = mysqli_query($this->connection, $sqlCommand);
        if ($results) {
            
        } else {
            echo "Failed to create the ApplicationDetails table: " . mysqli_error($this->connection) . "\n";
        } 
    }

    // =============== function for creating the interview questions table here ==========//
    public function createInterviewQuestionTable() {
        // executing the query here
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
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        //  ========== running the database query here =============//
        $results = mysqli_query($this->connection, $sqlCommand);
        if ($results) {
           
        } else {
            echo "Failed to create the InterviewQuestionsDetails table: " . mysqli_error($this->connection) . "\n";
        } 
    }

    // =============== function for creating the question answers table here ==========//
    public function createQuestionAnswerTable() {
        // executing the query here
        $sqlCommand = "CREATE TABLE IF NOT EXISTS QuestionAnswerDetails(
            answer_id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
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
            applicant_name VARCHAR(50) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        //  ========== running the database query here =============//
        $results = mysqli_query($this->connection, $sqlCommand);
        if ($results) {
            
        } else {
            echo "Failed to create the QuestionAnswerDetails table: " . mysqli_error($this->connection) . "\n";
        } 
    }

}

// Create an instance of Connection
$conn = new Connection("localhost", "root", "", "SmartWayConstruction");
$conn->EstablishConnection();

// calling the create table functions here
$conn->CreateApplicationDetails();
$conn->createInterviewQuestionTable();
$conn->CreateJobDetailsTable();
$conn->createQuestionAnswerTable();

?>
