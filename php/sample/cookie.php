<?php
    // setcookie('myCookie','cookie',time()+10000,'/');

    // if( isset($_COOKIE['myCookie']) ){
    //     echo "cookie : O ";
    //     echo "{$_COOKIE['myCookie']}";
    // } else {
    //     echo "cookie : X"; 
    // }

    setcookie('myCookie', null,time()-1000,'/');
    if( isset($_COOKIE['myCookie']) ){
        echo "cookie : O ";
    } else {
        echo "cookie : X"; 
    }
?>