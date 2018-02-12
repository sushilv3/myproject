
<form action="<?=base_url('colleges/add'); ?>" method="post">
    <label for="">Reg No</label>
    <input type="text" value="<?=set_value('reg_no'); ?>" name="reg_no">
    <?= form_error('reg_no'); ?>
    <label for="">Name</label>
    <input type="text" value="<?=set_value('name'); ?>" name="name">
    <?= form_error('name'); ?>

    <label for="">Address</label>
    <input type="text" value="<?=set_value('location'); ?>" name="location">
    <?= form_error('location'); ?>
    <button>Save</button>
</form>