

<!-- echo'list page'; -->
<!-- print_r($rows); -->
<table>
    <tr>
    <th>Name</th>
    <th>Address</th>
    <th>Roll No.</th>
    <th>Course Code</th>
    <th>Action</th>
    
    </tr>
<?php foreach ($rows as $row):?> 
<form action="<?=base_url('/student/u_form'); ?>" method="post">
<tr>
    <input type="hidden" value="<?= $row->roll_no; ?>" name="roll_no">
    
    <td><?= $row->name; ?></td>
    <td><?= $row->address; ?></td>
    <td><?= $row->roll_no; ?></td>
    <td><?= $row->course_code; ?></td>
    <td><button class="btn-pri">edit</button></td>

 </tr>     
 </form>
 <?php endforeach; ?>
 </table>

 <?php
$this->output->enable_profiler(true);
?>