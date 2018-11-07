<?php

// 19
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");

date_default_timezone_set("America/New_York");
echo "The time is " . date("h:i:sa");

mktime(hour,minute,second,month,day,year);

$d=mktime(11, 14, 54, 8, 12, 2014);
echo "Created date is " . date("Y-m-d h:i:sa", $d);

$d=strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>";

// 20
http://www.test.com/index.htm?name1=value1&name2=value2
if( $_GET["name"] || $_GET["age"] ) {
      echo "Welcome ". $_GET['name']. "<br />";
      echo "You are ". $_GET['age']. " years old.";
      
      exit();
   }
?>
<form action = "<?php $_PHP_SELF ?>" method = "GET">
	 Name: <input type = "text" name = "name" />
	 Age: <input type = "text" name = "age" />
	 <input type = "submit" />
</form>

<?php

// 21
include 'footer.php';

require 'noFileExists.php';

// 22
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("webdictionary.txt"));
fclose($myfile);

fwrite($myfile, $txt);

/*
r	Open a file for read only. File pointer starts at the beginning of the file
w	Open a file for write only. Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file
a	Open a file for write only. The existing data in file is preserved. File pointer starts at the end of the file. Creates a new file if the file doesn't exist
x	Creates a new file for write only. Returns FALSE and an error if file already exists
r+	Open a file for read/write. File pointer starts at the beginning of the file
w+	Open a file for read/write. Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file
a+	Open a file for read/write. The existing data in file is preserved. File pointer starts at the end of the file. Creates a new file if the file doesn't exist
x+	Creates a new file for read/write. Returns FALSE and an error if file already exists
*/
fread($myfile,filesize("webdictionary.txt"));

$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
echo fgets($myfile);

$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}

$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
// Output one character until end-of-file
while(!feof($myfile)) {
  echo fgetc($myfile);
}

// 23
setcookie(name, value, expire, path, domain, secure, httponly);
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

// set the expiration date to one hour ago
setcookie("user", "", time() - 3600);

// Start the session
session_start();

// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";

// to change a session variable, just overwrite it 
$_SESSION["favcolor"] = "yellow";

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

// 24
$file=fopen("welcome.txt","r"); // Warning: fopen(welcome.txt) [function.fopen]: failed to open stream: No such file or directory in C:\webfolder\test.php on line 2
if(!file_exists("welcome.txt")) {
  die("File not found");
} else {
  $file=fopen("welcome.txt","r");
}

/*
2	E_WARNING	Non-fatal run-time errors. Execution of the script is not halted
8	E_NOTICE	Run-time notices. The script found something that might be an error, but could also happen when running a script normally
256	E_USER_ERROR	Fatal user-generated error. This is like an E_ERROR set by the programmer using the PHP function trigger_error()
512	E_USER_WARNING	Non-fatal user-generated warning. This is like an E_WARNING set by the programmer using the PHP function trigger_error()
1024	E_USER_NOTICE	User-generated notice. This is like an E_NOTICE set by the programmer using the PHP function trigger_error()
4096	E_RECOVERABLE_ERROR	Catchable fatal error. This is like an E_ERROR but can be caught by a user defined handle (see also set_error_handler())
8191	E_ALL	All errors and warnings (E_STRICT became a part of E_ALL in PHP 5.4)
*/

function customError($errno, $errstr) {
  echo "<b>Error:</b> [$errno] $errstr";
}

set_error_handler("customError");

trigger_error("Value must be 1 or below",E_USER_WARNING);

// 25
throw new Exception("Value must be 1 or below");

try {
  checkNum(2);
  //If the exception is thrown, this text will not be shown
  echo 'If you see this, the number is 1 or below';
}

//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}

class customException extends Exception {
  public function errorMessage() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
    .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
    return $errorMsg;
  }
}

function myException($exception) {
  echo "<b>Exception:</b> " . $exception->getMessage();
}

set_exception_handler('myException');

throw new Exception('Uncaught Exception occurred');

// 27
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";

mysqli_close($conn);

// 28
// Create database
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}


// sql to create table
$sql = "CREATE TABLE MyGuests (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Julie', 'Dooley', 'julie@example.com')";

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);

/*
i - integer
d - double
s - string
b - BLOB
*/

// 29
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

// sql to delete a record
$sql = "DELETE FROM MyGuests WHERE id=3";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$sql = "SELECT * FROM Orders LIMIT 30";
$sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15";

// 30
SELECT * FROM UserTbl WHERE Username= 'Brian' and Password= '' or 1 = 1--

$stmt = $dbConnection->prepare('SELECT * FROM employees WHERE name = ?');
$stmt->bind_param('s', $name);

// 32
class Books {
  /* Member variables */
  var $price;
  var $title;
  
  /* Member functions */
  function setPrice($par){
     $this->price = $par;
  }
  
  function getPrice(){
     echo $this->price ."<br/>";
  }
  
  function setTitle($par){
     $this->title = $par;
  }
  
  function getTitle(){
     echo $this->title ." <br/>";
  }
}

$physics = new Books;
$physics->setTitle( "Physics for High School" );
$physics->getTitle();

// 34
class MyClass
{
  private function getProperty()
  {
      return "Hello";
  }
}
 
class MyOtherClass extends MyClass
{
  public function callProtected()
  {
      return $this->getProperty();
  }

  public static function plusOne()
  {
      return "This is plus";
  }
}

Fatal error: Call to private method MyClass::getProperty() from context 'MyOtherClass' in test.php on line 49

// 36
abstract class Mammal {
  protected $age_;
  //below are functions I think all mammals will have,including people
  abstract public function setAge($age);
  abstract public function getAge();
  abstract public function eat($food);
}
class Person extends Mammal {
  protected $job_; //Person's feature
  public function setAge($age){
    $this->age_ = $age;
  }

  public function getAge(){
    return $this->age_;
  }

  public function eat($food){
    echo 'I eat ' ,$food ,'today';
  }

  //People only attribute
  public function setJob($job){
     $this->job_ = $job;
  }
  public function getJob(){
     echo 'My job is ' , $this->job_;
  }

}

// 37
document.getElementById("demo").innerHTML = "Hello JavaScript";

// 38
<script>
document.getElementById("demo").innerHTML = "My First JavaScript";
</script>

var x = 5;
var y = 6;
var z = x + y;

// 39
$(selector).action()

$(this).hide() - hides the current element.

$("p").hide() - hides all <p> elements.

$(".test").hide() - hides all elements with class="test".

$("#test").hide() - hides the element with id="test".

// 40
$("p")

$("button").click(function(){
    $("p").hide();
});

$("button").click(function(){
    $("#test").hide();
});

$("button").click(function(){
    $(".test").hide();
});

$("p.intro")

$("p:first")

$("ul li:first")

$("ul li:first-child")

// 41
$(document).ready(function(){

   // jQuery methods go here...

});

/*
Here are some examples of actions that can fail if methods are run before the document is fully loaded:

Trying to hide an element that is not created yet
Trying to get the size of an image that is not loaded yet
*/

$(function(){

   // jQuery methods go here...

});

/*
moving a mouse over an element
selecting a radio button
clicking on an element
*/

$("p").click(function(){
  // action goes here!!
});

$("#p1").mouseenter(function(){
    alert("You entered p1!");
});

$("#p1").mouseleave(function(){
    alert("Bye! You now leave p1!");
});

$("#p1").mousedown(function(){
    alert("Mouse down over p1!");
});

$("#p1").mouseup(function(){
    alert("Mouse up over p1!");
});

$("p").on({
    mouseenter: function(){
        $(this).css("background-color", "lightgray");
    }, 
    mouseleave: function(){
        $(this).css("background-color", "lightblue");
    }, 
    click: function(){
        $(this).css("background-color", "yellow");
    } 
});

// 42
$("button").click(function(){
    $("p").hide("slow", function(){
        alert("The paragraph is now hidden");
    });
});

$("button").click(function(){
    $("p").hide(1000);
    alert("The paragraph is now hidden");
});

$("#p1").css("color", "red")
  .slideUp(2000)
  .slideDown(2000);

<button>Toggle between hiding and showing the paragraphs</button>

<p>This is a paragraph with little content.</p>
<p>This is another small paragraph.</p>

$("#hide").click(function(){
    $("p").hide();
});

$("#show").click(function(){
    $("p").show();
});

$("button").click(function(){
    $("p").toggle();
});

// 43
$("p").append("Some appended text.");

$("p").prepend("Some prepended text.");

$("img").after("Some text after");

$("img").before("Some text before");

$("#div1").remove();

$("#div1").empty();

$("p").remove(".test");

$("p").remove(".test, .demo");

$("button").click(function(){
  $("h1, h2, p").addClass("blue");
  $("div").addClass("important");
});

$("button").click(function(){
  $("h1, h2, p").removeClass("blue");
});

$("button").click(function(){
  $("h1, h2, p").toggleClass("blue");
});

$("p").css("background-color", "yellow");

// 44
$("button").click(function(){
    $.get("demo_test.php", function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
    });
});

$("button").click(function(){
    $.post("demo_test_post.php",
    {
        name: "Donald Duck",
        city: "Duckburg"
    },
    function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
    });
});

// 45
$.fn.greenify = function() {
    this.css( "color", "green" );
};
 
$( "a" ).greenify(); // Makes all the links green.

// 46
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"></head>

<div id="slider"></div>

$( function() {
  $( "#slider" ).slider();
} );





