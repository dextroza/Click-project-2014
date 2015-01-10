<?php

class TicketModel extends MY_Model {
    
    const DB_TABLE = 'tiket';
    const DB_TABLE_PK = 'id';
    
    /**
     * Publication unique identifier.
     * @var int
     */
    public $id;
    
    /**
     * naziv ustanove.
     * @var string
     */
    public $poslodavac;
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
            
}