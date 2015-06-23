<div>
<h3>审核意见</h3>
<?php 
    echo "<form action=\"/admin/verify/updateOrder?id=" . $_GET['id'] . "\" method=\"post\" accept-charset=\"utf-8\" class=\"form\">";
?>
<textarea name="verifycomment" class="form-control" style="width:50%" placeholder="请输入对该报单的意见" rows="5"></textarea>
<h3>选择处理方式</h3>
<select name="newstatus">
<?php
if($data->status == 1) {
    echo "<option value=\"3\">驳回</option><option value=\"2\">初审补充材料</option><option value=\"4\">通过</option>";
} else {
    echo "<option value=\"6\">驳回</option><option value=\"5\">补充材料</option><option  value=\"7\">通过</option>>";
}
?>
</select>
<br/>
<?php 
    echo "<input type=\"hidden\" name=\"orderid\" value=\"" . $data->id . "\">";
?>
<button type="submit" class="btn btn-primary">提交</button>
</form>
</div>
