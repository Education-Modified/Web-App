<?php
	
	

	/* * * * * * * * * * * * * * * * * * * * *
	 * by Giovanni Rescigno - 2014			 *
     * * * * * * * * * * * * * * * * * * * * *
     * this class holds the data on cernten  *
     * disablitys and a short discription    *
     * on them this is a very simple class   *
     * with a colection of getters. the data *
     * for this class can only be modifed    *
     * thought the data base 			     * 
	 * * * * * * * * * * * * * * * * * * * * */

	class disablity{

		//holds the id of the disablity
		private $id;
		//holds the name
		private $disability;
		//holds a short discription
		private $description;



		/**
		* this construcotr takes the raw data base data which
		* is a keyed array when returned form php mysql functions
		* this is why i use a array of args for the constructor. i am
		* simply elimnating an extra step
		*
		* @pearm args keyed array
		*/
		function __construct($args){

			//the id is assined
			$this->id = $args['id'] + 0;
			//the disablity is assinged
			$this->disability = $args['disability'];
			//the discritpon is assinged
			$this->description = $args['description'];
		}

		/**
		* this method takes no peamitors and simply returns the 
		* id of disablity. this id has is not an ofical id it 
		* is simply the rafrance to a table in the data base.
		* 
		* @peram null
		* @return the id of the
		*/
		public function getID(){
			//returns the id
			$this->id;
		}


		/**
		* this method takes no peamitors and simply returns 
		* the disablity name for this instance
		* it is a string that coralited directly to an id in 
		* the data base table.
		* 
		* @peram null
		* @return the disablity name
		*/
		public function getName(){
			//returns the instace varuable
			return $this->disability; 
		}


		/**
		* this method takes no peamitors and simply returns
		* a short discripton of the disablity so that one 
		* can understahnt what it is exatly. 
		* 
		* @pearm null
		* @return the disablity discripton
		*/
		public function getDiscripton(){
			//returns the instance varuable with 
			//the discrption
			return $this->description;
		}
	}


?>