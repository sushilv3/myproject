<h4 class="heading padding">colleges List</h4>

<!--
<?php $message = $this->session->flashdata('message'); ?>
<?php if ($message != null) : ?>
    <div class="message">
        <?=$message; ?>
    </div>
<?php endif; ?>

-->
<div class="hor-center container card">
    <div class="newcard ">
        <form action="<?=base_url('search'); ?>" method="post">
            <select name="criteriaColumn">
                <option value="reg_no" <?= set_value('criteriaColumn') === 'reg_no' ? 'selected' : ''; ?>>Registraion No</option>
                <option value="name" <?= set_value('criteriaColumn') === 'name' ? 'selected' : ''; ?>>Name</option>
                <option value="location" <?= set_value('criteriaColumn') === 'location' ? 'selected' : ''; ?>>Location</option>
                
            </select>

            <input type="text" name="searchText" value="<?=set_value('searchText'); ?>">
            <button>Search</button>

        </form>
    
        <table>
        <!-- if we were not using codeignighter
            $colleges = $data['colleges']; -->
        <?php foreach ($colleges as $college) : ?> 
            <form action="<?=base_url('colleges/action'); ?>" method="post">
                <input type="hidden" value="<?=$college->reg_no; ?>" name="reg_no">
                <tr>
                    <td><?=$college->reg_no; ?></td>
                    <td><?= $college->name; ?></td>
                    <td><?= $college->location; ?></td>
                    <td><button name="action" value="update">Update</button></td>
                    <!-- <td><a  href="<?=base_url('course/'.$college->reg_no); ?>">Courses</a></td>
                    <td><a  href="<?=base_url('student/'.$college->reg_no); ?>">Students</a></td> -->
                    <td><button name="action" value="courses">Courses</button></td>
                    <td><button name="action" value="students">Students</button></td>
                </tr>
            </form>
        <?php endforeach; ?>
        </table>
    </div>
    <!-- pagination controlls -->
    <div class="spacebetween">
        <?php if ($currentPage > 0): ?>
            <a href="<?=base_url('colleges/page/'.($currentPage - 1)); ?>">previous</a>
        <?php endif; ?>

        <?php if (count($colleges) === $pageSize) : ?>
        <a href="<?=base_url('colleges/page/'.($currentPage + 1)); ?>">next</a>
        <?php endif; ?>
    </div>
</div>
<?php
$this->output->enable_profiler(true);
?>