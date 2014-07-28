<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * *
 * By Giovanni Rescigno							     *
 * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * this class holds all of the data for the diffrent *
 * staragaies that can be used to help studends      *
 * overcome thier disablitys                         *
 * * * * * * * * * * * * * * * * * * * * * * * * * * */

class MSSContent{

	private $id  				//holds the id of the content
	private $disablity; 		//holds a disablity object
	private $mss_skill  		//holds a mss skill object
	private $image;     		//holds the URL to a image
	private $content;   		//the actural content or the discription
	private $mode; 				//holds the mode object 
	private $gradeLevel 		//holds the grade level as string it is contructed from json file
	private $learning_style		//holds the learning style as a string it is contructed from json file


	/**
	* when this object is contructed it takes in a keyed array with atrobutes
	* that are from the mysql data base. 
	*
	* @pearm args keyd array
	*/
	function __construct($args){

		//the disablity object will be constructed outside of this class and will be suplyed though
		//the disablity_id atrobute.
		$this->disablity = $args['disability_id'];	
		//ust like the disablity object hte skill object will be contructed out side of this class
		$this->mss_skill = $args['subject_skills_id'];
		//holds the image url
		$this->image = $args['image'];
		//mss content text contenet
		$this->content = $args['content'];
		//this holds the mode object which is constructed outside of the class
		$this->mode = $args['mode'];

		//the json is being parced here for the gradeLevel
		$gradeLevelJsonString = file_get_contents("JsonFiles/grade.json");
		$gradeLevelJson = json_decode($gradeLevelJsonString);
		//the varuable is finaly assigned
		$this->gradeLevel = $gradeLevelJson[$args['iep_grades_id']];

		//the json is being parced here for the learingStyle
		$learingStyleJsonString = file_get_contents("JsonFiles/learingStyles.json");
		$learingStyleJson = json_decode($learingStyleJsonString);
		//the varables is finaly assigned
		$this->learning_style = $learingStyleJson[$args['learning_style_id'] + 0];

		//decotration of id
		$this->id = $args['id'] + 0;
	}

	/**
	* this method returns the disablity object. all refrances
	* to this object are in speacialNeed.php
	*
	* @return disabity object
	*/
	public function getDisablity(){
		//returns the disablity object
		return $this->disablity;
	}

	/**
	* this method returns an mss skill object the refrance to 
	* this object is in the skill.php file
	*
	* @return skill object
	*/
	public function getSkill(){
		//skill object retuned
		return $this->mss_skill;
	}

	

}


?>