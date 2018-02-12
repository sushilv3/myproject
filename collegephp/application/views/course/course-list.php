<h4>Courses List</h4>
<!-- <form action="<?=base_url('search'); ?>" method="post">
    <select name="criteriaColumn">
        <option value="reg_no" <?= set_value('criteriaColumn') === 'reg_no' ? 'selected' : ''; ?>>Registraion No</option>
        <option value="name" <?= set_value('criteriaColumn') === 'name' ? 'selected' : ''; ?>>Name</option>
        <option value="location" <?= set_value('criteriaColumn') === 'location' ? 'selected' : ''; ?>>Location</option>
        
    </select>

    <input type="text" name="searchText" value="<?=set_value('searchText'); ?>">
    <button>Search</button>

</form> -->

    <table>
    <!-- if we were not using codeignighter
        $colleges = $data['colleges']; -->
    <?php foreach ($courses as $course) : ?> 
        <form action="<?=base_url('updateForm'); ?>" method="">
            <input type="hidden" value="<?=$course->course_code; ?>" name="course_code">
            <tr>
                <td><?=$course->course_code; ?></td>
                <td><?= $course->title; ?></td>
                <td><?= $course->duration; ?></td>
                
                <td><button>Update</button></td>
            </tr>
        </form>
    <?php endforeach; ?>
    </table>
<?php
// $this->output->enable_profiler(true);
?>