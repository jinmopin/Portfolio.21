<?php
    include '../connect/connect.php';
    include '../connect/session.php';
    // include '../connect/checkSession.php';
?>

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

<body class="light">
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

    <!-- 
        1. 게시판 테이블 만들기
        2. 게시판 데이터 등록 페이지(writeBoard.php)
        3. 게시판 데이터 저장 페이지(saveBoard.php)
        4. 게시판 데이터 불러오기 페이지(board.php)
    -->
    <!-- main -->
    <main id="main">
    <section id="boardCont">
        <div class="container">
            <div class="listBoard pb200">
                <h2>게시판입니다.</h2>
                <div class="listTable">
                    <table class="table">
                        <colgroup>
                            <col style="width: 20%" />
                            <col style="width: 80%" />
                        </colgroup>
                        <tbody>

<?php
    //GET 방식으로 boardID
    //SQL문으로 boardID 값에 해당되는 타이틀, 컨텐츠, 닉네임, 시간을 가져와서 DB에 접속

    if( isset($_GET['boardID']) && (int) $_GET['boardID'] > 0 ){
        $boardID = $_GET['boardID'];
        // echo $boardID;
    }

    $sql = "SELECT b.boardTitle, b.boardCont, m.youNickName, b.regTime FROM ";
    $sql .= "myBoard b JOIN myMember m ON (m.myMemberID = b.myMemberID) ";
    $sql .= "WHERE b.myBoardID = {$boardID}";

    $result = $dbConnect -> query($sql);

    if ( $result ){
        $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);

        // echo "<pre>";
        // var_dump($boardInfo);
        // echo "<pre>";

        echo "<tr><th>제목</th><td>".$boardInfo['boardTitle']."</td></tr>";
        echo "<tr><th>글쓴이</th><td>".$boardInfo['youNickName']."</td></tr>";
        echo "<tr><th>등록일</th><td>".date('Y-m-d H:i', $boardInfo['regTime'])."</td></tr>";
        echo "<tr><th s>내용</th><td class='height'>".$boardInfo['boardCont']."</td></tr>";
    };

    // $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);

    //결과 값을 echo로 출력

    

?>
                            <!-- <tr>
                                <th>제목</th>
                                <td>안녕하세요</td>
                            </tr>
                            <tr>
                                <th>등록자</th>
                                <td>안녕하세요</td>
                            </tr>
                            <tr>
                                <th>등록일</th>
                                <td>안녕하세요</td>
                            </tr>
                            <tr>
                                <th>내용</th>
                                <td class="height">안녕하세요</td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
                <div class="listSearch">
                    <a href="board.php" class="form-btn black mt20">목록보기</a>
                </div>

            </div>
        </div>
    </section>
</main>
    <!-- //main -->
    <!-- footer -->

    <!-- //footer -->

</body>

</html>