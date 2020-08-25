<?php

echo'loading';

class Comments extends controller{

    public function __construct(){

        $this->commentModel = $this->model('Comment');

        $this->postModel = $this->model('Post');

  
    }

    

    public function add(){

         if($_SERVER['REQUEST_METHOD']=='POST'){

 

         $data =[
         'comments' => trim($_POST['comment']),
         'post_id' => trim($_POST['post_id']),
         'user_id'=>$_SESSION['id'],


         'comments_err' => '',

         ];



         if(empty($data['comments'])) {

          $data['comments_err']='please add a comment';
            //   $post = $this->postModel->getpost($id);

         }else{

             $id=$data['post_id'];
 
           $post = $this->postModel->getpost($id);
           $this->commentModel->add($data);
           $comm = $this->commentModel->fetch($id);


            $data = [
            'post'=> $post,
            'comments'=>$comm
            ];

            comments::view('posts/show',$data );
        }
    }
        //    var_dump($_POST['comments']);
       

    

     }  

    
}
?>