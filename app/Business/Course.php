<?php

namespace App\Business;

class Course {
    //Properties
    private $title;
    private $prerequis;
    private $corequis;
    

    public function __construct($title){
        $this->$title = $title;
        $this->$prerequis = array();
        $this->$corequis = array();
    }
    /**
     * Add a prerequis to the course
     */
    public function add_prerequis($course){
        array_push($this->$prerequis,$course);
    }
    public function getPrerequis(){
        return $this->$prerequis;
    }
    /**
     * Add a corequis to the course
     */
    public function add_corequis($course){
        array_push($this->$corequis,$course);
    }   
}