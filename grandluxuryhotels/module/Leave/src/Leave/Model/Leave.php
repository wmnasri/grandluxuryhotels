<?php
namespace Leave\Model;

class Leave
{
    protected $id;
    
    protected $employeeId;
    
    protected $dateStart;
    
    protected $dateEnd;
    
    protected $status;
    
    protected $comment;
    
    const STATUS_PENDING = 1;
    
    const STATUS_APPROVED  = 2;
    
    const STATUS_REFUSED = 3;
    
    
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $employeeId
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * @return the $dateStart
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

     /**
     * @return the $dateEnd
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * @return the $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return the $comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param int $employeeId
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;
        return $this;
    }

    /**
     * @param \DateTime $dateStart
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
        return $this;
    }

    /**
     * @param \DateTime $dateEnd
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
        return $this;
    }

    /**
     * @param integer $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param  string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }
}

?>