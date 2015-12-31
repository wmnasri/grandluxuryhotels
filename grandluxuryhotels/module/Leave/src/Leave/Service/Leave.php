<?php
namespace Leave\Service;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;
use Leave\Model\Leave as LeaveModel;

class Leave implements ServiceManagerAwareInterface
{
    protected $serviceManager;
    
    protected $employeeTable;
    
    protected $LeaveTable;
    
    protected $requestLeaveForm;
    
    public function getLeaveTable()
    {
        if (!$this->LeaveTable) {
            $this->LeaveTable = $this->getServiceManager()->get('Leave_table');
        }
        return $this->LeaveTable;
    }
    
    public function getEmployeeTable()
    {
        if (!$this->employeeTable) {
            $this->employeeTable = $this->getServiceManager()->get('employee_table');
        }
        return $this->employeeTable;
    }
    
    public function getRequestLeaveForm()
    {
        if (!$this->requestLeaveForm) {
            $this->requestLeaveForm = $this->getServiceManager()->get('request_leave_form');
        }
        return $this->requestLeaveForm;
    }
    
    /**
     * @return \Zend\ServiceManager\ServiceManager
     */
    public function getServiceManager()
    {
        return $this->serviceManager;
    }
    
    /**
     * @see \Zend\ServiceManager\ServiceManagerAwareInterface::setServiceManager()
     */
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
        return $this;
    }
    
    public function findAllPendingLeave ()
    {
        return $this->getEmployeeTable()->findAllPending();
    }
    
    public function findAllEmployee()
    {
        return $this->getEmployeeTable()->findAll();
    }
    
    public function findAllLeaveByEmployee($emplyeeId)
    {
        return $this->getLeaveTable()->getLeaveByEmplyee($emplyeeId);
    }
    
    public function addNewRequest($data) 
    {
        $this->getLeaveTable()->insertData($data);
    }
    
    public function refuse($leaveId)
    {
        return $this->getLeaveTable()->updateRequest(LeaveModel::STATUS_REFUSED, $leaveId);
    }
     
    public function validate($leaveId)
    {
        return $this->getLeaveTable()->updateRequest(LeaveModel::STATUS_APPROVED, $leaveId);
    }
    
}