<?php

namespace Orange;

class Feedback extends Db {
    function getAllFeedback(): ?array {
        return $this->select('feedback', '*',[
            'status' => 5
        ]);
    }

    function getFeedback($feedbackID): ?array {
        return $this->select('feedback', '*',[
            'ID' => $feedbackID,
            'status' => 5
        ]);
    }

    function addFeedback($feedback){
        $data = $this->insert('feedback',[
            'questionID' => $feedback['id'],
            'feedback' => $feedback['choice'],
            'appID' => $feedback['appID'],
        ]);
        return $data->rowCount();
    }

    function updateFeedback($userID,$userData){

    }

    function deleteFeedback($userID){

    }
}