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
        $selectString = "SELECT * FROM parks ORDER BY name LIMIT :limit OFFSET :offset";

        $preparedStmt = $connection->prepare($selectString);

        $preparedStmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $preparedStmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);

        $preparedStmt->execute();
         
        $rows = $preparedStmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function addPark($connection)
    {
        $name = Input::get('name');
        $location = Input::get('location');
        $area_in_acres = Input::get('area_in_acres');
        $date_established = Input::get('date_established');
        $description = Input::get('description');

        $date_established = date('Y-m-d', strtotime($date_established));

        if(!is_numeric($area_in_acres)) {
            echo "Area in acres must be numeric";
            return;
        }

        $insert = "INSERT INTO parks (name, location, area_in_acres, date_established, description) VALUES (:name, :location, :area_in_acres, :date_established, :description);";

        $statement = $connection->prepare($insert);

        $statement->bindValue(':name', $name, PDO::PARAM_STR);
        $statement->bindValue(':location', $location, PDO::PARAM_STR);
        $statement->bindValue(':area_in_acres', $area_in_acres, PDO::PARAM_STR);
        $statement->bindValue(':date_established', $date_established, PDO::PARAM_STR);
        $statement->bindValue(':description', $description, PDO::PARAM_STR);

        $statement->execute();
    }

    function pageController($connection)
    {
        $data = [];

        if(!empty($_POST)) {
            addPark($connection);
        }

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

        input {
            background-color: #E00;
        }

    </style>
</head>
<body>
    <main class="container">
        
        <h1 class="text-center">National Parks</h1>


        <section class="col-md-8">
            <div class="row text-center">
                
                <a class="col-lg-4" href="?page=<?=$page?>&recordsPerPage=4">4 Per Page</a>
                <a class="col-lg-4" href="?page=1&recordsPerPage=10">10 Per Page</a>
                <a class="col-lg-4" href="?page=1&recordsPerPage=100">100 Per Page</a>
                
            </div>
            <?php foreach($parks as $park) : ?>
                  
                <div class="well text-center">
                    <h3><?= $park['name'] ?></h3>
                    <h4><strong>State:</strong> <?= $park['location'] ?></h4>
                    <h4><strong>Established:</strong> <?= $park['date_established'] ?></h4>
                    <h4><strong>Area in acres:</strong> <?= $park['area_in_acres'] ?></h4>
                    <h4><strong>Description:</strong> <?= $park['description'] ?></h4>
                </div>

            <?php endforeach; ?>

            <div class="row">

                <div class="col-lg-1 col-lg-offset-5">
                    
                    <?php if ($page > 1) : ?>
                        <a class="btn btn-primary" href="/national_parks.php?page=<?php echo ($page - 1) ?>&recordsPerPage=<?=$recordsPerPage?>">Prev</a>
                    <?php endif; ?>
                    
                </div>

                <div class="col-lg-1">
                    
                    <?php if ($page < ($parksCount / $recordsPerPage)) : ?>
                        <a class="btn btn-primary" href="/national_parks.php?page=<?php echo ($page + 1) ?>&recordsPerPage=<?=$recordsPerPage?>">Next</a>
                    <?php endif; ?>
                    
                </div>
            </div>
        </section>
        <section class="col-md-4">
            <h3>Add a new park!</h3>
            <form method="POST" action="national_parks.php">
              <div class="form-group">
                <label for="name">Park name</label>
                <input type="text" class="form-control invalid" name="name" id="name" placeholder="Park name" autofocus required>
              </div>
              <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Location" required>
              </div>
              <div class="form-group">
                <label for="area_in_acres">Area in acres</label>
                <input type="text" class="form-control" id="area_in_acres" name="area_in_acres" placeholder="Area in acres" required>
              </div>
              <div class="form-group">
                <label for="date_established">Date Established</label>
                <input type="date" class="form-control" id="date_established" name="date_established" placeholder="Date established" required>
              </div>

              <textarea name="description" class="form-control" rows="3" placeholder="Provide park description here..."></textarea>
              
              <button type="submit" class="btn btn-default">Add park</button>
            </form>
        </section>

        
    </main>


    <!-- jQuery Version 2.2.4 -->
    <script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>