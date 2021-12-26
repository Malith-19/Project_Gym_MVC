<?php

class Coach extends Model implements Observer{

function __construct($mediator=0){
    parent::__construct();
    $this->messageMediator = $mediator;    //TODO   
    $this->email=0; 
}

function getData($email){
    return $this->db->select("Coach",0,array("Email"=>$email),1);
}


function updateDetails($email,$data){
    $this->db->update("Coach",
    array("LastName"=>$data['lname'],"FirstName"=>$data['fname'],"Age"=>$data['age'], "City"=>$data['city'],
    "Gender"=>$data['gender'],"Telephone"=>$data['tel']),array("Email"=>$data['email']),'ssdsss');
}

function getAllData($sort_arr=0,$orderField=0,$reverse=0){
    $fields = array("Email","FirstName","LastName","Gender");
    return $this->db->select("Coach",$fields,$sort_arr,0,$orderField,$reverse);
}

//Observer
public function update($data){
    $this->db->insert("notifications",array("Receiver_Email"=>$data['rec_email'],"Receiver_Type"=>"Coach","Notification_Type"=>$data['type'],"Details"=>$data['details']),'ssss');
}

//Mediator
function sendMessage($data){       //TODO     
    $this->messageMediator->sendMessage($data,$this);
}


}