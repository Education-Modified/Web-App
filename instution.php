<?php

require_once 'user.php';

/* * * * * * * * * * * * * * * * * * * * * * * * * * *
 * By Giovani Rescigno - 2014	 				     *
 * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * this class holds all of the data realted to the   *
 * isution a given teacher workds at. this class     *
 * is acessed thought the users class as an atrobue. * 
 * * * * * * * * * * * * * * * * * * * * * * * * * * */
class instution{

	//holds all of hte teacher objec
	private $teachers = array();
	//holds the name of the instution
	private $instutionName;
	//holds the id of an insution
	private $instutionID;

	/**
	* the constructor like the rest of the classes for this applicaiton
	* takes an an array of arguments which are keyd to the same name as the
	* data base
	*
	* @peram args
	*/
	function __construct($args){
		//dicalars the insitution name
		$this->instutionName = $args['institution'];
		//dicalars the id of the instion of in the database
		$this->instutionID = $args['id'] + 0;
	}

	/**
	* this method adds a teacher to the teacher array 
	* the reson why all the teachers are not suplyed in the 
	* constructor is because adding all of the teacher in one 
	* go for every insution would be extermly slow. this way 
	* teachers can be diamicly and there would only need to be one
	* pass of the master teacher array
	* 
	* @peram one teacher object
	* @return if the object passed is not an instance of user it will return false
	* ohter wise it will return true
	*/
	public function addTeacher($teacherObj){
		//this statment checks to see if the object given is a user object
		if($teacherObj instanceof user){
			array_push($this->teachers, $teacherObj);
			//when every thing is run sucessfuly the method returns true
			return true;
		}
		//if there was a probem this method returns false
		return false;
	}

	/**
	* this method gets the instuion id of this instuion 
	* 
	* @return int
	*/
	public function getID(){
		//id is returned
		return $this->instutionID;
	}

	/**
	* this method gets all of the teachers stored in 
	* the teachers array list. it will return false if 
	* there is nothing in the array.
	*
	* @return the array or false 
	*/
	public function getTeachers(){
		//if there is more than non teachers the array will be returnd
		if(count($this->teachers) > 0){
			return $this->teachers;
		}
		//other wise false is returned
		return false;
	}

	/**
	* this method gets the name of the instution and returnds it as 
	* string 
	*
	* @return string the name of the instution
	*/
	public function getName(){
		//returns the name
		return $this->instutionName;
	}
}
?>