<?php $this->load->view('templates/header',array('c_view' => $_ci_view)); ?>
<!-- BEGIN PAGE CONTENT-->
<main><?php echo $body; ?></main>
<!-- END PAGE CONTENT-->
<?php $this->load->view('templates/footer',array('c_view' => $_ci_view)); ?>