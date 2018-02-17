
<!-- <?php
print_r($student);
?> -->
<table>
    <tr>
        <form action="<?=base_url('student/edit'); ?>" method="post">
    <td> <input type="text" value="<?=$student->roll_no; ?>" name="roll_no" > </td>
            <td> <input type="text" value="<?=$student->name; ?>" name="name"> </td>
            <td> <input type="text" value="<?=$student->address; ?>" name="address"> </td>
            <td> <input type="text" value="<?=$student->course_code; ?>" name="course_code" disabled> </td>
            <td> <button class="btn-pri" value="update" name="action">Update</button> </td>
            <td> <button class="btn-sec" value="delete" name="action">Delete</button> </td>
        </form>
    </tr>
</table>
<?php
$this->output->enable_profiler(true);
?>
