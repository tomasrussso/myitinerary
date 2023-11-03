<?php if(isset($_SESSION['toast'])): ?>
    <script>
        $(document).ready(function(){
            toastr.success('<?= $_SESSION['toast'] ?>')
        });
    </script>
<?php endif; ?>

<?php unset($_SESSION['toast']); ?>