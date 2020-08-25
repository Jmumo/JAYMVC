<?php
  class Users extends Controller {
    public function __construct(){

        $this->userModel = $this->model('User');

    }

    public function register(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

         $orinalimage = $_FILES['image']['name'];

         $tmp = $_FILES['image']['tmp_name'];


         $image = $this->imageupload($orinalimage,$tmp);

        // Init data
        $data =[
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
           'image' =>$image,
          'confirm_password' => trim($_POST['confirm_password']),
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        }else{

            // $data1 = [
            //     'email' => $data['email']
            // ];
            if($this->userModel->findUserByEmail($data['email'])){
              $data['email_err'] = 'email is already taken';
            }
        }

        // Validate Name
        if(empty($data['name'])){
          $data['name_err'] = 'Pleae enter name';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Pleae enter password';
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must be at least 6 characters';
        }

        // Validate Confirm Password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Pleae confirm password';
        } else {
          if($data['password'] != $data['confirm_password']){
            $data['confirm_password_err'] = 'Passwords do not match';
          }
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
          // Validated
          $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

          if ( $this->userModel->register($data)) {

            Users::flash('register_success','successfull you can log in');

               Users::redirect('users/login');
           
          }else{
              die('application on management');
          }

         ;
        } else {
          // Load view with errors
          $this->view('users/register', $data);
        }

      } else {
        // Init data
        $data =[
          'name' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Load view
        $this->view('users/register', $data);
      }
    }

    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',      
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        //check for user email
        if($this->userModel->findUserByEmail($data['email'])){

        }else{
          $data['email_err'] = 'user not found';
        }
        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
         //set logged in user
       $logindInUser = $this->userModel->login($data['email'],$data['password']);

       if ($logindInUser) {
         //set session
        $this->createSession( $logindInUser);
       }else{
         $data['password_err'] ="incorrect password";

          $this->view('users/login', $data);
       }

        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }
    }
    public function createSession($user){
      $_SESSION['id'] = $user->id;
      $_SESSION['name'] = $user->name;
      $_SESSION['email'] = $user->email;

    Users::redirect('posts/index');
    // $this->userModel->redirect('pages/index');
    }
    public function logout(){
      unset( $_SESSION['id']);
        unset( $_SESSION['name']);
          unset( $_SESSION['email']);
          Users::redirect('pages');

    }

public function imageupload($data ,$temp){
$location = 'images';

$name1 = explode('.',$data);

$time = time();

$name2 = $name1[0].$time .'.'.$name1[1];

// copy($name2,$location);

move_uploaded_file($temp,"images/avatar/".$name2);

return $name2;




}

    
  }