<?php
namespace cmr\db;
class req{

    function select($select,$from){
        return "SELECT $select FROM $from";
    }

}