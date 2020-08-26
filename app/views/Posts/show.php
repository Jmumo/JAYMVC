<?php
require APPROOT . '/views/inc/header.php'; ?>


<div class="container">
    <div class="mt-3">

        <a href="<?php echo URLROOT; ?>/posts" class="btn btn-link bg-light"><span class="text-capitalize">back <i
                        class="fa fa-backward"></i></span></a>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4 mt-4">

                <img class="card-img-top" src="<?php echo URLROOT ?>/images/<?php echo $data['post']->image; ?>"
                     alt="Card image cap"/>
                <div class="card-body">
                    <h2 class="card-title"> <?php echo $data['post']->title; ?></h2>
                    <p class="card-text"> <?php echo $data['post']->body; ?>Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Reiciendis
                        aliquid
                        atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero
                        voluptate voluptatibus possimus, veniam magni quis!</p>

                </div>
                <div class="card-footer text-muted">
                    Posted on <?php echo $data['post']->created_at ?>
                    <a href="#"><?php echo $data['post']->name ?></a>

                </div>


            </div>
            <p class="lead text-capitalize ml-5">add comments</p>
            <form action="<?php echo URLROOT ?>/comments/add" method="POST" id="commentform">
                <div class="row">
                    <div class="col">
                        <textarea name="comment" id="text" cols="70" rows="3"
                                  class="ml-2<?php echo (!empty($data['comments_err'])) ? 'is-invalid' : ''; ?>"></textarea>
                        <input type="hidden" name="post_id" value="<?php echo $data['post']->PostId; ?>">
                        <span class="invalid-feedback"><?php echo $data['comments_err']; ?></span>
                    </div>
                    <div class="col">
                        <input type="submit" value="submit" class="btn bg-warning mr-2 text-capitalize pull-right">
                    </div>
                </div>

            </form>
            <hr>
            <div>


                <?php foreach ($data['comments'] as $comments) : ?>

                    <div class="media d-block d-md-flex mt-3">
                        <img class="d-flex mb-3 mx-auto "
                             src="<?php echo URLROOT ?>/images/avatar/<?php echo $comments->avatar; ?>" width="65"
                             height="65" alt="...">
                        <div class="media-body text-center text-md-left ml-md-3 ml-0">
                            <h5 class="mt-0 font-weight-bold text-warning"><?php echo $comments->name ?>
                                <a href="" class="pull-right">
                                    <small class="mr-5"><?php echo $comments->Tim; ?></small>
                                    <i class="fa fa-reply"></i>
                                </a>
                            </h5>

                            <?php echo $comments->comments ?>
                        </div>
                    </div>


                <?php endforeach ?>


            </div>
        </div>
        <hr>
        <?php if ($data['post']->user_id == $_SESSION['id']): ?>
        <div class="row">
            <div class="col mb-3">
                <a href="<?php echo URLROOT ?>/posts/edit/<?php echo $data['post']->id ?>"
                   class="btn btn-primary btn-block text-capitalize">edit</a>
            </div>
            <div class="col mb-3">
                <form action="<?php echo URLROOT ?>/posts/delete/<?php echo $data['post']->id ?>" method="post">
                    <input type="submit" value="delete" class="btn btn-danger btn-block text-capitalize">
                </form>
            </div>

            <?php endif; ?>


        </div>


    </div>
</div>
</div>
</div>


<!--
<script>
    document.getElementById('commentform').addEventListener('submit', subcomment);

    function subcomment(e) {
        e.preventDefault();

        var comments = document.getElementById('text').value;

        var params = "name" + comments;

        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'index.php', true);

        xhr.onload = function () {
            console.log(this.responseText);
        }

        xhr.send();
    }
</script> -->
