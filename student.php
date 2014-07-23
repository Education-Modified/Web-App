<?php

/* * * * * * * * * * * * * * * * * * * * * * * * *
 * Giovanni Rescigno - GPL 2.0					 *
 * * * * * * * * * * * * * * * * * * * * * * * * *
 * this class holds all of the data on a given   *
 * student  									 *
 * * * * * * * * * * * * * * * * * * * * * * * * */

class student{

	//student idefication
	private $first_Name;
	private $last_Name;
	private $student_ID;
	//holds all of the student folder item objects assuated with this student
	private $student_folder_items = array();
	//student disabilities
	private $disabilities = array();
	//holds the instution id
	private $instutionID;
	//holds a short Discrption
	private $anecdotals;

	/**
	* like the rest of the methods this function is syplyed an array list
	* which is keyed with the same element names as the data base colums
	*
	* @peram $args holds they keyed array of aruments
	*/
	function __construct($args){
		//the name is set as an instance varable
		$this->first_Name = $args['first_name'];
		$this->last_Name = $args['last_name'];
		$this->student_ID = $args['student_id'] + 0;
		$this->instutionID = $args['institution_id'] + 0;
		$this->anecdotals = $args['anecdotals'];
		//the disabilities elemtn of the $args array list must be replaceed with disablityObjects before Construction
		$this->disabilities = $args['disabilities'];
	}

	/**
	* this method checks and adds a student folder item to the student folder
	* item array list from wich can be acsessed. this method also checks to 
	* make shure that the object suplyed is an StudentFolder object. if it is 
	* it will return false other wise it will return true 
	* 
	* @peram takes a StudentFolder object
	* @return weather or not it the addtion was a sucsess
	*/
	public function addStudentFolder($Student_folder_item){
		//checks to see if the folder item is an instance of student folder
		if(!$Student_folder_item instanceof StudentFolder)
			return false;
		//adds the student folder item to the array list
		array_push($student_folder_items, $Student_folder_item);
		//returns true
		return true;
	}

	/**
	* this method returns the first or the last name of a student 
	* based off of the peramitors suplyed. if nothing is sypled the
	* last name is returned
	*
	* @peram the the string that holds the mode 
	* 'F' = first name 'L' = last name
	* @return FristName  
	*/
	public function getName($op = 'L'){
		//checks the op see if it is asking for the first name
		if($op == 'F')
			//if so retuns the first name
			return $this->first_Name;
		//returns the last name other wise
		return $this->last_Name;
	}

	/**
	* this method returns the studnet id of this proditral student
	* this id is not the index id of the student it is the DOE given
	* id for the student. 
	*
	* @return student id as int
	*/
	public function getStudentID(){
		return $this->student_ID;
	}

	/**
	* this method returns the student folder for this student
	* which contain alot of the data on how a studnet is doing
	* a status can be suplyed on the for the startagates but
	* it dose not have to be
	*
	* @peram the status of the stratage 
	* @return an arrray of StudentFolderItem objects (refrance in StudentFolder.php)
	* or false if none ar found
	*/
	public function getFolder($findStats = "all"){
		//if the selecor is set to all it will return all of the elements in the array
		if($findStats == "all"){
			//returns all of the elemeths
			return $this->student_folder_items;
		}
		//if not it will search for the status spesified

		//sets an array for the resalt
		$returnAble = array();
		//runs though all of the elements
		foreach($this->student_folder_items as $folderItem){
			//checks for the status
			if($folderItem->getStauts() == $findStats){
				//if has the status that is being looked for will add to temp array
				array_push($returnAble, $folderItem);
			}
		}
		//if there is anything in the array it will return
		if(isset($returnAble[0])){
			//returns array
			return $returnAble;
		}
		//if array is empty it will return false;
		return false;
	}

	/**
	* this method checks to see if this student has a teacher with a given
	* id. if the studetn dose it will return true if the studnet dose not
	* it will return false.
	* 
	* @peram teacher_id
	* @return if the teacher has that student
	*/
	public function hasTeacher($teacher_id){
		//runs though all of the studnet folder elements
		foreach($this->student_folder_items as $folderItem){
			//if one of them has the id of a certen teacher will return true
			if($folderItem->getTeacherID() == $teacher_id)
				return true;
		}
		//other wise it will return false
		return false;
	}

	/**
	* this method returns all of the disabilities that a given student has 
	* as an array 
	* 
	* @return array of disabilities
	*/
	public function getDisabilities(){
		return $this->disabilities;
	}

	/**
	* this method checks to see if a student has a given disablity 
	* this method can take ither a string or a disablity object
	* if the student has the disablity this method will return true 
	* other wise it will return false
	*
	* @peram disablity name or disablity object
	* @return a boolena true for yes false for no
	*/
	public function hasDisablity($disablity){
		//checsk to see if the pearm is an instace of the object
		if($disablity instanceof disablity){
			//runs thought all of the posablitys
			foreach($this->disabilities as $disable){
				//checks to see if they are equal
				if($disablity->getID() == $disable->getID()){
					return true;
				}
			}
		}else{
			//runs thought the posablitys
			foreach($this->disabilities as $disable){
				//checks to see if equal
				if($disable->getName() == $disablity){
					return ture;
				}
			}
		}
		//if all test fail it will return false
		return false;
	}
	/**
	* this method returns the anecdotals of this student
	* which is a short message which talks about a speifc student
	* 
	* @return anecdotals String
	*/
	public function getAnecdotals(){
		return $this->anecdotals;
	}
}
?>