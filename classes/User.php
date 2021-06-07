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
        $statement->bindValue(':firstname', " ");
        $statement->bindValue(':lastname', " ");
        $statement->bindValue(':email', $this->email);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':date_of_birth', "1997-01-01");
        $statement->bindValue(':street', " ");
        $statement->bindValue(':city', " ");
        $statement->bindValue(':province', " ");
        $statement->bindValue(':country', " ");
        $statement->bindValue(':plastic_tracker_id', 1);
        $statement->bindValue(':personal_code', " ");
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