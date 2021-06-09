<?php

include_once(__DIR__ . "/Db.php");


class User
{
    private $id;
    private $firstname;
    private $lastname;
    private $date_of_birth;
    private $email;
    private $password;
    private $street;
    private $city;
    private $province;
    private $country;

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

     /**
     * Get the value of id
     */
    public function get_Id()
    {
        return $this->id;

    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    /**
     * Get the value of firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of date_of_birth
     */
    public function getDate_of_birth()
    {
        return $this->date_of_birth;
    }

    /**
     * Set the value of date_of_birth
     *
     * @return  self
     */
    public function setDate_of_birth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;

        return $this;
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

    /**
     * Get the value of street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set the value of street
     *
     * @return  self
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get the value of city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of province
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set the value of province
     *
     * @return  self
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get the value of country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */
    public function setCountry($country)
    {
        $this->country = $country;

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
        $statement->bindValue(':date_of_birth', "2000-01-01");
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
        $statement->bindValue(":email", $this->getEmail());
        $statement->execute();
        // var_dump($result);
        $dbUser = $statement->fetch();

        $hash = $dbUser["password"];

        if(password_verify($this->password, $hash)){
            return true;
        }else{
            return false;
        }
    }

    // load the profiel details for the user
    public static function loadProfile($email) {
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from user where email = :email");
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    public function updateProfile($userId){
        $options = [
            'cost' => 15
        ];
        $password = password_hash($this->password, PASSWORD_DEFAULT, $options);

        $conn = Db::getConnection();
        $statement = $conn->prepare("UPDATE user
        SET firstname = :firstname,
        lastname = :lastname,
        date_of_birth = :date_of_birth,
        password = :password
        WHERE id = :userid;");

        $statement->bindValue(':firstname', $this->getFirstname());
        $statement->bindValue(':lastname', $this->getLastname());
        $statement->bindValue(':date_of_birth', $this->getDate_of_birth());
        $statement->bindValue(':password', $password);
        $statement->bindValue(':userid', $userId);
        $result = $statement->execute();
        // var_dump($statement->errorInfo());
        return $result;
    }


    public function updateAdress($userId){
        $conn = Db::getConnection();
        $statement = $conn->prepare("UPDATE user
        SET street = :street,
        city = :city,
        province = :province,
        country = :country
        WHERE id = :userid;");

        $statement->bindValue(':street', $this->getStreet());
        $statement->bindValue(':city', $this->getCity());
        $statement->bindValue(':province', $this->getProvince());
        $statement->bindValue(':country', $this->getCountry());
        $statement->bindValue(':userid', $userId);
        $result = $statement->execute();
        // var_dump($statement->errorInfo());
        return $result;
    }


    public static function getProfileDetails($user_id) {
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from user where id = :id");
        $statement->bindValue(':id', $user_id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        // var_dump($result);
        return $result;
    }


}