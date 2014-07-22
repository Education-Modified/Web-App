<?php
	
	/* * * * * * * * * * * * * * * * * * * * * * *
	 * By Giovanni Rescingo - 2014    		     *
	 * * * * * * * * * * * * * * * * * * * * * * * 
	 * Discription: this class holds the user of *
	 * or teacher and all the data with it a     *
	 * refrance to this class can be found in    *
	 *  a insution object or the main contorlder *
	 * * * * * * * * * * * * * * * * * * * * * * *
	*/

	class user{

		//the start and end dates of  a given teacher
		private $startDate;
		private $endDate;
		//the eamil adress (also used as the login) of the teacher
		private $email;
		//the first and last names of the teasther
		private $fristName;
		private $lastName;
		//holds the object of the school and or the institution that the teacher is assuated with
		private $institution;
		//holds the the password as a hash
		private $passwordHashed;
		//holds the id of the user just for database refrace
		private $userID;
		private $portalAssiment;
		private $userType;

		/**
		* this method is a constructor is used to construc the user object
		* being that it requiere a large amount of instance varuables it i
		* use a keyed array to hold every thing. 
		* 
		* @peram a keyed arrray with all of the values from the database
		*/
		function __construct($args){
			//varuabel assiments
			$this->email  = $args['email_id'];
			$this->startDate = $args['sub_start_date'];
			$this->endDate = $args['sub_end_date']; 
			$this->firstName = $args['first_name'];
			//or last name
			$this->lastName = $args['second_name'];
			$this->passwordHashed = $args['password'];
			//the id is cased to an int for easer use
			$this->userID = $args['id'] + 0;
			//the poratal assiment i turned into an array
			$this->portalAssiment = explode(",", $args['portal_assigned']);
			$this->userType = $args['user_type'];
			$this->institution = $args['institution_name'];
		}

		/**
		* this method checks to see if the teachers session has expired
		* if it has exipried it will return true if not i will return false
		* 
		* @return if seetosn has expired
		*/
		public function hasExipred(){
			//the exporation time is held here were the string is turned into a number
			$exporationTime = date("oW", strtotime($this->endDate));
			//the current time is gotten here
			$currentTime = date("oW", time());
			//returns the resalt
			return $currentTime <= $exporationTime;
		}

		/**
		* this method returns the name of the instution 
		* that the teacher is apart of for example the 
		* school that he/she works at
		* 
		* @return String which is the name of the instution
		*/
		public function getInstitution(){
			//returns the instution name
			return $this->institution;
		}

		/**
		* this method returns the email of the user (teacher)
		* which is a string the eamil also acts as the user 
		* of the user and as a user id 
		* 
		* @return email as a string
		*/
		public function getEamil(){
			//returns the eamil
			return $this->eamil;
		}

		/**
		* this method returns the Last name or hte the first name of 
		* the teacher baced off of the peramitor 
		* as a string 
		* 
		* @peram "F" = frist name , "L" = last Name
		* @return string the last name or the first name
		*/
		public function getName($FirstLast){
			//this checks to see if the Frist last name is disganted
			if($FirstLast = "F"){
				//if it is the first name it will return the first name
				return $this->fristName;
			}
			//other wise the last name is returned for any other value
			return $this->lastName;
		}

		/**
		* this method checks to see if the password given 
		* (wich is unhashed) is the same as the password that is 
		* in the user data entry (which is hashed)
		*
		* @peram the unhashed password
		* @return true for it is right false for if it is wrong
		*/
		public function checkPass($password){
			//check to see if the hashes are equal
			return hash("sha1", $password) == $this->passwordHashed;
		}

		/**
		* this method cheages the password of this user the user object 
		* must be saved by the controler once the change is made. the data
		* structuer is not saved when this meothd runs it is only altered
		*  
		* @peram old password unhashed
		* @peram new password unhahsed
		* @return if the password given was a valid
		*/ 
		public function changePass($oldPass, $newPass){
			//checsk to see if the password is valid
			if($this->checkPass($oldPass)){
				//sets the new password
				$this->passwordHashed = hash("sha1", $newPass);
				//returns true if it has been sucessful
 				return true;
			}	
			//if there is a non valid password it will return false
			return false;
		}

		/**
		* this method returns the portal assiment of the user (teacher)
		* as a string it takse no permaitors
		*
		* @return the portal desingantions
		*/

		public function getPortal(){
			//returns the protal type
			return $this->portalAssiment;
		}

		/**
		* this mehtod returns type of user this is
		* it is ither a teacher or an admin
		* 
		* @return a string that is the type
		*/
		public function getType(){
			//this returns the type
			return $this->userType;
		}

		/**
		* checks to see if the users time has started
		* by chesking the date started varable
		* 
		* @return True = has started, false = not yet started
		*/
		public function hasStarted(){
			//the start time is held here were the string is turned into a number
			$startTime = date("oW", strtotime($this->startDate));
			//the current time is gotten here
			$currentTime = date("oW", time());
			//returns the resalt as a boolen
			return $currentTime >= $startTime;
		}

		/**
		* this method returns the id of the user (as in the DB table)
		* so that one can acsees the user on the the line that it is form
		* in the data base 
		* 
		* @return the user id number
		*/
		public function getID(){
			//retuns the user id
			return $this->userID;
		}
	}
?>