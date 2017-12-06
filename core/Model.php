<?php


class Model
{
    protected $output='';
    protected $load='';
    protected $URI = '';
    protected $session = '';
    protected $pagination = "";
    public function __construct($output, $load, $URI, $session)
    {
        $this->output = $output;
        $this->load = $load;
        $this->URI = $URI;
        $this->session = $session;
         
        //   print  get_class(get_cl);
    }
   
    
    protected function generate_errors_list($errors)
    {
        $list = "<ul>";
        foreach ($errors as $error) {
            $list .= "<li>".$error."</li>";
        }
        $list .= "</ul>";
        return $list;
    }
    public function get_news($limit)
    {
        $result = $this->load->model("news")->where("is_featured", 0)->order_by_desc("id")->limit($limit)->find_many();
        return (ORM::to_array($result));
    }
}
