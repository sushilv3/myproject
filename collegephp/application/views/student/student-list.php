<h3 class="heading padding">Student List</h>
<div class="hor-center container card newcard">
    <div class="newcard">
        <form action="<?=base_url('search'); ?>" method="post">
            <select name="criteriaColumn">
                <option value="reg_no" <?= set_value('criteriaColumn') === 'reg_no' ? 'selected' : ''; ?>>Registraion No</option>
                <option value="name" <?= set_value('criteriaColumn') === 'name' ? 'selected' : ''; ?>>Name</option>
                <option value="location" <?= set_value('criteriaColumn') === 'location' ? 'selected' : ''; ?>>Location</option>
                
            </select>

            <input type="text" name="searchText" value="<?=set_value('searchText'); ?>">
            <button>Search</button>

        </form>
    </div>
    <table>
    <!-- if we were not using codeignighter
        $colleges = $data['colleges']; -->
    <?php foreach ($students as $student) : ?> 
        <form action="<?=base_url('updateForm'); ?>" method="">
            <input type="hidden" value="<?=$student->roll_no; ?>" name="roll_no">
            <tr>
                <td><?=$student->roll_no; ?></td>
                <td><?= $student->name; ?></td>
                <td><?= $student->address; ?></td>
                <td><?= $student->course_code; ?></td>
                <td><?= $student->reg_no; ?></td>
                <td><button>Update</button></td>
            </tr>
        </form>
</div>
        <?php endforeach; ?>
    </table>
<?php
// $this->output->enable_profiler(true);
?>