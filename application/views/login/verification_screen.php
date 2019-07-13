<div class="container login-btn-block">
    <div class="row justify-content-center my-5 py-5">
        <div class="col-md-12">
            <h4 class="text-center mb-3">Congratulations, your email has been verified!</h4>
            <h6 >If you are not redirected in <span id="changeCount">10</span> seconds, <a href="<?= $redirectUrl ?>">click here</a> to pick up where you left off.</h6>
        </div>
    </div>
</div>

<script>
    function myFunction() {
        document.getElementById('changeCount').innerText = parseInt(document.getElementById('changeCount').innerText)-1;
        if(document.getElementById('changeCount').innerText == 0){
            window.location.href = '<?= $redirectUrl ?>';
        }else {
            setTimeout(function(){ myFunction(); }, 1000);
        }
    }
    setTimeout(function(){ myFunction(); }, 1000);
</script>