<?php
// access modifiers or identifiers
// public, private, protected
// public - can be accessed outside the class
// private - not accessible outside this class even in extended classes
// protected - can't acces from outside but can access from extended classes

class Customer
{
  private $id;
  private $name;
  // made accessible outside this class through the getEmail
  protected $email;
  private $balance;

  public function __construct($id, $name, $email, $balance)
  {
    echo 'The Constructor Ran...';
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->balance = $balance;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function __destruct()
  {
    echo 'The Destructor Ran...';
  }
}

// $customer = new Customer(1, 'Patrick', 'pat@gmail.com', 300);
// echo $customer->id;
// echo $customer->getCustomer(2);
// echo $customer->id;


// Inheritance
class Subscriber extends Customer
{
  public $plan;

  public function __construct($id, $name, $email, $balance, $plan)
  {
    parent::__construct($id, $name, $email, $balance);
    $this->plan = $plan;
  }
}


// $subscriber = new Subscriber(1, 'Patrick', 'pat@gmail.com', 300, 'premium');
// echo $subscriber-> getEmail();


// Abstract Classes
// An abstract class can't be instantiated. You don't use directly but only use it through it's extended children
/*
  Abstract classes and methods are when the parent class has a named method, but need its child class(es) to fill out the tasks. 
  An abstract class is a class that contains at least one abstract method. 
  An abstract method is a method that is declared, but not implemented in the code.
*/
abstract class Athlete
{
  protected $id;
  protected $name;
  protected $sport;
  protected $gender;

  public function __construct($id, $name, $sport, $gender)
  {
    $this->id = $id;
    $this->name = $name;
    $this->sport = $sport;
    $this->gender = $gender;
  }

  abstract public function getName();
}

// will raise error
// $athlete = new Athlete(2, 'John', 'football', 'male');


class Footballer extends Athlete
{
  public function __construct($id, $name, $gender)
  {
    parent::__construct($id, $name, 'football', $gender);
  }

  public function getName()
  {
    echo $this->name;
  }
}

// $player = new Player(1, 'Patrick', 'pat@gmail.com', 300);

// $footballer = new Footballer(2, 'John', 'male');
// $footballer->getName();


// Static Properties and Methods
class User
{
  public $username;
  public $password;
  // you don't need to instantiate staic properties and methods
  public static $passwordLength = 5;

  public static function getPasswordLength()
  {
    // use self:: for static properties
    echo self::$passwordLength;
  }
}

// User::getPasswordLength(); // 5
// echo User::$passwordLength; // 5
