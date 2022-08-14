<?php

$feedback = new Orange\Feedback();

$request_method = $_SERVER['REQUEST_METHOD'];

switch ($request_method){
    case 'POST':
        $postData = json_decode(file_get_contents("php://input"));
        $newQuestion = [
            'id' => $postData->id,
            'choice' => $postData->choice,
            'appID' => $postData->appID,
        ];
        $insert = $feedback->addFeedback($newQuestion);
        
        if($insert > 0){
            echo json_encode([
                'status' => 'success',
                'message' => 'Successfully received the feedback'
            ]);
        } else {
            http_response_code(404);
            echo json_encode([
                'status' => 'danger',
                'err' => 'Error receiving feedback'
            ]);
        }

        break;
    default:
        $feedback->getQuestion($_GET['id']);
}