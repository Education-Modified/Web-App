<?php

require_once 'instution.php';


//instalsing the objects for the test
$instutionArgumetns = array(
	'institution' => "AFSE",
	'id' => "0"
);

$instution1 = new instution($instutionArgumetns);

$teacherArgs = array(
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

$instution1->addTeacher(new user($teacherArgs));
//testing of everything
$numTests = 5;
$success = 0;

//for the instution class
print "\n########### TESTING instution class #############\n";
if(is_array($instution1->getTeachers()))
	$success++;
print 'instution.getTeachers '.is_array($instution1->getTeachers())."\n";

if(($instution1->getName() == "AFSE"))
	$success++;
print 'instution.getName '.($instution1->getName() == "AFSE")."\n";

if($instution1->getID() == 0)
	$success++;
print 'instution.getID '.($instution1->getID() == 0)."\n";

//for the USER CLASS
$teacher1 = $instution1->getTeachers();
print "\n########### TESTING user class #############\n";

if($teacher1[0]->checkPass('123'))
	$success++;
print 'user.checkPass '.($teacher1[0]->checkPass('123'))."\n";

if($teacher1[0]->changePass('123', '321') && $teacher1[0]->checkPass('321'))
	$success++;
print "user.changePass ".($teacher1[0]->checkPass('321'))."\n";

print "\n";

if($numTests == $success){
	print "Test passed!\n";
}
?>