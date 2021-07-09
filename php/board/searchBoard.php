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
            <div class="listBoard">
                <h2>검색 결과</h2>
                <div class="listSearch">
                    <a href="board.php" class="form-btn black">목록보기</a>
                </div>
                <div class="listTable">
                    <table class="table">
                        <colgroup>
                            <col style="width: 10%" />
                            <col style="width: 65%" />
                            <col style="width: 10%" />
                            <col style="width: 15%" />
                        </colgroup>
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>제목</th>
                                <th>등록자</th>
                                <th>등록일</th>
                            </tr>
                        </thead>
                        <tbody>
<?php

    if( isset($_GET['page']) ){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }


    $numView = 20;
    $viewLimit = ($numView * $page) - $numView;


    $searchKeyWord = $dbConnect -> real_escape_string($_POST['searchKeyWord']);
    $searchOption = $dbConnect -> real_escape_string($_POST['searchOption']);

    if ( $searchKeyWord == '' || $searchKeyWord == null ){
        echo "검색어가 없습니다.";
        exit;
    }

    switch($searchOption){
        case 'title';
        case 'content';
        case 'titAcont';
        case 'titOcont';
            break;
        default :
            echo "검색 옵션을 선택해주세요.";
            exit;
            break;
    }

    // $sql = "SELECT b.myBoardID, b.boardTitle, b.boardCont, m.youNickName, b.regTime FROM myBoard b JOIN myMember m ON (m.myMemberID = b.myMemberID) WHERE b.boardTitle ";
    // $sql .= "LIKE '%{$searchKeyWord}%'";

    // $sql = "SELECT b.myBoardID, b.boardTitle, b.boardCont, m.youNickName, b.regTime FROM myBoard b JOIN myMember m ON (m.myMemberID = b.myMemberID) WHERE b.boardCont ";
    // $sql .= "LIKE '%{$searchKeyWord}%'";

    // $sql = "SELECT b.myBoardID, b.boardTitle, b.boardCont, m.youNickName, b.regTime FROM myBoard b JOIN myMember m ON (m.myMemberID = b.myMemberID) WHERE b.boardTitle ";
    // $sql .= "LIKE '%{$searchKeyWord}%' AND b.boardCont LIKE '%{$searchKeyWord}%'";

    // $sql = "SELECT b.myBoardID, b.boardTitle, b.boardCont, m.youNickName, b.regTime FROM myBoard b JOIN myMember m ON (m.myMemberID = b.myMemberID) WHERE b.boardTitle ";
    // $sql .= "LIKE '%{$searchKeyWord}%' OR b.boardCont LIKE '%{$searchKeyWord}%'";

    $sql = "SELECT b.myBoardID, b.boardTitle, b.boardCont, m.youNickName, b.regTime FROM myBoard b JOIN myMember m ON (m.myMemberID = b.myMemberID) ";

    switch($searchOption){
        case 'title' :
            $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyWord}%' ";
            break;
        case 'content' :
            $sql .= "WHERE b.boardCont LIKE '%{$searchKeyWord}%' ";
            break;
        case 'titAcont' :
            $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyWord}%' AND b.boardCont LIKE '%{$searchKeyWord}%' ";
            break;
        case 'titOcont' :
            $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyWord}%' OR b.boardCont LIKE '%{$searchKeyWord}%' ";
            break;
    }
    $sql .= "LIMIT {$viewLimit}, {$numView}";
    
    
    
    $result = $dbConnect -> query($sql);
    if($result){
        $boardCount = $result -> num_rows;

        if( $boardCount > 0 ) {
            for ( $i=1; $i<=$boardCount; $i++){
                $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
                echo "<tr>";
                echo "<td>".$boardInfo['myBoardID']."</td>";
                // echo "<td><a href='#'>".$boardInfo['boardTitle']."</a></td>";
                echo "<td><a href='searchBoard.php?/searchBoard={$boardInfo['myBoardID']}'>".$boardInfo['boardTitle']."</a></td>";
                echo "<td>".$boardInfo['youNickName']."</td>";
                echo "<td>".date('Y-m-d H:i', $boardInfo['regTime'])."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>{$searchOption}(이/가) 없습니다.</td></td>";
            exit;
        }
    } else {
        echo "에러 발생 : 변수 이름이 틀렸거나 오타가 존재합니다.";
        exit;
    }
    
    
?>
                        </tbody>
                    </table>
                </div>
                <!-- page -->
        <div class="listPage">
        <ul class="pagination">
<?php
    $sql = "SELECT count(myBoardID) FROM myBoard";
    $result = $dbConnect -> query($sql);

    $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(myBoardID)'];

    //총 페이지 수
    $boardTotalPage = ceil($boardTotalCount/$numView);

    //현재 페이지를 기준으로 보여주고 싶은 갯수
    $pageView = 3;
    $startPage = $page - $pageView;
    $endPage = $page + $pageView;

    //5번(처음2 끝나면8) : 2 3 4 5 6 7 8

    //처음 페이지
    if($startPage < 1 ) $startPage = 1;

    //마지막 페이지
    if( $endPage > $boardTotalPage ) $endPage = $boardTotalPage;

    //처음으로
    if( $page != 1){
        echo "<li><a href='searchBoard.php?page=1'>&#8249;&#8249;</a></li>";
    }

    //이전으로
    if( $page != 1){
        $pevPage = $page -1;
        echo "<li><a href='searchBoard.php?page={$pevPage}'>&#8249;</a></li>";
    }

    //페이지 번호 보여주기
    for( $i=$startPage; $i<=$endPage; $i++ ){
        $active = '';
        if ( $i == $page ) $active = 'active';
        echo "<li class='{$active}'><a href='searchBoard.php?page={$i}'>{$i}</a></li>";
    }

    //다음으로
    if ($page != $endPage){
        $nextPage = $page +1;
        echo "<li><a href='searchBoard.php?page={$nextPage}'>&#8250;</a></li>";
    }

    //마지막으로
    if ($page != $endPage){
        echo "<li><a href='searchBoard.php?page={$boardTotalPage}'>&#8250;&#8250;</a></li>";
    }

    
?>

            <!-- <li><a href="#">처음으로</a></li>
            <li><a href="#">이전</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#">7</a></li>
            <li><a href="#">다음</a></li>
            <li><a href="#">끝으로</a></li> -->
        </ul>
    </div>
                <!-- //page -->
            </div>
        </div>
    </section>
</main>
    <!-- //main -->
    <!-- footer -->

    <!-- //footer -->

</body>

</html>