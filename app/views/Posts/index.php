<?php require APPROOT . '/views/inc/header.php'; ?>
<h1></h1>
<ul>
    <div class="container">

    <style>
    
    </style>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- <h1 class="my-4"><?php echo $data['title']; ?> -->
                    <!-- <small>Secondary Text</small> -->
                </h1>

                <!-- Blog Post -->

                <?php flash('post added')?>
                <?php flash('auth')?>
                <?php foreach($data['posts'] as $post) :?>
                

              
                <div class="card mb-4">
                    <img class="card-img-top" src="<?php echo URLROOT ?>/images/<?php echo $post->image?>"
                        alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title"> <?php echo $post->title ;?></h2>
                        <p class="card-text"> <?php echo $post->body ;?>Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Reiciendis
                            aliquid
                            atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero
                            voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a href="<?php echo URLROOT;?>/posts/show/<?php echo $post->PostId;?>" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                         Posted on <?php  echo $post->posttime?>
                        <a href="#"><?php echo $post->name?></a>
                    </div>
                   
                </div>

                

                  <?php endforeach?>

                <!-- Blog Post
                <div class="card mb-4">
                    <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title">Post Title</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis
                            aliquid
                            atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero
                            voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a href="#" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2020 by
                        <a href="#">Start Bootstrap</a>
                    </div>
                </div>

                <Blog Post -->
                <!-- <div class="card mb-4">
                    <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title">Post Title</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis
                            aliquid
                            atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero
                            voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a href="#" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2020 by
                        <a href="#">Start Bootstrap</a>
                    </div>
                </div>  -->

                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        <a class="page-link" href="#">&larr; Older</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <div>
                    <a href="<?php echo URLROOT?>/posts/add" class="btn btn-block bg-light bg text-capitalize">
                    <i class="fa fa-pencil"></i> &nbsp; add posts</a>
                </div>
                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">Web Design</a>
                                    </li>
                                    <li>
                                        <a href="#">HTML</a>
                                    </li>
                                    <li>
                                        <a href="#">Freebies</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">JavaScript</a>
                                    </li>
                                    <li>
                                        <a href="#">CSS</a>
                                    </li>
                                    <li>
                                        <a href="#">Tutorials</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature
                        the
                        new Bootstrap 4 card containers!
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->


</ul>

<?php require APPROOT . '/views/inc/footer.php'; ?>