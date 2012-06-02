<?php

// This is a helper class to make paginating 
// records easy.
class Pagination {
	
  private $current_page;
  public $per_page;
  public $total_count;
  public $NextText= "التالي";
  public $PreviousText = "السابق";
  public $base_url = "";

  public function __construct($page=1, $per_page=5, $total_count=0){
  	$this->current_page = (int)$page;
    $this->per_page = (int)$per_page;
    $this->total_count = (int)$total_count;
  }

  public function offset() {
    // Assuming 20 items per page:
    // page 1 has an offset of 0    (1-1) * 20
    // page 2 has an offset of 20   (2-1) * 20
    //   in other words, page 2 starts with item 21
    return ($this->current_page - 1) * $this->per_page;
  }
  public function current_page($current_page){
    if(is_numeric($current_page) && $current_page>0){
        $this->current_page = $current_page;
    }else {
        $this->current_page = 1;
    }
  }
  public function total_pages() {
    return ceil($this->total_count/$this->per_page);
	}
	
  public function previous_page() {
    return $this->current_page - 1;
  }
  
  public function next_page() {
    return $this->current_page + 1;
  }

	public function has_previous_page() {
		return $this->previous_page() >= 1 ? true : false;
	}

	public function has_next_page() {
		return $this->next_page() <= $this->total_pages() ? true : false;
	}
    
    
    public function create_double($next="Next",$prev = "Previous"){
        
        $result = '<div id="actions">';
        if($this->has_previous_page()){
            $result .= '<div class="rightactions">
	<a href="'.$this->base_url.'?page='.(($this->current_page)-1).'" class="edit">
    '.$prev.'
	</a>
	</div>';
        }
        
        if($this->has_next_page()) { 
                $result .= '<div class="leftactions">
	<a href="'.$this->base_url.'?page='.(($this->current_page)+1).'">
	'.$next.'
	</a>
	</div>';
            
            }
            $result .="</div>";
            
            return $result;
        
    }
    public function create(){
       $result = ' <div id="pagination" style="clear: both;"> ';

    	if($this->total_pages() > 1) {
    		
		if($this->has_previous_page()) { 
    	$result .= "<a href=\"".$this->base_url."?page=";
      	$result .= $this->previous_page();
      	$result .= "\">&laquo; ".$this->PreviousText."</a> "; 
    }

		for($i=1; $i <= $this->total_pages(); $i++) {
			if($i == $this->current_page) {
				$result .= " <span class=\"selected\">{$i}</span> ";
			} else {
				$result .= " <a href=\"".$this->base_url."?page={$i}\">{$i}</a> "; 
			}
		}

		if($this->has_next_page()) { 
			$result .= " <a href=\"".$this->base_url."?page=";
			$result .= $this->next_page();
			$result .= "\">".$this->NextText." &raquo;</a> "; 
    }
		
	}


        $result .= "</div>";
        return $result;
    }


}

?>