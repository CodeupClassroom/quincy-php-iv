<?php 

    require_once __DIR__ . "/../park_logins.php";
    require_once __DIR__ . "/../db_connect.php";
    require_once __DIR__ . "/../Input.php";

    function getParksCount($connection) {

        $countQuery = "SELECT COUNT(*) FROM parks";
        $stmt = $connection->query($countQuery);
        $count = (int) $stmt->fetchColumn();

        return $count;

    }

    function getAllParks($connection, $limit = 2, $offset = 0)
    {
        $selectString = "SELECT * FROM parks LIMIT $limit OFFSET $offset";
        $stmt = $connection->query($selectString);         
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function pageController($connection)
    {
        $data = [];

        $page = Input::escape(Input::get('page', 1));
        $recordsPerPage = Input::escape(Input::get('recordsPerPage', 4));
        $parks = getAllParks($connection, $recordsPerPage, (($page - 1) * $recordsPerPage));

        $data["page"] = $page;
        $data["parks"] = $parks;
        $data["recordsPerPage"] = $recordsPerPage;
        $data['parksCount'] = getParksCount($connection);


        return $data;
    }

    extract(pageController($connection));

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon"> 
    <title>National Parks</title>

     <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style type="text/css">
        
        h4 {
            font-weight: 400;
        }

    </style>
</head>
<body>
    <main class="container">
        
        <h1 class="text-center">National Parks</h1>

        <div class="row text-center">
            
            <a class="col-lg-4" href="?page=<?=$page?>&recordsPerPage=4">4 Per Page</a>
            <a class="col-lg-4" href="?page=<?=$page?>&recordsPerPage=10">10 Per Page</a>
            <a class="col-lg-4" href="?page=1&recordsPerPage=100">100 Per Page</a>
            
        </div>

        <?php foreach($parks as $park) : ?>
              
            <div class="well text-center">
                <h3><?= $park['name'] ?></h3>
                <h4><strong>State:</strong> <?= $park['location'] ?></h4>
                <h4><strong>Established:</strong> <?= $park['date_established'] ?></h4>
                <h4><strong>Area in acres:</strong> <?= $park['area_in_acres'] ?></h4>
            </div>

        <?php endforeach; ?>


        <div class="row">

            <div class="col-lg-1 col-lg-offset-5">
                
                <?php if ($page > 1) : ?>
                    <a class="btn btn-primary center-block" href="/national_parks.php?page=<?php echo ($page - 1) ?>&recordsPerPage=<?=$recordsPerPage?>">Prev</a>
                <?php endif; ?>
                
            </div>

            <div class="col-lg-1">
                
                <?php if ($page < ($parksCount / $recordsPerPage)) : ?>
                    <a class="btn btn-primary center-block" href="/national_parks.php?page=<?php echo ($page + 1) ?>&recordsPerPage=<?=$recordsPerPage?>">Next</a>
                <?php endif; ?>
                
            </div>
        </div>
        
    </main>


    <!-- jQuery Version 2.2.4 -->
    <script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    
</body>
</html>