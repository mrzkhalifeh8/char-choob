<?

class Db
{
    private $connection;
    private static $db;
 
    public static function getInstance($option = null){
           /*
    after first call with or without option every time you call getInstance function 
    you get that first created instance 
    */
        if(self::$db == null){
            self::$db = new Db($option);
        }

        return self::$db;
    }
   
    public function __construct($option = null)
    {

        /*
         if recive option parameter use that data
         else read options from global variable named config
         */
        if ($option != null) {
            $host = $option['host'];
            $user = $option['user'];
            $pass = $option['pass'];
            $name = $option['name'];
        }else{
            global $config;
            $host = $config['db']['host'];
            $user = $config['db']['user'];
            $pass = $config['db']['pass'];
            $name = $config['db']['name'];
        }
        // Create connection
        $this->connection = new mysqli($host, $user, $pass, $name);
        // Check connection
        if ($this->connection->connect_error) {
            echo "Connection failed: " . $this->connection->connect_error;
            exit();
        }
        //set nameds to utf8 to show files in unicode format
        $this->connection->query("SET NAMES 'utf8'");
    }
    //return first record of query result
    public function first($sql)
    {
        $records = $this->query($sql);
        if ($records == null) {
            return null;
        }
        return $records[0];
    }

    //recive queries comes to db handler and save result into records variable
    public function query($sql)
    {
        $result = $this->connection->query($sql);
        if(!$result){
            echo "Query:" . $sql ." failed due to " . mysqli_error($this->connection);
            exit;
        }
        $records = array();
        if ($result->num_rows == 0) {
            return null;
        }
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $records[] = $row;
            // echo "note_id: " . $row["note_id"] . " - Fullname: " . $row["fullname"] . "<br>";
        }
        return $records;
    }
    
    //read private field value from outside
    public function connection()
    {
        return $this->connection;
    }
    //close the connection
    public function close()
    {
        $this->connection->close();
    }
}