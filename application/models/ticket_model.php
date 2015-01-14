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
   
    public function save(){
         if (isset($this->{$this->DB_TABLE_PK})) {
            $this->update();
        }
        else {
            $this->insert();
        }
        
    }
    
    public function insert(){
        $this->db->query("INSERT INTO tiket (poslodavac, oznaka, rednibroj,vrijemestvaranja) "
        . " VALUES('$this->poslodavac', '$this->oznaka', $this->rednibroj, NOW())");
    }
     private function update() {
        $this->db->update($this->DB_TABLE, $this, "$this->DB_TABLE_PK = $this->id");
    }     
}
