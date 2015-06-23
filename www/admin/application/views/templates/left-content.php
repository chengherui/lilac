<div class="span2">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
          <?php $this->load->library('session');
              $roleid = $this->session->userdata('roleid');
              if($roleid <= 2) {
                  echo '<li><a href="/admin/users/index" class="users">用户管理</a></li>';
              }
              if($roleid <= 3) {
                  echo '<li><a href="/admin/orders/index" class="orders">报单管理</a></li>';
              }
          ?>
            
                        <!--li class="nav-header">运营功能</li>
            <li><a href="/module_2/index" class="module_2">用户名/id互查</a></li>
            <li><a href="/module_3/index" class="module_3">小贴士管理</a></li>
            <li><a href="/module_4/index" class="module_4">店铺经用户产品授权</a></li>
            <li><a href="/module_7/index" class="module_7">店铺经产品到期查询</a></li>
            <li><a href="/module_5/index" class="module_5" style="color:gray;">TMS使用中页面查询</a></li>
            <li><a href="/module_6/index" class="module_6" style="color:gray;">TMS页面维护</a></li>
            <li class="nav-header">魔镜功能</li>
            <li><a href="/mojing_1/index" class="mojing_1">埋点表格维护</a></li>-->
        </ul>
    </div>
</div>
