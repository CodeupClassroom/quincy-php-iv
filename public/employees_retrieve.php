<?php 

// REMEMBER TO REQUIRE YOUR OWN ENV TO ACCESS THE EMPLOYEES DB
require_once __DIR__ . "/../db_connect.php";
require_once __DIR__ . "/../Input.php";

// var_dump($connection);
// die;

function pageController($connection) {

	$data = [];

	if (!empty($_REQUEST)) {

		$departments = 'SELECT dept_name FROM departments';
		$titles = 'SELECT DISTINCT title FROM titles';

		$request = Input::get('view');

		$query = ($request == 'departments') ? $departments : $titles;

		var_dump($query);

		$stmt = $connection->query($query);

		$data['results'] = $stmt->fetchAll(PDO::FETCH_NUM);

	} else {

		$data = ['results' => ''];

	}

	return $data;
		
}

extract(pageController($connection));

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon"> 
    
    <title>Employees Info</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
    crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="===PATH HERE===">

</head>

<body>

    <main class="container">
        
		<h1>Employees Info</h1>
	
		<?php if ($results !== '') : ?>

			<ul>
				
				<?php foreach ($results as $result): ?>
						
					<?php //var_dump($result) ?>
					
					<li><?= $result[0] ?></li>

				<?php endforeach ?>

			</ul>

		<?php endif ?>

		<a class="btn btn-primary" href="?view=departments">Departments</a>
		<a class="btn btn-primary" href="?view=titles">Titles</a>

    </main>
    
    <!-- jQuery Version 2.2.4 -->
    <script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
    crossorigin="anonymous"></script>

    <!-- Custom JS -->

    <script src="===PATH HERE==="></script>

</body>

</html>
