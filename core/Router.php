<?php




if(is_numeric($URI->action)){
   
    $URI->segments[3] =  $URI->segments[0];
    $URI->segments[0] = $URI->action;
   
     $URI->segments[2] = $URI->segments[3];
    $URI->action = "show";
    
    
}

if($URI->controller=="tag" && is_string( $URI->action)){
     $URI->segments[0] = $URI->action;
    $URI->action = "show";
}

if(in_array($URI->controller,$config['auth_controllers'])){
    
    if($URI->action!='login' && $URI->action!='show' && !$session->is_logged_in()){
            if($URI->controller == "admincp")
                $URI->redirect_to($URI->controller."/login");
            else
                $URI->redirect_to("");
       
    }
    
}
    
    
    



?>