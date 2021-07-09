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

                $userEmail = $_POST['userEmail'];
                $userName = $_POST['userName'];
                $userNickName = $_POST['userNickName'];
                $userPW = $_POST['userPW'];
                $birthYear = $_POST['birthYear'];
                $birthMonth = $_POST['birthMonth'];
                $birthDay = $_POST['birthDay'];

                // echo $userEmail, $userName, $userNickName, $userPW;

                function alert($str){
                    echo "<div class='siginInfo'><p>{$str}</p></div>";
                }

                // 이메일 검사
                if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL) ){
                    // echo "이메일이 잘못되었습니다. <br> 올바른 이메일을 적어주세요!";
                    alert("이메일이 잘못되었습니다. <br> 올바른 이메일을 적어주세요!");
                    exit;
                }

                // 이름 검사 (한글로 구성되어 있는지 검사) : 정규식 표현
                $userNamePattern = '/^[가-힣]{1,}$/';

                if( !preg_match($userNamePattern, $userName, $marches) ){
                    // echo "이름은 한글로만 입력해주세요!";
                    alert("이름은 한글로만 입력해주세요!");
                    exit;
                }

                //닉네임 검사
                if ( $userNickName == null || $userNickName == ''){
                    alert("활동에 필요한 닉네임을 입력해주세요!");
                    exit;
                }

                // $userPW = sha1("php".$userPW);

                //비밀번호 검사
                if ( $userPW == null || $userPW == ''){
                    alert("활동에 필요한 비밀번호를 입력해주세요!");
                    exit;
                }

                //생년 검사
                if ($birthYear == 0){
                    alert("생년을 정확히 선택해주세요");
                    exit;
                }
                //생월 검사
                if ($birthMonth == 0){
                    alert("생월을 정확히 선택해주세요");
                    exit;
                }
                //생일 검사
                if ($birthDay == 0){
                    alert("생일을 정확히 선택해주세요");
                    exit;
                }

                $birth = $birthYear . "-" . $birthMonth . "-" . $birthDay;


                //데이터 입력 ==> 데이터 가져오기 ==> 데이터 검사 ==> 
                //DB이메일 사용자 이메일 중복 검사
                //이메일 중복 검사 -->
                //SELECT * FROM mymember2 WHERE mymemberID = 1;

                //이메일 중복 검사
                $isEmailCheck = false;

                $sql = "SELECT youEmail FROM myMember WHERE youEmail = '{$userEmail}'";
                $result = $dbConnect -> query($sql);

                if( $result ) {
                    $count = $result -> num_rows;
                    
                    if( $count ==0){
                        $isEmailCheck = true;
                    } else {
                        alert("이미 회원가입된 유저입니다.");
                        exit;
                    }
                } else {
                    alert("에러발생1, 관리자에게 문의하세요.");
                    exit;
                }

                //닉네임 중복 검사
                $isNickNameCheck = false;

                $sql = "SELECT youNickName FROM myMember WHERE youNickName = '{$userNickName}'";
                $result = $dbConnect -> query($sql);

                if( $result ) {
                    $count = $result -> num_rows;
                    
                    if( $count ==0){
                        $isNickNameCheck = true;
                    } else {
                        alert("이미 존재하는 닉네임입니다.");
                        exit;
                    }
                } else {
                    alert("에러발생2, 관리자에게 문의하세요.");
                    exit;
                }

                //데이터 입력 ==> 데이터 가져오기 ==> 데이터 검사 ==>
                //이메일 중복감시 ==> 닉네임 중복검사 ==> 중복검사 이상 없음
                //데이터 보내기(입력)

                //데이터가 이상 없으면 데이터 보내기(입력하기)
                if( $isEmailCheck = true && $isNickNameCheck = true){
                    $regTime = time();

                    $sql = "INSERT INTO myMember(youEmail, youName, youNickName, youPW, youBirth, regTime) ";
                    $sql .= "VALUES('{$userEmail}', '{$userName}', '{$userNickName}', '{$userPW}', '{$birth}', '{$regTime}')";
                    $result = $dbConnect -> query($sql);

                    if ($result){
                        alert("회원가입을 축하합니다!");
                        $_SESSION['myMemberID'] = $dbConnect -> insert_id;
                        $_SESSION['youNickName'] = $userNickName;
                    } else {
                        alert("에러발생3 관리자에게 문의하세요.");
                    }
                } else {
                    alert("이메일 혹은 닉네임이 이미 존재합니다.");
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