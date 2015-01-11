<?php

class Ticket_Model extends MY_Model {
    
    protected $DB_TABLE = 'tiket';
    protected  $DB_TABLE_PK = 'id';
    
    /**
     * naziv ustanove.
     * @var string
     */
    public $poslodavac = "PBZ";
    /**
     *oznaka tiketa. 
     * @var string 
     */
    public $oznaka;
    /**
     * redni broj tiketa.
     * @var int 
     */
    public $rednibroj;
    /**
     * ocekivano vrijeme dolaska (h:min).
     * @var string 
     */
    public $ocekvrdolaska;
    /**
     * datum stvaranja tiketa.
     * @var date
     */
    public $vrijemestvaranja;
    public function getId() {
        return $this->DB_TABLE_PK;
        
    }
         
}