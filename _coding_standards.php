<?php
/* coding standard guidelines */

// for if, for, while, foreach, switch, function etc.
// ALWAYS USE BRACKETS for routines
//e.g.
if(true){

}

// for if else
if(true){

}
else{ //else in the next line after the if's closing bracket

}

// for indents use TABS
function sample(){
	if(true){
		
	}
}

// for classes
class sampleclass{
	public function __construct(){
	
	}
	
	public function sample(){
	
	}
	
	//private functions at the very bottom of public functions
	private function samplePrivate(){
		
	}
}

// for function names
// use small leter at first word and camel case on suceeding words 
function sampleFunction(){
}

// for html inside a routine
if(true){
	?>
	<a>Hello World</a>
	<?php
}
//or
if(true){
	echo "<a>Hello World</a>";
}
//if in view you can use this
if(true){ echo "<a>Hello World</a>"; }


// prefer for loop than foreach and use a temporary variable for counting total
$t = count($arr);
for($i=0; $i<$t; $i++){
	echo "Hello World";
}

//when commenting codes
//DONT DO THIS
function sampleFunction(){
//	echo "Hello World 1";
//	echo "Hello World 2";
}

//instead do this
function sampleFunction(){
	//echo "Hello World 1";
	//echo "Hello World 2";
}


?>
<script>
//Javascript coding standards

//all 'new' functions and global variables should be declared under it's related object
//example, to create a jobs related function (saveJob) javascript function first declare a javascript object to contain that function 
var JobsObj = {}; //naming convention of the object should be Capital letter first then use camel case
Jobs.var; //an example of the object's propert
JobsObj.init = function(){ //always add an init function for object initialization
	
}
//saveJob method/function
JobsObj.saveJob = function(){
	...
}
//for ajax, setTimeout routines under a function, use callbacks
JobsObj.saveJob = function(callback){
	$.ajax( ... ... function(){
			...
			...
			calback();
		}
	);
}
</script>


MySQL Tables Creation Standards

Table names should be:
	1. Always in lowercase
	2. In plural form e.g.: site_users
	3. Undescore separated when multiple words e.g. site_users
	4. Always use InnoDB
	5. Collation and Charset should be utf8-bin
	
Fields should be:
	1. Always in lowercase e.g. dateadded
	2. Always typed as one word (no separators) even if the field is multiple words e.g. dateadded
	this is to be able to easily identify a field from a table
	3. Should always consist of the following fields
		id - int(2) primary auto increment
		deleted - int(1) (value should always default to 0 and set to 1 when logically deleted in app, we should practice not deleting data in database anymore) 
		dateadded - datetime (in insert queries the value should always be NOW())
	4. Integer types should have no more than 3 length use just either int(1) or int(2) 
	read about mysql integer type if you don't understand this http://dev.mysql.com/doc/refman/5.7/en/integer-types.html	
	5. Varchar data types length should always be in binary length form 2, 4, 8, 16, 24, 32, 128, 256, 512, 1024 and so on e.g. varchar(32)
	 
	
		


















