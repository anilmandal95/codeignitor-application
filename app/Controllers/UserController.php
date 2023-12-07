<?php
namespace App\Controllers;
use CodeIgniter\Files\File;
use App\Models\UserModel;
class UserController extends BaseController
{
    public function index(): string
    {
        return view('public_layout');
    }
    public function userRegistration(){
        if ($this->request->getMethod() == "get") {
            # code...
            return view('register');
        }else if($this->request->getMethod() == "post"){
            $rules =[
                "username" => "required",
                "email" => "required",
                "password" => "required",
                "mobile" => "required",
                "userfile" => [
                    'label' => 'Image File',
                    'rules' => [
                        'uploaded[userfile]',
                        'is_image[userfile]',
                        'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                        'max_size[userfile,1000]',
                        'max_dims[userfile,1024,768]',
                    ],
                ],

            ];
            if(!$this->validate($rules)){
                //data not found block
                return view('register',[
                    "validation" => $this->validator
                ]);
            }else{
            // echo "post methos get call";
                $username = $this->request->getVar('username');
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $mobile = $this->request->getVar('mobile');
                $userprofile = $this->request->getFile('userfile');
                //echo "<pre>";
               // print_r($userprofile);
               if (!$userprofile->hasMoved()) {
                    $filepath = WRITEPATH . 'uploads/' . $userprofile->store();
                    $uploaded_fileinfo = new File($filepath);
                    $filename = esc( $uploaded_fileinfo->getBasename());
                }
                $data = [
                    "username" => $username,
                    "email" => $email,
                    "password" => $password,
                    "mobile" => $mobile,
                    "userfile" => $filename
                ];
            $model = new UserModel();
            if(!isset($data)){
                //data not set 
                echo "Data not set..! please set it again...";
            }else{
                //succes block
                    if($model->insert($data)){
                        $session = session();
                        $session->set('success_message', 'User registered successfully');
                        $session->markAsFlashdata('success_message');
                        return view('register');
                    }else{
                        echo "User not created";
                    }
           }
            
        }
      }
      
    }
    public function userLogin(){
       
        if ($this->request->getMethod() === "get") {
            return view('login');
        }else if($this->request->getMethod() == "post"){
            $rules = [
                'username' => 'required',
                'password' => 'required'

            ];
            // if ($this->validate([
            //     'username' => 'required',
            //     'password' => 'required'
            // ])) {
            //     # code...
            // }else{
            //     return redirect()->back()->withInput();
            // }
            if (!$this->validate($rules)) {
                return view('login',[
                    'validation' => $this->validator
                ]);
            }else{    
                $user = new UserModel();          
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');
                $record = $user->where("username", $username)
                         ->where("password", $password)
                         ->first();
                $session = session();
                if (is_null($record)) {
                    //record not found
                    $session->set('failed_message', 'record does not match. please try again');
                    $session->markAsFlashdata('failed_message');
                    return view('login');
                }else {
                    //record found
                    $session_data =[
                        "extracted_username" => $record['username'],
                        "extracted_password" => $record['password'],
                        "extracted_user_type" => $record['user_type'],
                         "logined" => "logined"
                    ];
                    $session->set($session_data);
                     if ($record['user_type'] == "admin") {
                        //admin-dashboard
                        return view('admin/dashboard/mainDashboard.php');
                     }else{
                        //user-dashbord
                        return view('dashboard/userDashboard');
                     }
                     
                }
            }
        } 
    }

    public function userDashboard(){

        return view('dashboard/userDashboard');
    }

    public function userLogout(){
        $session = session();
        session_unset();
        session_destroy();
        return redirect()->to(base_url());

    }
}
