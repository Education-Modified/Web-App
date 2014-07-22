<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * 
 * by Giovanni Rescigno	- 2014					 * 
 * * * * * * * * * * * * * * * * * * * * * * * * *
 * Discirption: this class will hold of the IEP  *
 * data for a given studnet an instace of it can *
 * be found in the studnetfolder class in        *
 * StudnetFolder.php 							 *
 * * * * * * * * * * * * * * * * * * * * * * * * */

class IEPContent{

	//holds the database id of the IEPcontent
	private $id;
	//holds the grade
	private $grade;
	//holds the subject
	private $subject;
	//holds the content
	private $content;

	/**
	* this is the contructor for this class. it takes in all of the aruments that would 
	* taken directly from the data base and returns nothig
	* 
	* @peram Args a keyed array
	*/
	function __construct($args){
		//geatehrs all of the grade ids to content
		$gradeJson = file_get_contents('grade.json');
		$gradeContent = json_decode($gradeJson);
		//grabs all of the subjects form the json file
		$subjectJson = file_get_contents("subject.json");
		$subjectContent = json_decode($subjectJson);
		//instance varuables are initislaised
		$this->id = $args['id'] + 0;
		$this->content = $args['content'];
		$this->grade = $gradeContent[$args["grade_id"]];
		$this->subject = $subjectContent[$args["subject_id"] + 0];
	}

	/**
	* this mehtod returns the id of this istance of the IEPcontent
	* object 
	*
	* @return the id
	*/
	public function getID(){
		return $this->id;
	}

	/**
	* this method returns the writen content of the iep as a string
	* this content is user speific
	*
	* @return iep content
	*/
	public function getContent(){
		return $this->content;
	}

	/**
	* this method returns the grade as a string this is not
	* a letter grade it is the grade level of the student
	* 
	* @return grade Level
	*/
	public function getGrade(){
		return $this->grade;
	}

	/**
	* this method returns the subject that this iep is created
	* for sepsificly
	*
	* @return the subject
	*/
	public function getSubejct(){
		return $this->subject;
	}


}



?>