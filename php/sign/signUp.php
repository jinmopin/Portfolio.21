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
                <h2><strong>Jinjaehyun</strong>사이트에 오신 걸 환영합니다.</h2>
                <form name="signUp" method="post" action="signUpSave.php">
                    <fieldset>
                        <legend class="sr-only">회원 가입 폼입니다.</legend>
                        <div>
                            <label  class="sr-only" for="userEmail">이메일</label>
                            <input type="email" name="userEmail" id="userEmail" class="input-text" placeholder="이메일을 적어주세요!" required autofocus>
                        </div>
                        <div>
                            <label  class="sr-only" for="userName">이름</label>
                            <input type="text" name="userName" id="userName" class="input-text" placeholder="이름을 적어주세요!" required>
                        </div>
                        <div>
                            <label  class="sr-only" for="userNickName">닉네임</label>
                            <input type="text" name="userNickName" id="userNickName" class="input-text" placeholder="사용할 닉네임을 적어주세요!" required>
                        </div>
                        <div>
                            <label  class="sr-only" for="userPW">패스워드</label>
                            <input type="password" name="userPW" id="userPW" class="input-text" placeholder="패스워드를 적어주세요!" required>
                        </div>
                        <div class="birth">
                            <div>
                                <label for="birthYear">년도</label>
                                <select name="birthYear" id="birthYear" required>
                                    <?php
                                        $thisYear = date("Y", time());
                                        for( $i = $thisYear; $i  >= 1930; $i-- ){
                                            echo "<option value='{$i}'>{$i}</option>";
                                        };
                                    ?>;
                                </select>
                            </div>
                            <div>
                                <label for="birthMonth">월</label>
                                <select name="birthMonth" id="birthMonth" required>
                                    <?php
                                        for( $m = 1; $m <= 12; $m++ ){
                                            echo "<option value='{$m}'>{$m}</option>";
                                        };
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="birthDay">일</label>
                                <select name="birthDay" id="birthDay" required>
                                <?php
                                        for( $d = 1; $d <= 31; $d++ ){
                                            echo "<option value='{$d}'>{$d}</option>";
                                        };
                                    ?>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <button class="signup-btn" type="submit" value="회원가입">회원가입</button>
                    <p class="signDesc">로그인을 원하면? <a href="log.php">로그인</a></p>
                </form>
                
            </div>
        </section>
    </main>
    <!-- //main -->
    <!-- footer -->

    <!-- //footer -->
</body>

</html>