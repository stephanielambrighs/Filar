<?php

include_once(__DIR__ . "/Db.php");

class User{
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
        `password`,`data_of_birth`,`street`,`city`,`province`,`country`,`plastic_tracker_id`,`personal_code`)
        values (:firstname, :lastname , :email, :password, :date_of_birth,
        :street, :city, :province, :country, :plastic_tracker_id, :personal_code)");
        $statement->bindValue(':firstname', "John");
        $statement->bindValue(':lastname', "Doe");
        $statement->bindValue(':email', $this->email);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':date_of_birth', "1995-06-08");
        $statement->bindValue(':street', "Zandpoortvest");
        $statement->bindValue(':city', "Mechelen");
        $statement->bindValue(':province', "Antwerpen");
        $statement->bindValue(':country', "Belgium");
        $statement->bindValue(':plastic_tracker_id', 1);
        $statement->bindValue(':personal_code', "filar");
        return $statement->execute();
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