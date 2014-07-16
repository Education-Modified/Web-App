#class refrance

this refrance probalby has some mistakes plz contact me if something is not right i wont be affedned, and yes i said plz because i can!!!!! 
______________

##User Class

###`function __construct( array $function_arumetns )`
the argumetns of this function are fed though a keyed array. each elemnt of the array has a key which matches the colom name in the mysql data base which the data is suplyed from. the reson why this is done is to make it extremly esasy to transfur the mysql data in to object form. 

####Delcoration Example
```
//create a the keyed array
$function_arumetns = array(
  'email_id' => 'mail@example.com',
  'sub_start_date' => '2011-01-07',
  'sub_end_date' => '2015-01-07',
  'first_name' => 'billy',
  'second_name' => 'bob',
  'password' => hash("sha1", '123'),
  'id' => '0',
  'portal_assigned' => 'Teacher,Collaboration',
  'user_type' => 'TEACHER',
  'institution_name' => 'AFSE'
  );
  
//initalisuing teacher
$teacher = new user($function_arumetns);
```
####peramitors

##### `'email_id'`
this element holds the **eamil** of a given user as a string. the  `email_id` also doubles as a user name for a teacher. 

#####`'sub_start_date'`
this element holds the date at which the users acount has/will become active the user. a user can not accsee his or her account if the start date has not passed. the date is spified by useing a `'YY-MM-DD'` format

##### `'sub_end_date'`
this element holds the date at which the the users acount becomes invalid if the spesifed date has passed the user acount will be unaxessable. simalr to the `'sub_start_date'` element the date is spified by useing a `'YY-MM-DD'` format

##### `'first_name'`
this element is pretty self explanotory it holds the frist name of the user. this is given as a basic string.

##### `'second_name'`
the second name is the last name of a user. this is given as a basic string

##### `'password'`
this element holds the password of the user has a hash **not the password litral** the system usese the `sha1` hash as the alogorimum. you can has any string litral by runing `hash("sha1", '123')`. 

##### `'id'`
this element holds the id that the spsific user was assigned to in the database. it can be a string or a intager

##### `'portal_assigned'`
this element holds which portals that this speific user can acsess. 

##### `'user_type'`
this element states wearhter or not a user is an admin or a teacher by givening it a string. for admin it should be set to  `'ADMIN'` and for teacher it should be set to `'TEACHER'`

##### `'institution_name'`
this elemetn holds the name of the istution *"school"* that the teacher works at. this elment is not reafranc to an instution object it is only a string which shares a name with one of the instutions in the data base.

___

### `public function hasExipred()`

this method checks to see if the users acount is still valid (weather or not the exporation date has passed) if the user acount has expired this method will return `true` it is still valid it will return `false`.
___

### `public function getInstitution()`

this method simply returns the the name of the instution that the teacher works at as a string. this method is used when the users are being incerted into a instuiton class (explaned in the intion class doucmetnation). this method dose not return a refrance to the instution object it only reutrns the name.

___

### `public function getEamil()`

this method reutrns the email of the user which doubles as the username for the user (teacher). this method reutnrs a stirng with the email in it. 

____

### `public function getName( $first_or_last )`

this method reutrns the first or last name of the user based on the state of the peramitor. both names are returnd as strings 

#### Delcoration Example

```
//user instance alreay dicaleaderd
$user = new user($args);

//this will print the frist name
print $user->getName("F");

//this will print the last name
print $user->getName("L");
```
####peramitors

##### `$first_or_last`
when `$first_or_last = "F"` it will reutrn the frist name when `$first_or_last = "L"` it will return the last name  of the user. 
___

###`public function checkPass( $password )`

this method checks to see if the password given is the same as the hashed password of the user. if the two password are equal this method will return `true` other wise it will reutnr `false`

#### Delcoration Example

``` 
//user instance alreay dicaleaderd and the password is set to "123"
$user = new user($args); 

//this will return false
$user->checkPass('321');

//this will return true
$user->checkPass('123');

```

####peramitors

##### `$password`

the password peramitor takes a string holds the unhased verstion of a password of the user. 

___
