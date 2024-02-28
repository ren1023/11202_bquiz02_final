<fieldset>
    <legend>會員註冊</legend>
    <span style="color: red;">*請設定您要註冊的帳號及密碼(最長12個字)</span>
    <table>
        <tr>
            <td class="clo">帳號：</td>
            <td>
                <input type="text" name="acc" id="acc">
            </td>
        </tr>
        <tr>
            <td class="clo">密碼</td>
            <td>
                <input type="password" name="pw" id="pw">
            </td>
        </tr>
        <tr>
            <td class="clo">確認密碼：</td>
            <td>
                <input type="password" name="pw2" id="pw2">
            </td>
        </tr>
        <tr>
            <td class="clo">信箱：</td>
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
</fieldset>
<script>
    function reg() {
        let user = {
            acc: $('#acc').val(),
            pw: $('#pw').val(),
            pw2: $('#pw2').val(),
            email: $('#email').val()
        }
        if (user.acc != '' && user.pw != '' && user.pw2 != '' && user.email != '') {
            if(user.pw==user.pw2){
                $.post('./api/chk_acc.php', {acc:user.acc}, (res) => {
                if (parseInt(res) == 0) {
                    $.post('./api/reg.php', {user}, (res) => {
                        alert("歡迎,註冊成功")
                    })
                } else {
                    alert('您的帳號重複註冊')
                }
             })

            }else{
                alert('密碼錯誤，請重新輸入')
            }
        } else {
            alert('欄位不可空白，請重新輸入')
        }

    }


    function clean() {
        $("input[type='text'],input[type='password']").val('');

    }
</script>