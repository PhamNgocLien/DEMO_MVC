<?php

namespace App\Controller;
use App\Model\StudentManager;
use App\Model\Student;

class StudentController
{
    protected $studentController;

    public function __construct()
    {
        $this->studentController = new StudentManager();
    }

    public function viewStudent()
    {
        $students = $this->studentController->getAllStudents();
        include_once 'src/View/listStudent.php';
    }

    public function addStudent(){
        if ($_SERVER["REQUEST_METHOD"] == "GET"){
            include_once 'src/View/addStudent.php';
        } else {
            $name = $_POST['student-name'];
            $birthday = $_POST['birthday'];
            $student = new Student($name,$birthday);
            $this->studentController->addStudent($student);
            header("location:index.php");
        }
    }

    public function deleteStudent()
    {
        $id = $_REQUEST['id'];
        $this->studentController->deleteStudent($id);
        header("location:index.php");
    }

    public function editStudent()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET"){
            $id = $_REQUEST["id"];
            $student = $this->studentController->getStudentById($id);
            include_once  'src/View/updateStudent.php';
        } else {
            $id = $_REQUEST["id"];
            $name = $_POST['student-name'];
            $birthday = $_POST['birthday'];
            $student = new Student($name,$birthday);
            $student->setStudentId($id);
            $this->studentController->updateStudent($student);
            header("location:index.php");
        }
    }
}