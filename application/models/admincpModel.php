<?php
// <!-- phpDesigner :: Timestamp [11/4/2011 1:43:39 PM] -->

//TODO:VALIDATION
class admincpModel extends Model
{
    private $_salt = "#TRfd67Wk098"; // don't change this

   
    
    
    
    
   
    
   
    
    

  

   

    public function add_manager()
    {
        if (!empty($_POST)) {
            $validator = $this->load->library('Validator');
            if ($validator->isEmpty($_POST['name'])) {
                $errors['name'] = "خانة الاسم يجب أن لا تكون فارغة";
            }
            if ($validator->isEmpty($_POST['username'])) {
                $errors['username'] = "خانة اسم المستخدم يجب أن لا تكون خالية";
            }
            if (!$validator->isValidLength($_POST['password'], 5)) {
                $errors['password'] = "كلمة المرور يجب أن تتكون من 6 خانات أو أكثر";
            }
            if (!$validator->isValidEmail($_POST['email'])) {
                $errors['email'] = "البريد الإلكتروني غير صحيح";
            }
            if (empty($errors)) {
                $manager = $this->load->model("admin")->create();


                $manager->name = $_POST['name'];
                $manager->username = $_POST['username'];
                $manager->password = sha1(md5($_POST['password'] . $this->_salt));
                $manager->email = $_POST['email'];
                $manager->role = $_POST['role'];
                $manager->save();
                $this->URI->redirect_to('admincp/managers');
            } else {
                $this->output->flash($this->generate_errors_list($errors), 'error');
            }
        }
    }


    public function edit_manager($id)
    {
        $manager = $this->load->model("admin")->find_one($id);

        if (!empty($_POST)) {
            $validator = $this->load->library('Validator');
            if ($validator->isEmpty($_POST['name'])) {
                $errors['name'] = "خانة الاسم يجب أن لا تكون فارغة";
            }
            if ($validator->isEmpty($_POST['username'])) {
                $errors['username'] = "خانة اسم المستخدم يجب أن لا تكون خالية";
            }
            if (trim($_POST['password']) != "" && !$validator->isValidLength(
                $_POST['password'],
                5
            )) {
                $errors['password'] = "كلمة المرور يجب أن تتكون من 6 خانات أو أكثر";
            }
            if (!$validator->isValidEmail($_POST['email'])) {
                $errors['email'] = "البريد الإلكتروني غير صحيح";
            }
            if (empty($errors)) {
                $manager->name = $_POST['name'];
                $manager->username = $_POST['username'];
                if (trim($_POST['password']) != "") {
                    $manager->password = sha1(md5($_POST['password'] . $this->_salt));
                }
                $manager->email = $_POST['email'];
                $manager->role = $_POST['role'];
                $manager->save();
                $this->URI->redirect_to('admincp/managers');
            } else {
                $this->output->flash($this->generate_errors_list($errors), 'error');
            }
        }
    }
    public function find_managers()
    {
        $managers = $this->load->model("admin")->find_many();

        $managers = ORM::to_array($managers);

        return $managers;
    }

   
    public function add_page()
    {
        if (!empty($_POST)) {
            if (trim($_POST['name']) == "") {
                $errors['name'] = "اسم الصفحة يجب ألا يكون خالياً";
            }
            if (trim($_POST['content']) == "") {
                $errors['content'] = "محتوى الصفحة يجب ألا يكون خالياً";
            }
            if (empty($errors)) {
                $page = $this->load->model('pages');
                $page->create();
                $page->name = $_POST['name'];
                $page->content = $_POST['content'];
                $page->ar_name = $_POST['ar_name'];
                $page->ar_content = $_POST['ar_content'];
                $page->created = date("U");


                $page->save();
                $this->URI->redirect_to('admincp/pages');
            } else {
                $this->output->flash($this->generate_errors_list($errors), 'error');
            }
        }
    }


    public function edit_page($id)
    {
        $page = $this->load->model('pages')->find_one($id);

        if ($page) {
            if (!empty($_POST)) {
                if (trim($_POST['name']) == "") {
                    $errors['name'] = "اسم الصفحة يجب ألا يكون خالياً";
                }
                if (trim($_POST['content']) == "") {
                    $errors['content'] = "محتوى الصفحة يجب ألا يكون خالياً";
                }
                if (empty($errors)) {
                    $page->name = $_POST['name'];
                    $page->content = $_POST['content'];
                    $page->updated = date("U");
                    $page->ar_name = $_POST['ar_name'];
                    $page->ar_content = $_POST['ar_content'];

                    $page->save();
                    $this->output->flash("تم حفظ التعديلات بنجاح", "info");
                } else {
                    $this->output->flash($this->generate_errors_list($errors), 'error');
                }
            }

            $this->output->assign('page', $page->as_array());
        }
    }

    public function find_pages()
    {
        $pages = $this->load->model('pages')->find_many();
        return ORM::to_array($pages);
    }

    public function delete($id, $model)
    {
        $item = $this->load->model($model)->find_one($id);
        if ($item) {
            $item->delete();
        }
        exit;
    }
}
