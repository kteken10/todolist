<?php 
     abstract class BaseDao {
        public function __construct(){

        }
        abstract public function readAll();
        abstract public function read();
        abstract public function delete();
        abstract public function create();
        abstract public function update();
        }


     ?>