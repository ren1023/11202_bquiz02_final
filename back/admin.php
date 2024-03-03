<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/edit_user.php" method="post">
        <table style="width:55%;margin:auto;text-align:center">
            <tr>
                <td class="clo">帳號</td>
                <td class="clo">密碼</td>
                <td class="clo">刪除</td>
            </tr>
            <?php
            $rows = $User->all();
            foreach ($rows as $row) {
                if ($row['acc'] !== 'admin') {
            ?>
                    <tr>
                        <td><?= $row['acc']; ?></td>
                        <td><?= str_repeat("*", mb_strlen($row['pw'])); ?></td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
           
        </table>
        <div class="ct">
                <input type="submit" value="刪除">
                <input type="reset" value="清除">
            </div>
    </form>

</fieldset>
<h1>新增成員</h1>
<span style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
<div>
<table>
        <tr>
            <td class="clo">Step1:帳號</td>
            <td>
                <input type="text" name="acc" id="acc">
            </td>
        </tr>
        <tr>
            <td class="clo">Step2:密碼</td>
            <td>
                <input type="password" name="pw" id="pw">
            </td>
        </tr>
        <tr>
            <td class="clo">Step3:確認密碼</td>
            <td>
                <input type="password" name="pw2" id="pw2">
            </td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時使用)</td>
            <td>
                <input type="text" name="text" id="email">
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" value="註冊" onclick="reg()">
                <input type="reset" value="清除" onclick="clean()">
            </td>
            <td></td>
        </tr>
    </table>
</div>
<script>
    function reg(){
        let user={
            acc:$('#acc').val(),
            pw:$('#pw').val(),
            pw2:$('#pw2').val(),
            email:$('#email').val()
        }
        if(user.acc!=""  && user.pw!="" && user.pw2!="" && user.email!=""){
            if(user.pw==user.pw2){
                $.post('./api/chk_acc.php',{acc:user.acc},(res)=>{
                    if(parseInt(res)==1){
                        alert('帳號重覆')
                    }else{
                        $.post('./api/reg.php',{user},(res)=>{
                            
                                // alert('歡迎，註冊成功')
                                location.reload();
                            
                        })
                    }
                    
                })

            }else{
                alert('密碼錯誤，請重新輸入')
            }
        }else{
            alert('欄位不可空白，請重新輸入')
        }

    }
</script>