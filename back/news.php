<form action="./api/edit_news.php" method="post">
    <table style="text-align: center;width:75%">
        <tr>
            <td>編號</td>
            <td style="width:70%">標題</td>
            <td>顯示</td>
            <td>刪除</td>
        </tr>
        <?php
        $total=$News->count();
        $div=3;
        $pages=ceil($total/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;
        $rows=$News->all(" limit $start,$div");
        foreach($rows as $idx =>$row){
            ?>
        <tr>
            <td><?=$idx+1+$start;?></td>
            <td><?=$row['title'];?></td>
            <td>
                <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
            </td>
            <td>
                <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
            </td>
        </tr>
            <?php
        }
        ?>
    </table>
            
    <div class="ct">
            <?php
                if($now-1>0){
                    $pre=$now-1;
                    echo "<a href='?do=$do?p=$pre'><</a>";
                }
                for($i=1;$i<=$pages;$i++){

                    $size=($now==$i)?'font-size:22px':'font-size:16px';
                    echo "<a href='?do=$do&p=$i'style='{$size}'> $i </a>";

                }
                if($now+1<$pages){
                    $next=$now+1;
                    echo "<a href='?do=$do&p=$next'>></a>";
                }
            ?>
        </div>
        <div class="ct">
            <input type="submit" value="確定修改">
        </div>
</form>