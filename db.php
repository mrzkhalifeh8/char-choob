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