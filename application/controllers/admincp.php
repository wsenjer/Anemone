<?php

class admincp extends Controller
{
    private $_salt = "#TRfd67Wk025"; // don't change this


    public function login()
    {
        if (!empty($_POST)) {
            $db = $this->load->model("admin");
            $admin = $db->select_expr('id,username as name')->where('username', $_POST['username'])->
                where('password', sha1(md5($_POST['password'] . $this->_salt)))->find_one();
            //print "SELECT * from admin WHERE username='".$_POST['username']."' AND password='".sha1(md5("2130663".$this->_salt))."' LIMIT 0,30";
           
            if ($admin) {
                $this->session->login($admin);
                $this->redirect_to('admincp/main');
            } else {
                $this->output->flash("Username/Password is wrong", "error");
                /// $this->redirect_to('admincp/login');
            }
        }
    }

    public function main()
    {
    }
    
    
  
      
    public function lists($action = "", $id = null)
    {
        switch ($action) {
            

            case "delete":
                $this->model->delete($id, "lists");

                break;

            

            default:
                $lists = $this->model->find_lists();
                $this->output->assign('lists', $lists);

        }
    }
    
    public function tags($action = "", $id = null)
    {
        switch ($action) {
            

            case "delete":
                $this->model->delete($id, "tags");

                break;

            

            default:
                $tags = $this->model->find_tags();
                $this->output->assign('tags', $tags);

        }
    }
    
    
    
    public function members($action = "", $id = null)
    {
        switch ($action) {
            

            case "delete":
                $this->model->delete($id, "members");

                break;

            

            default:
                $members = $this->model->find_members();
                $this->output->assign('members', $members);

        }
    }
   
    
   
  
  
    
  
    public function managers($action = "", $id = null)
    {
        switch ($action) {
            case "add":
                
                $this->model->add_manager();
              
               
                $this->output->render('manager_add');
                break;

            case "delete":
                $this->model->delete($id, "admin");

                break;

            case "edit":
                $manager = $this->load->model("admin")->find_one($id)->as_array();
                if (!empty($_POST)) {
                    $this->model->edit_manager($id);
                }
                $this->output->assign('manager', $manager);

                $this->output->render("manager_edit");
                break;

            default:
                $managers = $this->model->find_managers();
                $this->output->assign('managers', $managers);

        }
    }


    public function options()
    {
        if (!empty($_POST)) {
            $options = $this->load->model("options")->find_one(1);
            $options->app_name = $_POST['app_name'];
            $options->app_desc = $_POST['app_desc'];
           
            $options->app_keywords = $_POST['app_keywords'];
            
            $options->app_name_en = $_POST['app_name_en'];
            $options->app_desc_en = $_POST['app_desc_en'];
           
            $options->app_keywords_en = $_POST['app_keywords_en'];
            $options->save();
            $this->output->flash("تم تحديث الإعدادات بنجاح", "info");
        }
        $options = $this->load->model("options")->find_one(1)->as_array();
        $this->output->assign("options", $options);
    }
    
    public function pages($action = '', $id = null)
    {
        switch ($action) {
            case "add":
                
                $this->model->add_page();
              
               
                $this->output->render('page_add');
                break;

            case "delete":
                $this->model->delete($id, "pages");

                break;

            case "edit":
            //TODO:CHANGE THE CKEDITOR folder with a new version
                if (!empty($_POST)) {
                    $this->model->edit_page($id);
                } else {
                    $page = $this->load->model("pages")->find_one($id)->as_array();
                  
                    
                    $this->output->assign('page', $page);
                }

                $this->output->render("page_edit");
                break;

            default:
                $pages = $this->model->find_pages();
                $this->output->assign('pages', $pages);

        }
    }


    public function logout()
    {
        $this->session->logout();
        $this->redirect_to("admincp/login");
    }
}
