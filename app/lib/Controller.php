 <?php
 // this is the base controller loads the model and the views

 class controller
 {

    public function model($model){

        //require model files

        require_once '../app/models/'.$model.'.php';

        return new $model();

    }

    //load view
    public function view($view,$data = []){

        if(file_exists('../app/views/'. $view.'.php')){

            require_once '../app/views/'.$view.'.php';

        }else{

            //view does not exits

            die('view does not exisit');
 
        }

    }
    public function redirect($page){
        
    header('location: ' . URLROOT . '/' . $page);
    
    }

     function flash($name = '', $message = '', $class = 'alert alert-success'){
     if(!empty($name)){
         if(!empty($message) && empty($_SESSION[$name])){
             if(!empty($_SESSION[$name])){
      unset($_SESSION[$name]);
     }

     if(!empty($_SESSION[$name. '_class'])){
     unset($_SESSION[$name. '_class']);
     }

        $_SESSION[$name] = $message;
        $_SESSION[$name. '_class'] = $class;
     } elseif(empty($message) && !empty($_SESSION[$name])){
     $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
     echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
     unset($_SESSION[$name]);
     unset($_SESSION[$name. '_class']);
     }
     }
     }

     public function isloggedin(){
     if(isset($_SESSION['name'])){
     return true;
     }else{
     return false;
     }
     }
 }
 
 ?>