<fieldset>
    <legent>新增問卷</legent>
    <form action="./api/add_que.php" method="post">
        <div style="display: flex;">
            <div>問卷名稱</div>
            <div>
                <input type="text" name="subject">
            </div>
        </div>
        <div>
            <div id="opt">選項
                <input type="text" name="option[]">
                <input type="button" value="更多" onclick="more()">
            </div>
        </div>
        <div>
            <input type="submit" value="新增">
            <input type="reset" value="清空">
        </div>
    </form>
</fieldset>
<script>
    function more(){
        let opt=`<div>選項
                <input type="text" name="option[]">
            </div>`
            $('#opt').before(opt);
    }
</script>