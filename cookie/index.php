<?
if($_SESSION["user_ok_cock"] != '1')
{
    echo'
        <div class="cookie">
            <div class="cookie__wrapper">
                <p>Продолжая использовать наш сайт, вы принимаете </p>
                <a href="/uploads/cookie.pdf" target="_blank">политику использования cookie-файлов.</a>
            </div>
            <div class="cookie__btn" onclick="policyFunc(1);">Принимаю</div>
            <img src="/common/css/img/modalCrossBlack.svg" alt="Крест" title="Не принимаю" class="cookie__close" onclick="closeCoockie()">
        </div>
    ';
}
?>
<script>
    function policyFunc($cookie) {
        $.ajax({
            type: 'POST',
            url: "/backend/acceptCookie.php",
            data: {"cookie": $cookie},
            response: 'text',
            success: function (data) {
                $('.cookie').fadeOut(300);            
            }
        })
    }
    function closeCoockie() {
        $('.cookie').fadeOut(300);            
    }
</script>