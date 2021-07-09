<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Site</title>

    <!-- SEO(검색 엔진 최적화) -->
    <meta name="author" content="jinmopin">
    <meta name="description" content="포트폴리오를 위한 사이트입니다.">
    <meta name="keywords" content="포트폴리오, 웹표준, 반응형, 퍼블리셔, 프론트엔드, 프론트엔드개발자">
    <meta name="robots" content="all">

    <!-- facebook -->
    <meta property="og:url" content="http://jinmopin.dothome.co.kr">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Portfolio App">
    <meta property="og:description" content="포트폴리오 사이트입니다.">
    <meta property="og:image" content="../assets/images/icon/main.png">

    <!-- twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Portfolio App">
    <meta name="twitter:url" content="http://jinmopin.dothome.co.kr">
    <meta name="twitter:image" content="../assets/icon/main.png">
    <meta name="twitter:description" content="포트폴리오 사이트입니다.">

    <!-- 아이콘 -->
    <link rel="icon" href="../assets/images/icon/icon_256.png" />
    <link rel="apple-touch-icon" href="../assets/images/icon/icon_256.png" />
    <link rel="shortcut icon" href="../assets/images/icon/icon_256.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/images/icon/icon_192.png">
    <link rel="icon" type="image/png" sizes="256x256" href="../assets/images/icon/icon_256.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/icon/icon_16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/icon/icon_32.png">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- 웹폰트 -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

</head>

<body>
    <!-- skip -->
    <div id="skip">
        <a href="#mainCont">컨텐츠 바로가기</a>
    </div>
    <!-- //skip -->

    <!-- header -->
    <header id="header">
        <div class="port">
            <a href="../pages/port.html">Port</a>
        </div>
        <div class="logo">
            <a href="../pages/main.html">Jinjaehyun</a>
        </div>
        <div class="nav">
            <ul>
                <li><a href="../sign/sIgnUp.html">회원가입</a></li>
                <li><a href="../sign/logIn.html">로그인</a></li>
                <li><a href="../board/board.html">게시판</a></li>
            </ul>
            <ul>
                <li><a href="about.html">About</a></li>
                <li><a href="reference.html">Reference</a></li>
                <li><a href="Youtube.html">Youtube</a></li>
                <li><a href="script.html">Script</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
    </header>
    <!-- //header -->

    <!-- main -->
    <main id="login">
        <section id="loginCont">
            <div class="login-cont">
                <div class="login-text">
                    <div>
                        <p>
                            WEBSTORYBOY<br>
                            사이트에 오신걸 환경합니다.
                        </p>
                    </div>
                    <form>
                        <input type="text" name="email" class="text-field" placeholder="이메일을 적어주세요!">
                        <input type="password" name="password" class="text-field" placeholder="패스워드를 적어주세요!">
                        <input type="submit" value="로그인" class="submit-btn">
                        <p class="signuptext">회원가입을 원하면? <a href="sIgnUp.html" class="signup">회원가입</a></p>
                    </form>
                    
                </div>
            </div>
        </section>
    </main>
    <!-- //main -->
    <!-- footer -->
    <footer id="footer">
        <div class="footer-info">
            <div>
                <h3>Email</h3>
                <p>jinmopin@gmail.com</p>
            </div>
            <div>
                <h3>KAKAO</h3>
                <P>jjiin00</P>
            </div>
            <div>
                <h3>Social</h3>
                <ul>
                    <li><a href="../pages/Youtube.html">Youtube</a></li>
                    <li><a href="../pages/Instargram">Instargram</a></li>
                    <li><a href="#">Github</a></li>
                    <li><a href="../pages/reference.html">Reference</a></li>
                    <li><a href="#">Tutorial</a></li>
                    <li><a href="#">Animation</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- //footer -->
</body>

</html>