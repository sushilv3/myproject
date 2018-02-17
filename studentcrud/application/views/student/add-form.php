
    <form class="form-con" action="<?=base_url('studente/adddata'); ?>" method="post">
        <label for="roll_no">Roll No.</label>
        <input type="text" value="<?=set_value('roll_no'); ?>" name="roll_no">
        <label for="name">Name</label>
        <input type="text" value="<?=set_value('name'); ?>" name="name">
        <label for="address">Address</label>
        <input type="text" value="<?=set_value('address'); ?>" name="address">
        <label for="course_code">Course Code</label>
        <input type="text" value="<?=set_value('course_code'); ?>" name="course_code">
        <button class="grad-btn">Save</button>
    </form>
