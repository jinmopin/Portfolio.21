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
        echo "<li><a href='board.php?page=1'>&#8249;&#8249;</a></li>";
    }

    //이전으로
    if( $page != 1){
        $pevPage = $page -1;
        echo "<li><a href='board.php?page={$pevPage}'>&#8249;</a></li>";
    }

    //페이지 번호 보여주기
    for( $i=$startPage; $i<=$endPage; $i++ ){
        $active = '';
        if ( $i == $page ) $active = 'active';
        echo "<li class='{$active}'><a href='board.php?page={$i}'>{$i}</a></li>";
    }

    //다음으로
    if ($page != $endPage){
        $nextPage = $page +1;
        echo "<li><a href='board.php?page={$nextPage}'>&#8250;</a></li>";
    }

    //마지막으로
    if ($page != $endPage){
        echo "<li><a href='board.php?page={$boardTotalPage}'>&#8250;&#8250;</a></li>";
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