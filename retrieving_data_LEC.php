<?php

// REMEMBER TO REQUIRE YOUR OWN ENV TO ACCESS THE EMPLOYEES DB
require_once 'employees_env.php';
require_once 'db_connect.php';

// ============================================== READING DATA FROM DB


// ---- Create query and call query() method from the object created to make the DB connection) ----

	// $query = 'SELECT * FROM departments';
	// $stmt = $connection->query($query);
	// var_dump($stmt);


// ---- Getting information about results set (Metadata) ----

	// echo $stmt->columnCount() . PHP_EOL;
	// echo $stmt->rowCount() . PHP_EOL;


// ---- Fetching Data ----


	// Caveman way of fetching results...

	// $record1 = $stmt->fetch();
	// print_r($record1);

	// $record2 = $stmt->fetch();
	// print_r($record2);




	// Dynamic way of fetching results

	// do {
	// 	$result = $stmt->fetch();
	// 	print_r($result);
	// } while ($result);


	// Alternative syntax

	// while ($result = $stmt->fetch()) {
	// 	print_r($result);
	// }


// ---- Fetch Style ----


	// PDO::FETCH_ASSOC
	// while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
	// 	print_r($result);
	// }

	
	// PDO::FETCH_NUM

	// while ($result = $stmt->fetch(PDO::FETCH_NUM)) {
	// 	print_r($result);
	// }

	// PDO::FETCH_BOTH (default option)


// ---- Fetching All Data ----


	// MIXED or other results depending on what fetch style you pass in the method

	// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// print_r($results);

	

// ---- Outputting results (normally done in a view) ----

	// foreach ($results as $result) {
	// 	echo $result['dept_no'] . " " . $result['dept_name'] . PHP_EOL;
	// }



// ---- Fetching a piece of data from a single column ----

	// $result = $stmt->fetchColumn();

	// var_dump($result);

	










