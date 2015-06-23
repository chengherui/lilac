<?php
    $this->load->view('templates/header');
?>
  </head>
  <body>
<?php
    $this->load->view('templates/nav');
?>
    <?php
    $attributes = array('class'=>'form');
    echo form_open('/admin/account/userMod', $attributes);
    ?>

<table class="table table-bordered table-hover">
      <tbody>
        <tr>
          <td>登录名</td>
          <td>
          <?php echo $name ?>
          </td>
        </tr>
        <tr>
          <td>昵称</td>
          <td>
          <?php echo $nickname ?>
          </td>
        </tr>
        <tr>
          <td>身份</td>
          <td>
          <?php echo $title ?>
          </td>
        </tr>
      </tbody>
</table>

        <div class="control-group"><div class="controls">
          <input type="text" class="input-large" id="n_password" name="n_password" placeholder="新密码">
          <label class="help-inline hide"></label>
        </div></div>
        <!--div class="control-group"><div class="controls">
          <input type="text" class="input-large" id="rn_password" name="rn_password" placeholder="确认新密码"><br>
          <label class="help-inline hide">密码不一致，请重新输入</label>
        </div></div-->
        <button id="account_modify" type="submit" class="btn btn-primary">确定修改密码</button>
    </form>
<?php
    $this->load->view('templates/footer');
?>
