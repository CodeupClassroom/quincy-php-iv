<?php
require_once __DIR__ . "/park_logins.php";
require_once __DIR__ . "/Model.php";


class Park extends Model
{

    ///////////////////////////////////
    // Static Methods and Properties //
    ///////////////////////////////////

    public static $table = "parks";

    /**
     * returns the number of records in the database
     */
    public static function count() {
        // TODO: call dbConnect to ensure we have a database connection
        // TODO: use the $connection static property to query the database for the
        //       number of existing park records
        self::dbConnect();
        $stmt = self::$connection->query("SELECT count(id) from parks");

        $count = $stmt->fetch(PDO::FETCH_NUM);

        return $count[0];
    }

    /**
     * returns all the records
     */
    public static function all() {
        // TODO: call dbConnect to ensure we have a database connection
        // TODO: use the $connection static property to query the database for all the
        //       records in the parks table
        // TODO: iterate over the results array and transform each associative
        //       array into a Park object
        // TODO: return an array of Park objects
        
        self::dbConnect();

        $select = "SELECT * from parks";
        $statement = self::$connection->query($select);
        
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        $parks = [];
        foreach($results as $result) {
            $park = new Park();
            $park->id = $result['id'];
            $park->name = $result['name'];
            $park->location = $result['location'];
            $park->areaInAcres = $result['area_in_acres'];
            $park->dateEstablished = $result['date_established'];
            $park->description = $result['description'];

            $parks[] = $park;
        }

        return $parks;

    }

    /**
     * returns $resultsPerPage number of results for the given page number
     */
    public static function paginate($pageNo, $resultsPerPage = 4) {
        // TODO: call dbConnect to ensure we have a database connection
        // TODO: calculate the limit and offset needed based on the passed
        //       values
        // TODO: use the $connection static property to query the database with the
        //       calculated limit and offset
        // TODO: return an array of the found Park objects

        self::dbConnect();
        $limit = $resultsPerPage;
        $offset = ($pageNo * $resultsPerPage) - $resultsPerPage;

        $paginateQuery = "SELECT * FROM parks ORDER BY name LIMIT :limit OFFSET :offset";

        $preparedStmt = self::$connection->prepare($paginateQuery);

        $preparedStmt->bindValue(":limit", (int) $limit, PDO::PARAM_INT);
        $preparedStmt->bindValue(":offset", (int) $offset, PDO::PARAM_INT);

        $preparedStmt->execute();

        $results = $preparedStmt->fetchAll(PDO::FETCH_ASSOC);

        $output = [];

        foreach($results as $result) {
            $park = new Park();
            $park->id = $result['id'];
            $park->name = $result['name'];
            $park->location = $result['location'];
            $park->dateEstablished = $result['date_established'];
            $park->areaInAcres = $result['area_in_acres'];
            $park->description = $result['description'];

            $output[] = $park;
        }

        return $output;

    }

    /////////////////////////////////////
    // Instance Methods and Properties //
    /////////////////////////////////////


    /**
     * inserts a record into the database
     */
    protected function insert() {

        self::dbConnect();

        $insertQuery = "INSERT INTO parks (name, location, date_established, area_in_acres, description) VALUES(:name, :location, :date_established, :area_in_acres, :description)";

        $stmt = self::$connection->prepare($insertQuery);

        $stmt->bindValue(":name", $this->name, PDO::PARAM_STR);
        $stmt->bindValue(":location", $this->location, PDO::PARAM_STR);
        $stmt->bindValue(":date_established", $this->date_established, PDO::PARAM_STR);
        $stmt->bindValue(":area_in_acres", $this->area_in_acres, PDO::PARAM_STR);
        $stmt->bindValue(":description", $this->description, PDO::PARAM_STR);
    
        $stmt->execute();
        $this->id = self::$connection->lastInsertId();
    }

    protected function update()
    {
        self::dbConnect();

        $update = "UPDATE " . static::$table . " SET 
            name = :name,
            location = :location,
            area_in_acres = :area_in_acres,
            date_established = :date_established,
            description = :description
            WHERE id = :id";

        $statement = self::$connection->prepare($update);

        $statement->bindValue(":name", $this->name, PDO::PARAM_STR);
        $statement->bindValue(":location", $this->location, PDO::PARAM_STR);
        $statement->bindValue(":date_established", $this->date_established, PDO::PARAM_STR);
        $statement->bindValue(":area_in_acres", $this->area_in_acres, PDO::PARAM_STR);
        $statement->bindValue(":description", $this->description, PDO::PARAM_STR);
        $statement->bindValue(':id', $this->id, PDO::PARAM_INT);

        $statement->execute();

    }

    public static function find($id)
    {
        self::dbConnect();
        $query = "SELECT * from " . static::$table . " where id = :id";
        $statement = self::$connection->prepare($query);

        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        $park = new Park($result);
        
        return $park;

    }
}