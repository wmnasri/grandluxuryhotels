<?php
namespace Leave\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Leave\Model\Leave;


class IndexController extends AbstractActionController
{
    private $entryService;
    
    public function getEntryService() 
    {
        if (!$this->entryService) {
            $this->entryService = $this->getServiceLocator()->get('leave_service');
        }
        
        return $this->entryService;
    }
    
    public function indexAction()
    {   
       
        $allEmployees = $this->getEntryService()->findAllPendingLeave();
        return new ViewModel([
                        'employees'   => $allEmployees,
                    ]);
    }
    
    public function listLeaveAction()
    {
        $idEmployee = $this->getEvent()->getRouteMatch()->getParam('id');
        $leaveByEmployee = $this->getEntryService()->findAllLeaveByEmployee($idEmployee);
        $requestForm = $this->getServiceLocator()->get('request_leave_form');
  
        return new ViewModel([
            'leaves'   => $leaveByEmployee,
            'idEmployee' => $idEmployee,
            'entryForm'   => $requestForm,
        ]);
    }
    
    public function addRequestAction ()
    {
        $idEmployee = $this->getEvent()->getRouteMatch()->getParam('id');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $dateDebut = new \DateTime($this->params()->fromPost('dateStart'));
            $dateFin = new \DateTime($this->params()->fromPost('dateEnd'));
            
            $data = [
                'employee_id' => $idEmployee,
                'start_date'  => $dateDebut->format('Y-m-d'),
                'end_date'    => $dateFin->format('Y-m-d'),
                'status'     => Leave::STATUS_PENDING,
                'comment'    =>$this->params()->fromPost('comment')
            ];
            $this->getEntryService()->addNewRequest($data);
            return $this->redirect()->toRoute('list-leave' , ['id' => $idEmployee]);
        }
    }
    
    public function refuseAction()
    {
        $idLeave = $this->getEvent()->getRouteMatch()->getParam('id');
        $this->getEntryService()->refuse($idLeave);
        return $this->redirect()->toRoute('leave');
    }
   
    public function validateAction ()
    {
        $idLeave = $this->getEvent()->getRouteMatch()->getParam('id');
        $this->getEntryService()->validate($idLeave);
        return $this->redirect()->toRoute('leave');
    }
    
    public function employeeAction()
    {
        $id = $this->getEvent()->getRouteMatch()->getParam('id');
        $leaveByEmployee = null;
        if (isset($id) && $id) {
            $leaveByEmployee = $this->getEntryService()->findAllLeaveByEmployee($id);
        }
        
        $allEmployees = $this->getEntryService()->findAllEmployee();
        
        return new ViewModel([
            'employees'     => $allEmployees,
            'leaveEmployee' => $leaveByEmployee,
            'id'            => $id
        ]);
    }
}
