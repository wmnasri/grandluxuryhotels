<?php
namespace Leave\Model;

use Zend\Db\TableGateway\TableGateway;
use Leave\Model\Employee;
use Leave\Model\Leave;

class EmployeeRepository extends TableGateway
{
    public function findAll()
    {
        $resultSet = $this->select(['status' => Employee::STATUS_EMPLOYEE]);
        return $resultSet->toArray();
    }
    
    public function findAllPending()
    {
        $select = $this->sql->select();
        $select->columns(['name']);
        $select->join('leave', 'employee.id = leave.employee_id');
        $select->where(['leave.status' => Leave::STATUS_PENDING]);
        
        $resultSet = $this->selectWith($select)->toArray();
        
        return $resultSet;   
    }
    
    public function getRoleByLogin($identifiant)
    {
         $resultSet = $this->select(['login' => $identifiant]);
         return $resultSet->toArray();
    }
}

?>