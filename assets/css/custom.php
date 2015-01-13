<?php header("Content-type: text/css");
?>
/*
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
*/
/* 
    Created on : 10.01.2015., 01:02:37
    Author     : Domagoj
*/

body{
    background-color: #D8D8D8;
    
    
}

.header {
    width: 100%;
    height: 200px;
    color: white;
    text-align: center;
    background-color: #086A87;
    padding-top: 10px;    
}
#nadzornik{
    height:150px;
}
/* ispis tiketa */
#print{
    height:100px;
}


.sustav{
    float:right;
    margin-left: 0px;
}
.sustav p {
    margin-right:50px;
}

.main {
    margin-left: 500px;
    
}

.mainNadzornik{
    float:left;
}
.choice{
    /*width:400px; height:100px;   default */
    max-width: 500px; 
    height: 80px;
    
    background-color: #F2F2F2;
    border: 3px solid black;
    margin: 10px 10px 10px 10px;
    color: blue;
    font-size:20px;
    
}

.choice:hover {
    background-color:#C8C8C8;
    cursor:pointer;
}

.text {
    text-align:center;
    margin: 0px 0px 0px 0px;
    padding-top: 30px;
    font-size: 20px;
}

.side{
    float:left;
}

.home{
    margin-top:10px;
}

.side-ticket{
    width:300px;
    height:120px;
    border: 3px solid black;
    margin-bottom: 50px;
    color:black;
}
.side-ticket h3 {
    text-align:center;
    
}


.opcije {
   	width: 400px;
    border: 3px solid black;
    margin: 10px 10px 10px 10px;
    color: blue; 
}
.opcije button, .opcije a {
    width:100%;
    background-color: #F2F2F2;
    color: blue;
}
.opcije button:hover, .opcije a:hover {
    background-color:#C8C8C8;
    color:blue;
    cursor:pointer;
}

/*#naslovOpcije-no-hover:hover{
    #result-side-menu li.li-no-hover:hover {
    background-color: transparent;
}*/

.opcije li{
    background-color: #F2F2F2;
    /*padding-top:0px;*/
    
}
.editOption{
    font-size:20px;
}
#default_message_overlay{
 position: absolute;
    display: block;
    width: -10px;
    color: grey;
    font-size:15px;

}
#addOption {
    padding-left:250px;
}
.editHead{
   padding-left:20px;
   padding-right:18px;
   margin-left:15px;
}
.form-group{
     margin: -20px 0px 0px 0px;
}


.ticket {
    font-size: 18px;
    font-weight: bold; 
    color: #0000FF;
}
.ticket td{
    text-align:center;
    color: #0000FF;
}
/*gumb za povratak s ticket na home*/
.back a{
    margin-left:5px;
    float:left;
    color:white;
    font-size:20px;
    text-decoration:none;
}

/* fonts */
.header, .choice, .side-ticket h3, .headerTicket, .liste, .ticket td, .back a, .sustav p{
    font-family: 'Rammetto One', cursive;
    font-family: 'Raleway', sans-serif;
    font-family: 'arial', sans-serif;
}

/*boje */
.dvadeset{
    font-size:20px;
}

.dvadesetpet{
    font-size:25px;
}

.trideset{
    font-size:30px;
}
.tridesetpet{
    font-size:35px;
}
.cetrdeset{
    font-size:40px;
}