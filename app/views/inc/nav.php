<nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-between ">
    
    <div>
        <a class="navbar-brand float-right" href="<?php echo URLROOT ?>"><?php echo SITENAME?></a>

    </div>


    <div class="">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse " id="navbarTogglerDemo01">

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo URLROOT ?>/pages">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT ?>/pages/about">ABOUT</a>
                </li>
                <?php 
                if (isset($_SESSION['name'])) :?>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" ><span class="fa fa-user-circle">&nbsp;</span><?php echo $_SESSION['name']?></a>
                    </li>

                    
                      <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT ?>/users/logout"><span
                            class="fa fa-1x fa-sign-out"></span></a>
                </li> 
               <?php else :?>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo URLROOT ?>/users/login">LOGIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT ?>/users/register">REGISTER</a>
                </li>
               <?php endif;?>
            </ul>
        </div>

    </div>
    
</nav>

