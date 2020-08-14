<?php
/**
 * Abstract class share variables and methods amoungs all classes which extends abstract class e.g: BaseEmployee.
 * Abstract class can not be initialized, it is being initialized by child class which extends it.
 * Abstract methods do not have body defined in abstract class e.g: getMonthlySalary.
 * It bounds all classes to declear all methods in child class e.g: getMonthlySalary.
 * Multiple inheritance can cause ambiguity in few scenarios. One of the most common scenario is Diamond problem.
 * Here we have abstract classes A, B and C.
 * B and C inheriting from A.
 * Assume that B and C are overriding an inherited method and they provide their own implementation.
 * Now D inherits from both B and C doing multiple inheritance.
 * D should inherit that overridden method, which overridden method will be used?
 * Will it be from B or C? Here we have an ambiguity.
 * Abstract classes contains Abstract as well as Concrete (Non-abstract) methods.
 * We can have concrete methods in abstract class, we have to provide definitions to concrete methods So if you use multiple inheritance in abstract class A having method ‘a’ with one definition and abstract Class B having method ‘a’ with another definition and Class c inherits A and B then while choosing the method ‘a’ of both A and B, JVM will get confused, this will cause ambiguity.
 * Same goes to instance variables with same name.
 * To avoid these problem some programming languages such as JAVA,PHP,Python does not allow multiple inheritance through classes.
*/


/**
 * Abstract baseClass
 */
abstract class BaseEmployee
{

  protected $first_name;
  protected $last_name;
  protected $age;
  protected $phone;

  public function __construct($fname,$lname,$age,$phone)
  {
    $this->first_name = $fname;
    $this->last_name = $lname;
    $this->age = $age;
    $this->phone = $phone;
  }

  abstract public function getMonthlySalary();

  public function getFullName()
  {
    return $this->first_name .' '. $this->last_name;
  }

  public function getAge()
  {
    return $this->age;
  }

  public function getPhone()
  {
    return $this->phone;
  }

}

/**
 * Full time employee
 */
class FullTimeEmployee extends BaseEmployee
{
  protected $annualSalary = 900000;

  public function getMonthlySalary()
  {
    return $this->annualSalary / 12;
  }

}


/**
 * Contract employee
 */
class ContractEmployee extends BaseEmployee
{
  protected $hourlyRate = 200;
  protected $totalHours = 190;

  public function getMonthlySalary()
  {
    return $this->hourlyRate * $this->totalHours;
  }

}


$fullTime = new FullTimeEmployee('Full', 'Time', 25, '432423423');
echo $fullTime->getFullName() . PHP_EOL;
echo $fullTime->getMonthlySalary(). PHP_EOL;

$contract = new ContractEmployee('Contract', 'Time', 25, '432423423');
echo $contract->getFullName() . PHP_EOL;
echo $contract->getMonthlySalary(). PHP_EOL;
