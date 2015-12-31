<?php
namespace Leave\Model;

use Zend\Db\TableGateway\TableGateway;


class LeaveRepository extends TableGateway
{
    public function findAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }
    
    /**
     * @param integer $employeeId
     */
    public function getLeaveByEmplyee($employeeId)
    {
        $resultSet = $this->select(['employee_id' => $employeeId]);
        return $resultSet->toArray();
    }
    
    
    public function insertData($data) 
    {
        return $this->insert($data);
    }
    
    public function updateRequest($status, $leaveId)
    {
        return $this->update(['status' => $status], 'id = ' . $leaveId);
    }
    
}

?>