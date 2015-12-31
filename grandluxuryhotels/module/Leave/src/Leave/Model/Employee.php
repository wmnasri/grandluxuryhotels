<?php
namespace Leave\Model;

class Employee
{
    protected $id;
    
    protected $name;
    
    protected $status;
    
    const STATUS_EMPLOYEE = 0;
    
    const STATUS_ADMIN    = 1;   
    
    
    /**
     * return $id
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * return $name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param int $status
     */
    public function setSatatus($status)
    {
        $this->status = $status;
        return $this;
    }
    
    /**
     * return $status
     */
    public function getStatus()
    {
        return $this->status;
    }
    
}

?>