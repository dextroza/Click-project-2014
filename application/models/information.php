<?php

class Information extends MY_Model {
    
    protected $DB_TABLE = 'prikaz';
    protected  $DB_TABLE_PK = 'id';
   
    
    /**
     *vrijeme i datum  
     * @var boolean 
     */
    public $vrij_datum;
    
    /**
     * redni broj tiketa
     * @var boolean 
     */
    public $redni_br;
   
    /**
     * ukupan broj tiketa u danu
     * @var boolean 
     */
    public $ukupan_br;
    /**
     * očekivano vrijeme cekanja sljedećeg tiketa
     * @var boolean
     */
    public $pros_vri_cek;
   
    /**
     * pocetak radnog dana
     * @var boolean
     */
    public $poc_rada;
    /**
     * prosječno vrijeme čekanja klijenta
     */
    public $uk_pros_vri_cek; 
}
