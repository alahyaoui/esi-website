<?php

namespace App\Business;

class Course
{
    //Properties
    private $title;
    private $prerequis;
    private $corequis;
<<<<<<< HEAD


    public function __construct($titleParam)
    {
        $this->title = $titleParam;
        $this->prerequis = [];
        $this->corequis = [];
=======
    
    //Functions
    public function __construct($course_title){
        $this->title = $course_title;
        $this->prerequis = array();
        $this->corequis = array();
>>>>>>> e681a69f342a977318159a0421c0230f086ecbfd
    }
    /**
     * Add a prerequis to the course
     */
    public function add_prerequis($course){
        array_push($this->prerequis, $course);
    }
    public function getPrerequis(){
        return $this->prerequis;
    }
    /**
     * Add a corequis to the course
     */
    public function add_corequis($course){
        array_push($this->corequis, $course);
    }   
}