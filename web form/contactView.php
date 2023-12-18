<?php
// html code with test structure
?>
<!doctype HTML>
<html>
<head>
	<title>Contact Us</title>
</head>
<body>
  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // form submitted, processes data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $favorite_food = $_POST['favorite_food'];
        $comments = $_POST['comments'];

        // for now print data as an example
    echo "<h2>Contact Information:</h2>";
    echo "<p><strong>Name:</strong> $first_name $last_name</p>";
    echo "<p><strong>Phone Number:</strong> $phone</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Favorite Food:</strong> " . implode(', ', $favorite_food) . "</p>";
    echo "<p><strong>Comments:</strong> $comments</p>";
} else {

// display the form
?>
	<form method="post" action="index.php?action=contact">
		<h3>First Name: </h3><input type="text" name="first_name"><br />
		<h3>Last Name: </h3><input type="text" name="last_name"><br />
                <h3>Phone Number: </h3><input type="text" name="phone"><br />
		<h3>Email: </h3><input type="text" name="email"><br />
    <h3>Favorite Food: </h3><select name="favorite_food[]" multiple>
			<option value="">Chicken Nuggets</option>
			<option value="">French Fries</option>
			<option value="">Cheeseburger</option>
			<option value="">Pizza</option>
		</select>
		<br />
		<h3>Write Comments Here: </h3><br />
		<input type="text" name="comments" rows="2" cols="25">
		<br /><br />
		<input type="submit" value="submit">
	</form>
        <?php
}
?>
</body>
</html>