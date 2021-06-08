<?php

include_once(__DIR__ . "/Db.php");


class User
{
    private $email;
    private $password;

    //----------PLASTIC TRACKER----------

    public function allDelivered(){
        $conn = Db::getConnection();
        $statement = $conn->query("SELECT delivered_plastic FROM plastic_tracker WHERE user_id = 1");
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public function allDeliveredSum(){
        $array = $this->allDelivered();
        $deliveries = array();
        foreach($array as $a){
            array_push($deliveries, $a["delivered_plastic"]);
        }
        $arraySum = array_sum($deliveries);
        return $arraySum;
    }

    public function plasticTracker(){
        $totalPlastic = $this->allDeliveredSum();
        $currentPlastic = explode(".", $totalPlastic);
        return $currentPlastic;
    }

    //----------INLEVERGESCHIEDENIS----------

    public function deliveryHistory(){
        $conn = Db::getConnection();
        $statement = $conn->query("SELECT * FROM plastic_tracker WHERE user_id = 1 ORDER BY id DESC");
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    //----------AANKOOPGESCHIEDENIS----------

    public function purchaseHistory(){
        $conn = Db::getConnection();
        $statement = $conn->query("SELECT * FROM ilya_orders JOIN ilya_products ON ilya_orders.product_id = ilya_products.id WHERE ilya_orders.user_id = 1");
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }


    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function register() {
        $options = [
            'cost' => 15
        ];
        $password = password_hash($this->password, PASSWORD_DEFAULT, $options);

        $conn = Db::getConnection();
        $statement = $conn->prepare("
        insert into user(`firstname`, `lastname`, `email`,
        `password`,`date_of_birth`,`street`,`city`,`province`,`country`,`personal_code`)
        values (:firstname, :lastname , :email, :password, :date_of_birth,
        :street, :city, :province, :country, :personal_code)");
        $statement->bindValue(':firstname', " ");
        $statement->bindValue(':lastname', " ");
        $statement->bindValue(':email', $this->email);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':date_of_birth', NULL);
        $statement->bindValue(':street', " ");
        $statement->bindValue(':city', " ");
        $statement->bindValue(':province', " ");
        $statement->bindValue(':country', " ");
        $statement->bindValue(':personal_code', " ");
        $result = $statement->execute();
        // var_dump($statement->errorInfo());
        return $result;
    }


    public function canLogin() {
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from user where email = :email");
        $statement->bindValue(":email", $this->email);
        $statement->execute();
        $dbUser = $statement->fetch();
        $hash = $dbUser["password"];
        if(password_verify($this->password, $hash)){
            return true;
        }else{
            return false;
        }
    }

    // load the profiel details for the user
    public static function loadProfile ($email) {
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from user where email = :email");
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}