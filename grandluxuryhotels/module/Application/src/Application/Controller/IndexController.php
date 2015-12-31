<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $identifiant = $this->params()->fromPost('login');
            $employeeTbale = $this->getServiceLocator()->get('employee_table');
            $user = $employeeTbale->getRoleByLogin($identifiant);
            
            if ($user[0]['status'] == 1) {
                return $this->redirect()->toRoute('leave');
            } else {
                return $this->redirect()->toRoute('list-leave' , ['id' => $user[0]['id']]);
            }
        }
    }
}
