<?php
    $this->load->view('templates/header');
?>
  </head>
  <body>
<?php
    $this->load->view('templates/nav');
?>
    <div class="container-fluid" id="left-content">
      <div class="row-fluid">
<?php
    $this->load->view('templates/left-content');
?>
        <div class="span10" id="right-content">
          <div class="hero-unit">
          <h1>Hello, <?php echo $nickname; ?>!</h1>
            <p>好好审单，天天赚钱</p>
          </div>
        </div>
      </div>
    </div>
<?php
    $this->load->view('templates/footer');
?>
