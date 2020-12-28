<?php
function esc($var)
{
    //$enc = htmlentities($var, ENT_QUOTES);
    $enc = htmlspecialchars($var, ENT_QUOTES);
    return $enc;
}

class keyS{

    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'ice0cjnea73dh';
    
    protected $Connector;
    
    public function __construct(){

        if (!isset($this->Connector)) {
            
            $this->Connector = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if (!$this->Connector) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
        return $this->Connector;
    }
}
?>