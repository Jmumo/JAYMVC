<?php
 require APPROOT . '/views/inc/header.php'; ?>

    <div class="row">
    <div class="col-md-8 mx-auto">
    <div class="card card-body bg-light mt-5 text-center mb-5">
        <h4 class="text-capitalize">Add post</h4>
        <p>Add a new post</p>

        <a href="<?php echo URLROOT;?>/posts" class="btn btn-light float-left"><span class="fa fa-backward"></span></a>

        <form action="<?php echo URLROOT;?>/Posts/add" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="title">Tilte <sup>*</sup></label>
                <input type="text" name="title"
                    class="form-control <?php echo(!empty($data['title_err'])) ? 'is-invalid':'';?> form-control"
                    value="<?php echo $data['title'];?>">
                <span class="invalid-feedback"><?php echo $data['title_err'];?></span>

            </div>
            <div class="form-group">
                <label for="name">Body<sup>*</sup></label>
                <textarea name="body"
                    class="form-control <?php echo(!empty($data['body_err'])) ? 'is-invalid':'';?> form-control"
                    rows="5"><?php echo $data['body']?></textarea>
                <span class="invalid-feedback"><?php echo $data['body_err'];?></span>

            </div>

            <div class="form-group">
                <label for="title">image <sup>*</sup></label>
                <input type="file" name="image"
                    class="form-control <?php echo(!empty($data['image_err'])) ? 'is-invalid':'';?> form-control"
                    value="<?php echo $data['image'];?>">
                <span class="invalid-feedback"><?php echo $data['image_err'];?></span>

            </div>

     <input type="submit" class="btn btn-success" value="submit">
        </form>
    </div>
    </div>
    </div>
        
  
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>