<?php
/**
 * Interface class share variables and methods amoungs all classes which extends interface class e.g: BaseEmployee.
 * Interface class can not be initialized, it is being initialized by child class which extends it.
 * Interface methods do not have body defined in interface class e.g: getMonthlySalary.
 * It bounds all classes to declear all methods in child class e.g: getMonthlySalary.
 * Interface and abstract class are almost same but abstract class is class so,
 * with abstract class you have to use keyword extends to inherit the base class and with extends you cannot inherit more then one class
 * so you have to implement interface.
*/


/**
 * Interface baseClass
 */
interface BaseEmployee
{
  public function getFullName();

  public function getAge();

  public function getPhone();
}

/**
 * Interface salaryClass
 */
interface Salary
{
  public function getMonthlySalary();
  public function getAnnualSalary();
}

/**
 * Full time employee
 */
class FullTimeEmployee implements BaseEmployee,Salary
{
  protected $annualSalary = 900000;

  public function __construct($fname,$lname,$age,$phone)
  {
    $this->first_name = $fname;
    $this->last_name = $lname;
    $this->age = $age;
    $this->phone = $phone;
  }

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

  public function getMonthlySalary()
  {
    return $this->annualSalary / 12;
  }
  public function getAnnualSalary()
  {
    return $this->annualSalary;
  }

}


/**
 * Contract employee
 */
class ContractEmployee implements BaseEmployee,Salary
{
  protected $hourlyRate = 200;
  protected $totalHours = 190;

  public function __construct($fname,$lname,$age,$phone)
  {
    $this->first_name = $fname;
    $this->last_name = $lname;
    $this->age = $age;
    $this->phone = $phone;
  }

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

  public function getAnnualSalary()
  {
    return $this->annualSalary;
  }

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
