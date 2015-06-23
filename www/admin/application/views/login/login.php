<?php
    $this->load->view('templates/header');
?>
  </head>
  <body>
    <div class="container">
      <?php
        $attributes = array('class'=>'form-signin');
        echo validation_errors();
        echo form_open('/admin/login/check_login', $attributes);
      ?>
      <h3 class="form-signin-heading">管理后台</h3>
        <div class="control-group"><div class="controls">
          <input type="text" class="input-medium" name="login_name" placeholder="用户名">
          <label class="help-inline hide">用户名不存在</label>
        </div></div>
        <div class="control-group"><div class="controls">
          <input type="password" class="input-medium" name="login_password" placeholder="密码">
          <span class="help-inline hide">密码错误</span>
        </div></div>
        <label class="checkbox">
          <input type="checkbox" value="remember-me">Remember me
        </label>
        <button class="btn btn-large btn-primary" type="submit">进入系统</button>
      </form>

    </div> <!-- /container -->
<?php
    $this->load->view('templates/footer');
?>
