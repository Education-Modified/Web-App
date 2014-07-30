<?php

/* * * * * * * * * * * * * * * * * * * * * * *
 * by Giovanni Rescigno 					 * 
 * * * * * * * * * * * * * * * * * * * * * * *
 * this class is a very simply object which  *
 * simply holds the skill data. this class   *
 * is used in the mss_content class 		 *
 * * * * * * * * * * * * * * * * * * * * * * */
 
class skill{

	private $id; 		//this hodls the id of skill
	private $subject;	//this holds the sucbject as a string
	private $skill;     //holds the skill

	function __construct($args){

		$this->id = $args['id'];
		$this->subject = $args['subject'];
		$this->skill = $args['catigory'];
	}

	/**
	* this method returns the id of the skill in the 
	* db table
	*
	* @return id
	*/
	public function getID(){
		//returns subject
		return $this->ID;
	}

	/**
	* this method retursn teh subject as a string of 
	* this instance
	*
	* @return subject 
	*/
	public function getSubject(){
		//returns subject
		return $this->subject;
	}

	/**
	* this method returns the catiroty of this skill
	*
	* @return the catigory
	*/
	public function getCatigory(){
		//returns the skill object
		return $this->skill;
	}
}
?>