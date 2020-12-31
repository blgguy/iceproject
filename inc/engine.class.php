<?php
require_once('petrol.class.php');
class engine extends keyS
{


    public function dataDel($table, $uniqKey)
    {
        // Delete data from Table
        $sql    = "DELETE FROM `".$table."`";
        $sql    .= " WHERE id ='".$uniqKey."'";
        $query  = $this->Connector->query($sql);
        //return true;
        if ($query) {
            return true;
        }
    }

    public function branch()
    {
        $sql = "SELECT * FROM `branchesjhyt` ORDER BY branchName ASC";
        $array = array();
        $query = $this->Connector->query($sql);
        while ($row = $query->fetch_array()) {
            $array[] = $row;
        }
            
        return $array;
    }

     public function items()
    {
        $sql = "SELECT * FROM `items78fyu` ORDER BY title ASC";
        $array = array();
        $query = $this->Connector->query($sql);
        while ($row = $query->fetch_array()) {
             $array[] = $row;
        }
            
        return $array;
    }

    public function passCheck($password){

        $sql = "SELECT * FROM `mem74fi4rdh` WHERE password = '$password'";
        $query = $this->Connector->query($sql);

        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['password'];
        }
        else{
            return false;
        }
    }

    public function passUpdate($pass, $key)
    {        
        $SQL = "";
        $SQL .= "UPDATE `mem74fi4rdh`";
        $SQL .= " SET `password` ='$pass', `updatee` ='1' WHERE `uniqKey` ='$key'";
        $query = $this->Connector->query($SQL);
        if ($query) {
            return true;
        }
    }

    public function userUpdate($fname, $lname, $email, $key)
    {   
        $SQL = "";
        $SQL .= "UPDATE `mem74fi4rdh`";
        $SQL .= " SET `firstName` ='$fname', `lastName` ='$lname', `email` ='$email', `updatee` ='1' WHERE `uniqKey` ='$key'";
        $query = $this->Connector->query($SQL);
        if ($query) {
            return true;
        }
    }

    public function admLogin($username, $password){

        $sql = "SELECT * FROM `mem74fi4rdh` WHERE email = '$username' AND password = '$password' || username = '$username' AND password = '$password'";
        $query = $this->Connector->query($sql);

        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['uniqKey'];
        }
        else{
            return false;
        }
    }

    public function rndm()
    {
        $ky = 'abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
        $ky = substr(str_shuffle($ky), 0, 5);
        $ky = rand(397, 681).$ky.rand(737, 653);
        return $ky;
    }

     public function itemSent($items, $quantity, $branch, $staff, $date, $time)
    {
        $ky = '098765432%1abcdefghijklmno%pqrstuvwxyzABCDE%FGHIJKLMNOPQRSTUVWXYZ[()]';
        $ky = substr(str_shuffle($ky), 0, 25);
        $ky = rand(3937, 6581).$ky.rand(1937, 6593);
        $SQL = "INSERT INTO `sentitems` (`uniqKey`, `items`, `quantity`, `branch`, `staff`, `date`, `time`) VALUES ('$ky', '$items', '$quantity', '$branch', '$staff', '$date', '$time')";
        $query = $this->Connector->query($SQL);

        if ($query) {
            return true;
        }
    }

    public function itemsRequest($items, $quantity, $staff, $branch, $date, $time)
    {
        $ky = '0987654321abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ[()]';
        $ky = substr(str_shuffle($ky), 0, 25);
        $ky = rand(394237, 657081).$ky.rand(1937, 6593);
        $SQL = "INSERT INTO `request-items` (`uniqKey`, `items`, `quantity`, `branch`, `staff`, `date`, `time`) VALUES ('$ky', '$items', '$quantity', '$branch', '$staff', '$date', '$time')";
        $query = $this->Connector->query($SQL);

        if ($query) {
            return true;
        }
    }

    public function addItems($ttl)
    {
        $ky = '0987654321abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ[()]';
        $ky = substr(str_shuffle($ky), 0, 25);
        $ky = rand(3937, 6581).$ky.rand(1937, 6593);
        $SQL = "INSERT INTO `items78fyu` (`uniqKey`,`title`) VALUES ('$ky','$ttl')";
        $query = $this->Connector->query($SQL);

        if ($query) {
            return true;
        }
    }

// itemsreturn
// id uniqKey items quantity  staff branch  reason  difference  date  time  timestamp 
    public function itemsReturn($items, $quantity, $staff, $branch, $reason, $difference, $date, $time)
    {
        $ky = '098765432%1abcdefghijklmno%pqrstuvwxyzABCDE%FGHIJKLMNOPQRSTUVWXYZ[()]';
        $ky = substr(str_shuffle($ky), 0, 25);
        $ky = rand(3937, 6581).$ky.rand(1937, 6593);
        $SQL = "INSERT INTO `itemsreturn` (`uniqKey`, `items`, `quantity`, `staff`, `branch`, `reason`, `difference`, `date`, `time`) VALUES ('$ky', '$items', '$quantity', '$staff', '$branch', '$reason', '$difference', '$date', '$time')";
        $query = $this->Connector->query($SQL);

        if ($query) {
            return true;
        }
    }

    public function addStaff($firstname, $lasttname, $email, $passwd, $usernm, $rol, $branch)
    {
        $ky = '098765432%1abcdefghijklmno%pqrstuvwxyzABCDE%FGHIJKLMNOPQRSTUVWXYZ[()]';
        $ky = substr(str_shuffle($ky), 0, 25);
        $ky = rand(3937, 6581).$ky.rand(1937, 6593);
        $SQL = "INSERT INTO `mem74fi4rdh` (`uniqKey`,`firstName`,`lastName`,`email`,`username`,`password`,`codeKey`, `branch`) VALUES ('$ky','$firstname', '$lasttname', '$email', '$usernm', '$passwd', '$rol', '$branch')";
        $query = $this->Connector->query($SQL);

        if ($query) {
            return true;
        }
    }

    public function itemsleft($branch, $staff, $date, $time, $item, $quantity)
    {
        $ky = '098765432%1abcdefghijklmno%pqrstuvwxyzABCDE%FGHIJKLMNOPQRSTUVWXYZ[()]';
        $ky = substr(str_shuffle($ky), 0, 15);
        $ky = rand(394637, 659881).$ky.rand(10842, 65973);
        $SQL = "INSERT INTO `itemsleft` (`uniqKey`, `branch`, `staff`, `date`, `time`, `item`, `quantity`) VALUES ('$ky', '$branch', '$staff', '$date', '$time', '$item', '$quantity')";
        $query = $this->Connector->query($SQL);

        if ($query) {
            return true;
        }
    }
    //d uniqKey items   quantity    branch  date    time    dateAd
    public function addBranchItems($items, $quantity, $branch, $date, $time)
    {
        $ky = '098765432%1abcdefghijklmno%pqrstuvwxyzABCDE%FGHIJKLMNOPQRSTUVWXYZ[()]';
        $ky = substr(str_shuffle($ky), 0, 15);
        $ky = rand(394637, 659881).$ky.rand(1937, 6593);
        $SQL = "INSERT INTO `sentitems` (`uniqKey`, `items`, `quantity`, `branch`, `date`, `time`) VALUES ('$ky', '$items', '$quantity', '$branch', '$date', '$time')";
        $query = $this->Connector->query($SQL);

        if ($query) {
            return true;
        }
    }

    public function cashEndOfTheDay($name, $quantity, $branch, $staff, $date, $time)
    {
        $ky = '098765432%1abcdefghijklmno%pqrstuvwxyzABCDE%FGHIJKLMNOPQRSTUVWXYZ[()]';
        $ky = substr(str_shuffle($ky), 0, 25);
        $ky = rand(397, 581).$ky.rand(9327, 6259);
        $SQL = "INSERT INTO `cashEndOfTheDay` (`uniqKey`, `name`, `quantity`, `branch`, `staff`, `date`, `time`) VALUES ('$ky', '$name', '$quantity', '$branch', '$staff', '$date', '$time')";
        $query = $this->Connector->query($SQL);

        if ($query) {
            return true;
        }
    }
    
    public function addSignature($date, $time, $CarDiesel, $DeliveryCharges, $DeliveryOrder, $ATM, $Cash, $Transfer, $TotalExpemses, $TotalDiscount, $salesSystem, $signature, $branch)
    {
        $ky = '0987654321abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ[()]';
        $ky = substr(str_shuffle($ky), 0, 25);
        $ky = rand(39567, 58198).$ky.rand(93037, 65159);
        $SQL = "INSERT INTO `addsignature` (`uniqKey`, `date`, `time`, `CarDiesel`, `DeliveryCharges`, `DeliveryOrder`, `ATM`, `Cash`, `Transfer`, `TotalExpemses`, `TotalDiscount`, `salesSystem`, `signature`, `branch`) VALUES ('$ky', '$date', '$time', '$CarDiesel', '$DeliveryCharges', '$DeliveryOrder', '$ATM', '$Cash', '$Transfer', '$TotalExpemses', '$TotalDiscount', '$salesSystem', '$signature', '$branch')";
        $query = $this->Connector->query($SQL);

        if ($query) {
            return true;
        }
    }

    public function salesReport($date, $time, $delivery, $diesel, $carPetrol, $otherExpensive, $discount, $totalExpensive, $totalCash, $ATM, $totalSales, $salesInSystem, $diffrences, $sign, $brnch)
    {
        $ky = '098765432%1abcdefghijklmno%pqrstuvwxyzABCDE%FGHIJKLMNOPQRSTUVWXYZ[()]';
        $ky = substr(str_shuffle($ky), 0, 25);
        $ky = rand(397, 581).$ky.rand(937, 659);
        $SQL = "INSERT INTO `salesReport78u` (`uniqKey`, `date`, `time`, `delivery`, `diesel`, `carPetrol`, `otherExpensive`, `discount`, `totalExpensive`, `totalCash`, `ATM`, `totalSales`, `salesInSystem`, `diffrences`, `signature`, `branch`) VALUES ('$ky', '$date', '$time', '$delivery', '$diesel', '$carPetrol', '$otherExpensive', '$discount', '$totalExpensive', '$totalCash', '$ATM', '$totalSales', '$salesInSystem', '$diffrences', '$sign', '$brnch')";
        $query = $this->Connector->query($SQL);

        if ($query) {
            return true;
        }
    }

    public function signInLog($key, $username, $date, $time, $ip)
    {
        // id   userKey date    time    ipAddress 
        $SQL = "INSERT INTO `logstable` (`userKey`, `username`, `date`, `time`, `ipAddress`) VALUES ('$key', '$username', '$date', '$time', '$ip')";
        $query = $this->Connector->query($SQL);

        if ($query) {
            return true;
        }
    }

    public function view($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id ASC";
        $query = $this->Connector->query($sql);

        if($query->num_rows > 0){
            $postData = array();
            while ($row = $query->fetch_array()){
                $postData[] = $row;
            }
            return $postData;
        }else{
            return false;
        }
    }

    public function viewNoAdmin()
    {
        $sql = "SELECT * FROM `mem74fi4rdh` WHERE uniqKey != 'gufjgd8673rytgh876q34567trfuoesddsz'";
        $query = $this->Connector->query($sql);

        if($query->num_rows > 0){
            $postData = array();
            while ($row = $query->fetch_array()){
                $postData[] = $row;
            }
            return $postData;
        }else{
            return false;
        }
    }

     public function viewByBranch($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE branch = '".$id."'";
        $query = $this->Connector->query($sql);

        if($query->num_rows > 0){
            $postData = array();
            while ($row = $query->fetch_array()){
                $postData[] = $row;
            }
            return $postData;
        }else{
            return false;
        }
    }

    public function viewByDate($table, $date, $branch)
    {
        $sql = "SELECT * FROM $table WHERE `date` = '$date' AND `branch` = '".$branch."'";
        $query = $this->Connector->query($sql);

        if($query->num_rows > 0){
            $postData = array();
            while ($row = $query->fetch_array()){
                $postData[] = $row;
            }
            return $postData;
        }else{
            return false;
        }
    }

    public function branchReport($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE branch = '".$id."'";
        $query = $this->Connector->query($sql);

        if($query->num_rows > 0){
            $postData = array();
            while ($row = $query->fetch_array()){
                $postData[] = $row;
            }
            return $postData;
        }else{
            return false;
        }
    }

     public function allBranchReport($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE branch = '".$id."'";
        $query = $this->Connector->query($sql);
        
        $postData = array();
        while ($row = $query->fetch_array()){
            $postData[] = $row;
        }
        return $postData;
    }

    public function viewById($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE uniqKey = '".$id."'";
        $query = $this->Connector->query($sql);

        if($query->num_rows > 0){
            $postData = array();
            while ($row = $query->fetch_array()){
                $postData[] = $row;
            }
            return $postData;
        }else{
            return false;
        }
    }

    public function PassHash($password)
    {
        
        $pass = md5($password);
        return $pass;
    }

    public function im_logIn()
    {
        if (isset($_SESSION['icejkbcd87ryhsdcv386easbcdfg8732rhscve8wwe']))
    return true;
    }
    public function session()
    {
        return $_SESSION['icejkbcd87ryhsdcv386easbcdfg8732rhscve8wwe'];
    }


    public function rd($url)
    {
        header('Location: ' .$url);
        exit;
    }

}

?>