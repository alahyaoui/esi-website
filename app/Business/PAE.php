<?php

namespace App\Business;
use Illuminate\Support\Facades\DB;
use App\Business\Course;
class PAE {

    //Properties
    private $graph;

    public function __construct(){
       $this->$graph = array();
       init_graph();
       make_graph();
    }
    
    public function get_graph(){
        return $this->$graph;
    }

    public function add_course($course){
        array_push($this->$graph,$course);
    }
    private function init_graph()
    {
        $titles = DB::table('course')
        ->select('title')
        ->get();
        for($i=0; $i < sizeof($titles); $i++) { 
            $course = new Course($titles[$i]);
            add_course($course);
        }
    }
    private function make_graph(){
        init_prerequis();
        init_corequis();
    }

    private function init_prerequis() {
        $csv = array_map('str_getcsv', file(resource_path('data\\prerequis.csv')));

        foreach ($csv as $value) {
            $this->$graph[$value[0]].
            add_prerequis($this->$graph[$value[1]]);
        }
    }
   
    private function init_corequis(){
        $csv = array_map('str_getcsv', file(resource_path('data\\corequis.csv')));

        foreach ($csv as $value) {
            $this->$graph[$value[0]].
            add_corequis($this->$graph[$value[1]]);
        }
    }

}