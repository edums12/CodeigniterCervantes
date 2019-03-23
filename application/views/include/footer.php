<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src="<?= base_url("assets/js/script.js") ?>"></script>    

<?php if (!empty($this->session->flashdata('error'))){?>

<script>
    M.toast({html: "<?= $this->session->flashdata('error') ?>"});   
</script>

<?php }?>

<?php if (!empty($this->session->flashdata('success'))){?>

<script>
    M.toast({html: "<?= $this->session->flashdata('success') ?>"});   
</script>

<?php }?>


<script src="<?= base_url('assets/js/venda_chart.js') ?>"></script>


</body>
</html>