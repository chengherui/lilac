<?php 
$sql = "select id, nick from user where roleid=3 and status=1";
$this->load->database('default');
$query = $this->db->query($sql);
$cnt = $query->num_rows;
echo "<select class=\"role4\" name=\"parentid\" style='display:none;'>";
if($cnt >= 1) {
    foreach($query->result() as $one) {
        echo "<option value='" . $one->id . "'>" . $one->nick . "</option>";
    }
}
echo "</select>";
?>
