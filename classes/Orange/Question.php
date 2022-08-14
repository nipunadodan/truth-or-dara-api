<?php

namespace Orange;

class Question extends Db {
    function getAllQuestions(): ?array {
        return $this->select('questions', [
            'ID',
            'question'
        ],[
            'status' => 5
        ]);
    }

    function getQuestion($questionID): ?array {
        return $this->select('questions', [
            'ID',
            'question'
        ],[
            'ID' => $questionID,
            'status' => 5
        ]);
    }

    function addQuestion(){

    }

    function updateQuestion($userID,$userData){

    }

    function deleteQuestion($userID){

    }
}