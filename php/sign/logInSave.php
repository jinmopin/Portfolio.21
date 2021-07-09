<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Site</title>
    <!-- meta -->
    <?php
        include "../component/meta.php"
    ?>
    <!-- //meta -->
</head>

<body>
    <!-- skip -->
    <div id="skip">
        <a href="#mainCont">컨텐츠 바로가기</a>
    </div>
    <!-- //skip -->

    <!-- header -->
<?php
    include "../component/header.php"
?>
    <!-- //header -->

    <!-- main -->
    <main id="signUp">
        <section id="signUpCont">
            <div class="signUp">
                <?php
                    include '../connect/connect.php';
                    include '../connect/session.php';

                    $userEmail = $_POST['userEmail'];
                    $userPW = $_POST['userPW'];

                    // echo $userEmail, $userPW;

                    function alert($str){
                        echo "<div class='siginInfo'><p>{$str}</p></div>";
                    }

                     // 이메일 검사
                    if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL) ){
                        alert("이메일이 잘못되었습니다. <br> 올바른 이메일을 적어주세요!");
                        exit;
                    }

                    //비밀번호 검사
                    if ( $userPW == null || $userPW == ''){
                        alert("올바른 비밀번호를 입력해주세요!");
                        exit;
                }

                //데이터 입력 ==> 데이터 검사 ==> 데이터 보내기(데이터 불러오기)
                $sql = "SELECT youEmail, youPW, youNickName, myMemberID FROM myMember ";
                $sql .= "WHERE youEmail = '{$userEmail}' AND youPW = '{$userPW}'";
                $result = $dbConnect -> query($sql);

                if($result) {
                    if( $result -> num_rows == 0 ){
                        alert("이메일 혹은 비밀번호가 일치하지 않습니다. 다시 한 번 확인해주세요.");
                        exit;
                    } else {
                        $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
                        // echo $memberInfo;
                        $_SESSION['myMemberID'] = $memberInfo['myMemberID'];
                        $_SESSION['youNickName'] = $memberInfo['youNickName'];
                        Header("Location: ../pages/main.html");
                    }
                } else {
                    alert ("에러발생 : 관리자에게 문의하세요.");
                    exit;
                }
                ?>
            </div>
        </section>
    </main>
    <!-- //main -->
    <!-- footer -->

    <!-- //footer -->
</body>

</html>