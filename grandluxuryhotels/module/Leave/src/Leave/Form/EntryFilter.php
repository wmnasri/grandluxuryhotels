<?php
namespace Leave\Form;

use Zend\InputFilter\InputFilter;

class EntryFilter extends InputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'DateDebut',
            'required' => true,
            'filters' => array(
                array('name' => 'StringTrim')
            ),
           'validators' => array(
                    array(
                        'name' => 'Callback',
                        'options' => array(
                            'messages' => array(
                                    \Zend\Validator\Callback::INVALID_VALUE => 'The end date should be greater than start date',
                            ),
                            'callback' => function($value, $context = array()) {                                    
                                $startDate = \DateTime::createFromFormat('d-m-Y', $context['start_date']);
                                $endDate = \DateTime::createFromFormat('d-m-Y', $value);
                                return $endDate >= $startDate;
                            },
                        ),
                    ),                          
                ),
        ));
        
        $this->add(array(
            'name' => 'DateEnd',
            'required' => true,
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators'=>array(
                array(  
                    'name'=>'Date',
                    'break_chain_on_failure'=>true,
                    'options'=>array(
                        'format'=>'d/m/Y',
                        'messages'=>array(
                            'dateFalseFormat'=>'Invalid date format, must be d/m/yy', 
                            'dateInvalidDate'=>'Invalid date, must be d/m/yy'
                        ),
                    ),      
                ),      
                array(  
                    'name'=>'Regex',
                    'options'=>array(
                        'messages'=>array('regexNotMatch'=>'Invalid date format, must be d/m/yy'),
                        'pattern'=>'/^\d{1,2}-\d{1,2}-\d{4}$/',
                    ),      
                ),      
            ),   
        ));
    
        $this->add(array(
            'name' => 'emplyeeId',
            'required' => true,
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array('name' => 'NotEmpty'),
            ),
        ));
    }
}
