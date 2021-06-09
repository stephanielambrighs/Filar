<?php

include_once(__DIR__ . "/Db.php");


class User
{   
    //----------PLASTIC TRACKER----------

    public function allDelivered($id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT delivered_plastic FROM plastic_tracker WHERE user_id = :user_id");
        $statement->bindValue(":user_id", $id);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public function allDeliveredSum($email){
        $array = $this->allDelivered($email);
        $deliveries = array();
        foreach($array as $a){
            array_push($deliveries, $a["delivered_plastic"]);
        }
        $arraySum = array_sum($deliveries);
        return $arraySum;
    }

    public function plasticTracker($email){
        $totalPlastic = $this->allDeliveredSum($email);
        $currentPlastic = explode(".", $totalPlastic);
        return $currentPlastic;
    }

    //----------INLEVERGESCHIEDENIS----------

    public function deliveryHistory($id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT * FROM plastic_tracker WHERE user_id = :user_id ORDER BY id DESC");
        $statement->bindValue(":user_id", $id);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    //----------AANKOOPGESCHIEDENIS----------

    public function purchaseHistory($id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT * FROM ilya_orders JOIN ilya_products ON ilya_orders.product_id = ilya_products.id WHERE ilya_orders.user_id = :user_id ORDER BY ilya_orders.id DESC");
        $statement->bindValue(":user_id", $id);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    //----------USER ID VIA EMAIL----------

    public function getId($email){
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT id FROM user WHERE email = :email");
        $statement->bindValue(":email", $email);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    //----------COUPONS----------

    public function getCoupons($id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT coupons_used FROM user WHERE id = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $coupons_used = $statement->fetch();
        return $coupons_used[0];
    }

    public function updateCoupons($id, $coupons_available){
        $coupons_used = $this->getCoupons($id);
        if($coupons_used == $coupons_available){
            throw new Exception("Je hebt geen bonnen meer over");
        } else {
            $coupons_used++;
            $conn = Db::getConnection();
            $statement = $conn->prepare("UPDATE user SET coupons_used = :coupons_used WHERE id = :id");
            $statement->bindValue(":id", $id);
            $statement->bindValue(":coupons_used", $coupons_used);
            $statement->execute();
            return $coupons_used;
        }
    }

    private $email;
    private $password;

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
        $statement->bindValue(':date_of_birth', "1997-01-01");
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
}