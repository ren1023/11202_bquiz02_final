<fieldset>
    <legend>目前位置:首頁>問卷調查</legend>
    <table>
        <tr>
            <th widtoh="10%">編號</th>
            <th widtoh="60%">問卷題目</th>
            <th widtoh="10%">投票總數</th>
            <th widtoh="10%">結果</th>
            <th widtoh="10%">狀態</th>
        </tr>
        <?php
        $rows=$Que->all(['subject_id'=>0]);
        foreach($rows as $key=>$row){
        ?>
        <tr>
            <td class="ct"><?=$key+1;?></td>
            <td><?=$row['text'];?></td>
            <td class="ct"><?=$row['vote'];?></td>
            <td>
                <a href='?do=result&id=<?=$row['id'];?>'>結果</a>
            </td>
            <td>
                
                <?php
                if(isset($_SESSION['user'])){
                   echo "<a href='?do=vote&id={$row['id']}'>我要投票</a>";
                }else{
                    echo "請先登入";
                }
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</fieldset>