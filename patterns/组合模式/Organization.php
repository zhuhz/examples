<?php
class Organization
{
	protected $employees;
	
	public function addEmployee(Employee $employee)
	{
		$this->employees[] = $employee;
	}
	
	// 获取净工资
	public function getNetSalaries()
	{
		$netSalary = 0;
		
		foreach ($this->employees as $employee) {
			$netSalary += $employee->getSalary();
		}
		return $netSalary;
	}
}

include 'Employee.php';

$john = new Developer('John Doe', 12000);
$jane = new Designer('Jane Doe', 15000);

// Add them to organization
$organization = new Organization();
$organization->addEmployee($john);
$organization->addEmployee($jane);

echo 'Net salaries:' . $organization->getNetSalaries(); // Net salaries:27000
