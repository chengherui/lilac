<?php
    $this->load->view('templates/header');
?>
  </head>
  <body>
<?php
    $this->load->view('templates/nav-detail');
?>
    <div class="container-fluid" id="left-content">
      <div class="row-fluid">
        <div class="span10" id="right-content">
<?php
    $this->load->view('templates/content-detail');
?>
<?php
    $this->load->view('templates/content-verify');
?>
        </div>
      </div>
    </div>
<?php
    $this->load->view('templates/footer');
?>
