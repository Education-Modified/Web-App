<?php

/* * * * * * * * * * * * * * * * * * * * *
 * Giovanni Rescingo - GPL 2.0			 *
 * * * * * * * * * * * * * * * * * * * * *
 * this class holds all the data about   *
 * a student 							 *
 * * * * * * * * * * * * * * * * * * * * */

class StudentFolderItem{

	//holds the id form the table but not the student id
	private $id;
	//holds the mms content object
	private $mssContent;
	//holds the iepcontent object
	private $iepContent;
	//holds the date that this item was added
	private $dateAdded;
	//holds the student id given to the student by the DOE 
	private $studentId;
	//holds the id of th teacher this is in refrance ot the table
	private $teacherId;
	//holds the status of the studetns current goals
	private $goalStatus;

	/**
	* takes an array of aruments like every onther class in that i have
	* progarmed for this site
	*
	* @peram arary of args called args
	*/

	function __construct($args){
		//args is assined to all of the instance varables
		$this->id = $args['id'] + 0;
		//the mss_content_id element is set to an MssContent object before constructed
		$this->mssContent = $args['mss_content_id'];
		//the iep_content_id element is set to an IEPContent object before constructed
		$this->iepContent = $args['iep_content_id'];
		$this->dateAdded = $args['date'];
		$this->studentId = $args['student_id'];
		$this->teacherId = $args['teacher_id'] + 0;
		$this->goalStatus = $args['goal_status'];

	}

	/**
	* this method gets the id of the user which is an intager
	* this is the id that points at the data contined in this object
	* in the database
	*
	*@return the id of the object
	*/
	public function getID(){
		//returns the id
		return $this->id;
	}

	/**
	* this method returns the date that this item was added by
	* a user to a students folder. it uses a YY-MM-DD format for
	* the date as a string
	*
	* @return the date added
	*/
	public function getDate(){
		//returns the date
		return $this->dateAdded;
	}

	/**
	* this method gets the returns the MSS content object
	* which is difeined in mssContent.php look for refrance to 
	* this object there
	*
	* @return mssContent obj
	*/
	public function getMssContent(){
		//returns the instance varable that holds Mss content
		return $this->mssContent;
	}

	/**
	* this method returns the iep content object all of the
	* code and doumentation for this object is in the file 
	* iepContent.php
	*
	* @return a refeance to the iepContent ojbect 
	*/
	public function getIepContent(){
		//reutnrs the instance varuable that holds iepContent
		return $this->iepContent;
	}

	/**
	* this method returns the goal satus of this spesifc 
	* students 
	*
	* @return sucsess status
	*/
	public function getStauts(){
		//reutns the goal stauts 
		return $this->goalStatus;
	}

	/**
	* this method chages the stauts of this students dealings
	* 
	* @peram the studetns status
	*/
	public function setStatus($newStat){
		//assigneds the goal status
		$this->goalStatus = $newStat;
	}

	/**
	* this method returns the id of the of the teather in the data
	* base not the eamil id 
	* 
	* @return id as int
	*/
	public function getTeacherID(){
		return $this->teacherId;
	}
}



?>