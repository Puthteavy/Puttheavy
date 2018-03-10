<?php
abstract class AbstractClass{
    protected $id;
    protected $name;
    abstract function index();
    abstract function edit();
    function __construct($id, $name){
        $this->id = $id;
        $this->name = $name;
    }
    function walk(){
        echo "Hello";
    }

}
class item extends AbstractClass{
    public $sex;
    function __construct($id, $name,$sex)
    {
        parent::__construct($id, $name);
        $this->sex = $sex;
    }

    function index()
 {
     // TODO: Implement index() method.
     echo  "index<br>";
 }
 function edit()
 {
     // TODO: Implement edit() method.
     echo "edit<br>";
 }

}