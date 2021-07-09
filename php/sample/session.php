<?php

    session_start();

    //세션 생성
    $_SESSION['userID'] = "jinmopin"

    if(isseet($_SESSION['userID'])){
        echo "session : 0";
    } else {
        echo "session : X"
    }
    //세션 삭제
    unset($_SESSION['userID']);
    
?>