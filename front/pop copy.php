<fieldset>
    <legend>目前位置：首頁> 人氣文章區</legend>
    <table style="width:95%;margin:auto">
        <tr>
            <th width="30%">標題</td>
            <th width="50%">內容</td>
            <th width="">人氣</td>
        </tr>
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        // $news = $News->all("limit $start,$div");

        $rows = $News->all(['sh' => 1], " order by `good` desc  limit $start,$div"); //先排序後再取資料
        foreach ($rows as $row) {
        ?>
            <tr>
                <td>
                    <div class='title' data-id="<?= $row['id']; ?>"><?= $row['title']; ?></div>
                </td>
                <td>
                    <div><?= mb_substr($row['news'], 0, 25); ?>...</div>
                    <div id="p<?= $row['id']; ?>" class="pop">
                        <h3 style="color:lightblue"><?= $row['title']; ?></h3>
                        <pre><?= $row['news']; ?></pre>
                    </div>
                </td>
                <td>
                    <span><?= $row['good']; ?></span>個人說<img src="./icon/02B03.jpg" style="width:25px">
                    <!-- <span id="g<?= $row['id']; ?>"><?= $row['good']; ?></span>個人說 -->
                    <!-- <img src="./icon/02B03.jpg" style="width:25px"> -->
                    <?php
                    if (isset($_SESSION['user'])) {
                        if ($Log->count(['news' => $row['id'], 'acc' => $_SESSION['user']]) > 0) {
                            // echo "<a href=''>收回讚</a>";
                            echo "<a href='Javascript:good({$row['id']})'>收回讚</a>";
                        } else {
                            // echo "<a href=''>讚</a>";
                            echo "<a href='Javascript:good({$row['id']})'>讚</a>";
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
        <?php

        if ($now > 1) {
            $prev = $now - 1;
            echo " <a href='?do=$do&p=$prev'><</a> ";
        }

        for ($i = 1; $i <= $pages; $i++) {
            $fontsize = ($now == $i) ? '24px' : '16px';
            echo "<a href='?do=$do&p=$i' style='font-size:$fontsize'> $i <a/>";
        }

        if ($now < $pages) {
            $next = $now + 1;
            echo " <a href='?do=$do&p=$next'> > </a> ";
        }
        ?>

    </div>
</fieldset>
<script>
    $(".title").hover( //當滑鼠滑過標題時
        function() {
            $(".pop").hide(); //文章內容先是隱藏
            let id = $(this).data('id'); //取得data-id的id=1~n
            $("#p" + id).show(); //#p1~n會顯示
        }
    )

    // function good(news) {
    //     $.post("./api/good.php", {news}, () => {
    //         location.reload();
    //     })
    // }
</script>