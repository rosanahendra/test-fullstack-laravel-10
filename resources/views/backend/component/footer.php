<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p><?php echo date('Y'); ?> &copy; <?php echo $_SERVER['SERVER_NAME']; ?></p>
        </div>
        <!--<div class="float-end">-->
        <!--    <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a-->
        <!--            href="https://saugi.me">Saugi</a></p>-->
        <!--</div>-->
    </div>
</footer>
<script src="<?php echo asset('backend/js/bootstrap.js'); ?>"></script>
<script src="<?php echo asset('backend/js/app.js'); ?>"></script>

<script>
    function session_input(a, b, c) {
        $.ajax({
            url: "<?= url('session_input'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
            }
        });
    }
    
    function session_password(a, b, c) {
        $.ajax({
            url: "<?= url('session_password'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
            }
        });
    }
</script>