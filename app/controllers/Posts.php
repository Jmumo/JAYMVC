<?php

class Posts extends Controller
{

    public function __construct()
    {

        if (!Posts::isLoggedIn()) {

            Posts::redirect('users/login');

        }

        $this->postModel = $this->model('Post');

        $this->commentModel = $this->model('comment');
    }

    public function index()
    {
        // Get posts
        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts
        ];

        Posts::view('posts/index', $data);
    }

    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $orinalimage = $_FILES['image']['name'];

            $tmp = $_FILES['image']['tmp_name'];


            $image = $this->imageupload($orinalimage, $tmp);


            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['id'],
                'image' => $image,
                'title_err' => '',
                'body_err' => ''
            ];

            if (empty($data['title'])) {
                $data['title_err'] = 'please enter the title';
            }
            if (empty($data['body'])) {
                $data['body_err'] = 'please enter the body text';
            }

            if (empty($data['title_err']) && empty($data['body_err'])) {


                if ($this->postModel->addpost($data)) {
                    Posts::flash('post added', 'post added successfully');


                    // die(home);
                } else {
                    die('ooopss');
                }

            } else {
                Posts::view('posts/add', $data);
            }


        } else {

            $data = [
                'title' => '',
                'body' => '',
            ];

            Posts::view('posts/add', $data);
        }

    }

    public function imageupload($data, $temp)
    {
        $location = 'images';

        $name1 = explode('.', $data);

        $time = time();

        $name2 = $name1[0] . $time . '.' . $name1[1];

        // copy($name2,$location);

        move_uploaded_file($temp, "images/" . $name2);

        return $name2;


    }

    public function show($id)
    {

        $post = $this->postModel->getpost($id);

        $comments = $this->commentModel->fetch($id);

        $data = [
            'post' => $post,
            'comments' => $comments
        ];

        // $data = $post;

        Posts::view('posts/show', $data);
    }

    public function edit($id)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $orinalimage = $_FILES['image']['name'];

            $tmp = $_FILES['image']['tmp_name'];


            $image = $this->imageupload($orinalimage, $tmp);


            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['id'],
                'image' => $image,
                'id' => $id,
                'title_err' => '',
                'body_err' => ''
            ];

            if (empty($data['title'])) {
                $data['title_err'] = 'please enter the title';
            }
            if (empty($data['body'])) {
                $data['body_err'] = 'please enter the body text';
            }

            if (empty($data['title_err']) && empty($data['body_err'])) {


                if ($this->postModel->updatepost($data)) {
                    Posts::flash('post added', 'post updated successfully');

                    Posts::redirect('posts');

                    die(home);
                } else {
                    die('ooopss');
                }

            } else {
                Posts::view('posts/edit', $data);
            }


        } else {

            $post = $this->postModel->getpost($id);

            if ($_SESSION['id'] != $post->user_id) {
                Posts::flash('auth', 'you have no authentication to the process');
                Posts::redirect('/post');
            }


            $data = [
                'title' => $post->title,
                'body' => $post->body,
                'image' => $post->image,
                'id' => $post->id
            ];


            Posts::view('posts/edit', $data);
        }

    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->postModel->delete($id)) {
                Posts::flash('auth', 'post removed');
                Posts::redirect('/posts');
            }

        }
    }


}


