<?php

class Options_Model extends MY_Model {
    
    protected $DB_TABLE = 'opcija';
    protected  $DB_TABLE_PK = 'id';
   
    
    /**
     *oznaka tiketa. 
     * @var string 
     */
    public $oznaka;
   
    /**
     * opis tiketa.
     * @var string 
     */
    public $opis;
    /**
     * velicina fonta opisa i oznake.
     * @var string
     */
    public $velfonta;
   
    /**
     * boja fonta opisa i oznake.
     * @var string
     */
    public $bojafonta;
    /**
     * status prikaza opisa i oznake.
     * @var date
     */
    public $status;
}