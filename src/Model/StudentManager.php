<?php


namespace App\Model;


class StudentManager
{
    protected $DBconnect;

    public function __construct()
    {
        $this->DBconnect = new DBConnect();
    }

    public function getAllStudents()
    {
        $sql = "SELECT *  FROM students";
        $stmt = $this->DBconnect->connectDB()->query($sql);
        $data = $stmt->fetchAll();
        $students = [];
        foreach ($data as $item){
            $student = new Student($item["student_name"],$item["birthday"]);
            $student->setStudentId($item["student_id"]);
            array_push($students,$student);
        }
        return $students;
    }

    public function addStudent($student)
    {
        $sql = "INSERT INTO `students` (`student_name`,`birthday`) VALUES (:student_name,:birthday)";
        $stmt = $this->DBconnect->connectDB()->prepare($sql);
        $stmt->bindParam(":student_name",$student->getStudentName());
        $stmt->bindParam(":birthday",$student->getBirthday());
        $stmt->execute();
    }

    public function deleteStudent($id)
    {
        $sql = "DELETE FROM `students` WHERE `student_id` = :id";
        $stmt = $this->DBconnect->connectDB()->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
    }

    public function getStudentById($id)
    {
        $sql = "SELECT * FROM `students` WHERE `student_id` = :id";
        $stmt = $this->DBconnect->connectDB()->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

    public function updateStudent($student)
    {
//        var_dump($student);
//        die();
        $sql = "UPDATE `students` SET `student_name` = :name, `birthday` = :birthday WHERE `student_id`= :id";
        $stmt = $this->DBconnect->connectDB()->prepare($sql);
        $stmt->bindParam(":id",$student->getStudentId());
        $stmt->bindParam(":name",$student->getStudentName());
        $stmt->bindParam(":birthday",$student->getBirthday());
        $stmt->execute();
    }

}