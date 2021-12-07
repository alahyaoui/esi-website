<?php

namespace App\Business;
use Illuminate\Support\Facades\DB;
use App\Business\Course;
use Error;
use PhpOption\None;

class PAE {

    //Properties
    private $graph;

    public function __construct(){
       $this->graph = [];
       $this->init_graph();
       $this->make_graph();
    }
    
    public function get_graph(){
        return $this->graph;
    }

    public function add_course($course){
        array_push($this->graph, $course);
    }

    private function init_graph(){
        $titles = DB::table('course')
        ->select('title')
        ->get();
        for($i=0; $i < sizeof($titles); $i++) { 
            $course = new Course($titles[$i]);
            $this->add_course($course);
        }
    }
    private function make_graph(){
        $this->init_prerequis();
        $this->init_corequis();
    }

    private function init_prerequis() {
        $csv = array_map('str_getcsv', file(resource_path('data\\prerequis.csv')));
        $graph = $this->graph;

        foreach ($csv as $value) {
            $course = $this->getCourseFrom($graph, $value[0]);
            $prerequis = $this->getCourseFrom($graph, $value[1]);
            if($course && $prerequis){
                $course->add_prerequis($prerequis);
            }else{
                throw new Error("Error course not found in graph.");
            }
        }
    }

    private function getCourseFrom($graph, $course_title){
        $course = NULL;
        for($i = 0; $i < sizeof($this->graph); $i++){
            $tmp = $this->$graph[$i];
            if($tmp->title == $course_title){
                $course = $tmp;
                break;
            }
        }

        return $course;
    }
   
    private function init_corequis(){
        $csv = array_map('str_getcsv', file(resource_path('data\\corequis.csv')));
        $graph = $this->graph;

        foreach ($csv as $value) {
            $course = $this->getCourseFrom($graph, $value[0]);
            $prerequis = $this->getCourseFrom($graph, $value[1]);
            if($course && $prerequis){
                $course->add_corequis($prerequis);
            }else{
                throw new Error("Error course not found in graph.");
            }
        }
    }

}