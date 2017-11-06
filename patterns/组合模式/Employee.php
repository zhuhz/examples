<?php
/**
 * 员工接口
 *
 */
interface Employee
{
	public function __construct($name, $salary);
	public function getName();
	public function getSalary();
	public function setRoles(array $roles);
	public function getRoles();
}

/**
 * 开发者
 *
 */
class Developer implements Employee
{
	protected $name;
	protected $salary;
	
	public function __construct($name, $salary)
	{
		$this->name = $name;
		$this->salary = $salary;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getSalary()
	{
		return $this->salary;
	}
	
	public function setRoles(array $roles)
	{
		$this->roles = $roles;
	}
	
	public function getRoles()
	{
		return $this->roles;
	}
}

/**
 * 设计师
 *
 */
class Designer implements Employee
{
	protected $name;
	protected $salary;
	
	public function __construct($name, $salary)
	{
		$this->name = $name;
		$this->salary = $salary;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getSalary()
	{
		return $this->salary;
	}
	
	public function setRoles(array $roles)
	{
		$this->roles = $roles;
	}
	
	public function getRoles()
	{
		return $this->roles;
	}
}