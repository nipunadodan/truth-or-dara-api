<?php

$question = new Orange\Question();

$request_method = $_SERVER['REQUEST_METHOD'];

switch ($request_method){
    case 'POST':
        $newQuestion = [
            'question' => $_POST['question'],
        ];
        $question->addQuestion($newQuestion);
        break;
    case 'GET':
        if(isset($_GET['option'])) {
            if ($_GET['option'] === 'all') {
                $out = $question->getAllQuestions();
            } else {
                $out = $question->getQuestion($_GET['option']);
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
        $question->updateQuestion($putData['id'], $putData['userID']);
        break;
    case 'DELETE':
        parse_str(file_get_contents("php://input"),$putData);
        $question->deleteQuestion();
        break;
    default:
        $question->getQuestion($_GET['id']);
}