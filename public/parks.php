<?php  

require_once __DIR__ . '/../park_logins.php';
require_once __DIR__ . '/../db_connect.php';
require_once __DIR__ . '/../Input.php';

function pageController($connection)
{
    $data = [];

    $page = Input::get('page', 1);

    $limit = Input::get('quantity', 4);

    $offset = ($page - 1) * $limit;

    $query = "SELECT * from parks limit $limit offset $offset";

    $statement = $connection->query($query);

    $parks = $statement->fetchAll(PDO::FETCH_ASSOC);

    $data['parks'] = $parks;
    $data['page'] = $page;

    return $data;   
}

extract(pageController($connection));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    
</style>
</head>
<body>

<main class="container">
    <h1>Parky Parks</h1>

    <section class="container col-md-12 ">
        <?php foreach($parks as $park): ?>
            <div class="col-md-4">
                <h4><?= $park['name'] ?></h4>
                <p>Location: <?= $park['location'] ?></p>
                <p>Date Established: <?= $park['date_established'] ?></p>
                <p>Area in acres: <?= $park['area_in_acres'] ?></p>
            </div>
        <?php endforeach; ?>

        <a href="?page=<?= $page -1 ?>"  class="btn btn-default">Previous</a>

        <a href="?page=<?= $page + 1 ?>" class="btn btn-default">Next</a>

        <a href="?quantity=6" class="btn btn-info">Show 6 parks per page</a>
        <a href="?quantity=12" class="btn btn-info">Show 12 parks per page</a>

    </section>
    <section class="container col-md-4">
        
    </section>


</main>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>