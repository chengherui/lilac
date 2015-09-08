<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="brand">新华普信（北京）资产管理有限公司</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li class="active"><a href="/admin/">主页</a></li>
          <li><a href="/admin/account">账户管理</a></li>
        </ul>
        <p class="navbar-text pull-right">
          <?php $this->load->library('session');
              $nickname = $this->session->userdata('nickname');
              $title = $this->session->userdata('title');
              $data['nickname'] = $nickname;
              $data['title'] = $title; ?>
          <?php echo $title . ":" . $nickname ?>，<a href="/admin/logout" class="navbar-link">退出</a>
        </p>
      </div>
    </div>
  </div>
</div>
<br>
