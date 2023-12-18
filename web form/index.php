<?php 

// declares and set/reset $action PHP variable everytime the application runs

$action = NULL;

// declares the other variables when action runs
echo $first_name = "John";
echo $last_name = "Doe";
echo $email = "john@example.com";
echo $comments = "This is a test comment.";
echo $favorite_food= array("Chicken Nuggets", "French Fries", "Cheeseburger", "Pizza");
if ($favorite_food[0] == "Chicken Nuggets") {
  echo $favorite_food[0];
} else {
  echo $favorite_food[1];
} 

if ($favorite_food[2] = "Cheeseburger") {
  echo $favorite_food[2];
} else {
  echo $favorite_food[3];
}

// looks for action get parameter and if present assign to above declared action php variable

if (isset($_GET['action'])) {
   $action = filter_input(INPUT_GET, 'action');
}

// evaluates the $action variable and runs the appropriate function

switch($action){
  case 'contact':
    contact();
case 'home':
    home();
  // handles case when an unknown is specified
  case 'default':
  break;
}

// main functions are down here
// declares and set/reset the $postdata variable to false

function contact(){
	$postData = false;
        $errorMessages = [];

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$postData = true;
                // validates first name field
		$first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
                if (preg_match('/\d/', $first_name)) {
                   $errorMessages[] = "First name cannot contain digits.";
                }

               // validates last name field
		$last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
                if (preg_match('/\d/', $last_name)) {
                   $errorMessages[] = "Last name cannot contain digits.";
                }

               // validates phone number field
                $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);

               // validates email field
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errorMessages[] = "Invalid email address format.";
}

               // validates comments field
		$comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_SPECIAL_CHARS);
                if (preg_match('/[!@#$%^&*(),.?":{}|<>]/', $comments)) {
                   $errorMessages[] = "Comments cannot contain special characters.";
                }

               // Display error messages if any
               if (!empty($errorMessages)) {
                   foreach ($errorMessages as $errorMessage) {
                        echo "<p>Error: $errorMessage</p>";
                  }
               } else {
               // if all validations pass display success message
		include('views/contactView.php');
               }
    }
}


// home function which displays the home page

function home(){
	include('views/homeView.php');
}
?>