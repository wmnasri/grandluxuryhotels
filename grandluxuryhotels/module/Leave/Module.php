<?php
namespace Leave;

use Zend\Db\ResultSet\ResultSet;
use Leave\Form\Entry as EntryForm;
use Leave\Model\LeaveRepository;
use Leave\Model\EmployeeRepository;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                'leave_service'         => 'Leave\Service\Leave',
                'leave_model_entry'     => 'Leave\Model\Leave',
                'leave_model_Employee'  => 'Leave\Model\Employee',
                'Leave_entry_filter'    => 'Leave\Form\EntryFilter',  
            ),
            'factories' => array(
                'leave_table' =>  function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $leaveTable =  new LeaveRepository('leave', $dbAdapter, null, $resultSetPrototype);
                    return $leaveTable;
                },
                'employee_table' =>  function($sm) {
                   
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $EmployeeTable =  new EmployeeRepository('employee', $dbAdapter, null, $resultSetPrototype);
                    return $EmployeeTable;
                },
                'request_leave_form' => function($sm) {
                    $entryForm = new EntryForm();
                    $entryForm->setInputFilter($sm->get('Leave_entry_filter'));
                    return $entryForm;
                }
            ),
        );
    }
}
