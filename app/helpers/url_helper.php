<?php

//  function redirect($page){

//   header('location:'.URLROOT.'/'.$page);

// }

// function redirect(){
//     header('location:'.URLROOT.'/'.$page);
// }


// Simple page redirect
function redirect($page)
{
    header('location: ' . URLROOT . '/' . $page);
}



