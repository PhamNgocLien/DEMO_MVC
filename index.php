<?php
require __DIR__ ."/vendor/autoload.php";

//$studentManager = new \App\Model\StudentManager();
//$studentManager->getAllStudents();

$page = isset($_REQUEST['page'])? $_REQUEST['page'] : NULL;
$studentController = new \App\Controller\StudentController();
switch ($page){
    case 'listStudent':
        $studentController->viewStudent();
        break;
    case 'addStudent':
        $studentController->addStudent();
        break;
    case 'delete':
        $studentController->deleteStudent();
        break;
    case 'edit':
        $studentController->editStudent();
        break;
    default:
        $studentController->viewStudent();
}