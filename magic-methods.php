<?php
/**
 * Magic methods class
 * These are used to set private and protected properties.
 */
class Employee
{
  public $first_name;
  public $last_name;

  protected $age;
  protected $phone;

  private $salary;

  private $args = [
    'isActive'=> true,
    'emailVerified'=>false,
    'isAdmin'=> true,
  ];

  public function __set($property, $value)
  {
    if ( array_key_exists( $property, $this->args ) ) {
      return $this->args[$property] = $value;
    }

    if ( property_exists( $this, $property ) ) {
      $this->$property = $value;
    }else {
      echo "Trying to set property '{$property}' to '{$value}', but it does not exist.";
    }
  }

  public function __get($property)
  {
    if ( property_exists( $this, $property ) ) {
      return $this->$property;
    }else {
      echo "Trying to access property {$property}, but it does not exist.";
    }
  }

  public function __call( $name, $args ){

    if ( array_key_exists( $name, $this->args ) ) {
      return $this->args[$name];
    }else {
      echo "Trying to access method {$name}, which does not exist.";
    }

  }

}

$employee = new Employee();

// Setting public properties
$employee->first_name = 'Foo';
$employee->last_name = 'Bar';

// Getting public properties
echo $employee->first_name.PHP_EOL;
echo $employee->last_name.PHP_EOL;

// But for accessing private and protected properties we need to magic mathods:
// Accessing protected property
$employee->age = 10;
echo $employee->age.PHP_EOL;

// Accessing private property
$employee->salary = 900000;
echo $employee->salary;

$employee->java;

$employee->salary(190,200);

$employee->isActive = 'no';
echo $employee->isActive();

echo $employee->isAdmin();
