<?php

namespace Orange;

class Dare extends Db{
    function getAllDares(): ?array {
        return $user = $this->select('dares', [
            'ID',
            'dare'
        ],[
            'status' => 5
        ]);
    }

    function getDare($questionID): ?array{
        return $user = $this->select('dares', [
            'ID',
            'dare'
        ],[
            'ID' => $questionID,
            'status' => 5
        ]);
    }

    function addDare(){

    }

    function updateDare($userID,$userData){

    }

    function deleteDare($userID){

    }
}