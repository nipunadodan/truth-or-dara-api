<?php

$dare = new Orange\Dare();

$request_method = $_SERVER['REQUEST_METHOD'];

switch ($request_method){
    case 'POST':
        $newDare = [
            'question' => $_POST['question'],
        ];
        $dare->addQuestion($newDare);
        break;
    case 'GET':
        if(isset($_GET['option'])) {
            if ($_GET['option'] === 'all') {
                $out = $dare->getAllDares();
            } else {
                $out = $dare->getDare($_GET['option']);
            }
            if(!empty($out)) {
                echo json_encode($out);
            }else{
                http_response_code(404);
                echo json_encode([
                    'err' => 'Record not found'
                ]);
            }
        }else{
            http_response_code(400);
            echo json_encode([
                'err' => 'Error option missing'
            ]);
        }
        //print_r($_REQUEST);
        break;
    case 'PUT':
        parse_str(file_get_contents("php://input"),$putData);
        $dare->updateDare($putData['id'], $putData['userID']);
        break;
    case 'DELETE':
        parse_str(file_get_contents("php://input"),$putData);
        $dare->deleteQuestion();
        break;
    default:
        $dare->deleteDare($_GET['id']);
}