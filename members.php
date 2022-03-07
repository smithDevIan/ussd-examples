<?php 

class Member {
    protected $names;
    protected $phone;

    function __construct($phone){
        $this->phone = $phone;
    }

    //setters and getters
    public function getPhone(){
        return $this->phone;
    }
    /*public function register($pdo){
        try{
            $hashedPin = password_hash($this->getPin(), PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users(name, pin, phone, balance) values(?,?,?,?)");
            $stmt->execute([$this->getName(), $hashedPin, $this->getPhone(), $this->getBalance()]);
        }catch(PDOException $e){    
            echo $e->getMessage();
        }
    }*/
    public function readName($pdo){
        $stmt = $pdo->prepare("SELECT * FROM members WHERE phone=?");
        $stmt->execute([$this->getPhone()]);
        $row = $stmt->fetch();
        return $row['names'];
    }
}

?>