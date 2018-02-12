
<form action="<?=base_url('colleges/edit'); ?>" method="post">
<input type="hidden" value = "<?=$college->reg_no; ?>" name="reg_no">
  <label for="">Reg No</label>
  <input type="text" value = "<?=$college->reg_no; ?>" name="reg_no" readonly>

  <label for="">Name</label>
  <input type="text" value="<?=$college->name; ?>" name="name">


  <label for="">Address</label>
  <input type="text" value="<?=$college->location; ?>" name="location">

<button name="action" value="update">Update</button>
<button name="action" value="delete"> Delete</button>
</form>

<?php
// $this->output->enable_profiler(true);
?>