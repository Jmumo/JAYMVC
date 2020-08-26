<?php

//load libraries

// require_once 'lib/Core.php';
// require_once 'lib/Controller.php';
// require_once 'lib/Database.php';


require_once 'config/config.php';

// auto load core libraries

//load helpers
require_once 'helpers/sessions.php';

spl_autoload_register(function ($className) {

    require_once 'lib/' . $className . '.php';

});


