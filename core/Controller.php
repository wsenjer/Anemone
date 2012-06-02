<?php


class Controller{
    
    protected $output='';
    protected $load='';
    protected $URI = '';
    protected $session = '';
    
    protected $pagination = "";
    protected $model = "";
    public function __construct($output,$load,$URI,$session,$model=""){
        
        $this->output = $output;
        $this->load = $load;
         $this->URI = $URI;
         $this->session = $session;
         $this->model = $model;
         $this->initialize();
     //   print  get_class(get_cl);
        
        
    }
    
    protected function redirect_to($path){
        	header('Location: '. $this->URI->base_url.$path , True,302);
		exit();
    }
    
    protected function pagination(){
        $pagination = $this->load->library("Pagination");
         
        $pagination->per_page = 5;
        $pagination->base_url = $this->URI->base_url;
        if($this->URI->controller!=""){
            $pagination->base_url .= $this->URI->controller;
        }
        if($this->URI->action!=""){
            $pagination->base_url .= "/".$this->URI->action;
        }
        if(!empty($this->URI->segments)){
            foreach ($this->URI->segments as $segment){
                $pagination->base_url .= "/".$segment;
            }
        }
        $pagination->current_page($_GET['page']);
        
        $this->pagination = $pagination;
        
    }
    
    protected function initialize(){
       $this->output->assign("options",$this->load->model("options")->find_one(1)->as_array()); 
    }
    
    protected function validate($rules){
        $errors = array();
        
        foreach($rules as $rule  ){
           
            if($rule['rule']=="empty"){
                
                if(trim($rule['value'])== ""){
                    $errors[] = $rule[$_SESSION['language'].'_message'];
                }
                
            }
            
        }
        
        return $errors;
        
        
    }
   
    
    
}

?>