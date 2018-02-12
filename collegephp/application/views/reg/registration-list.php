<table>
        <!-- if we were not using codeignighter
            $colleges = $data['colleges']; -->
        <?php foreach ($RegDetails as $item) : ?> 
            <form action="<?=base_url(''); ?>" method="post">
                <!-- <input type="hidden" value="" name="reg_no"> -->
                <tr>
                    <td><img src="<?=base_url("uploads/$item->profile_pic"); ?>" alt=""></td>
                    <td><?= $item->name; ?></td>
                    <td><?= $item->email; ?></td>
                    <td><?= $item->password; ?></td>
                    <td><?= $item->file_brw; ?></td>
                    <td><img src="<?=base_url("uploads/$item->file_brw"); ?>" alt=""></td>
                    <td><button name="action" value="update">Update</button></td>
                </tr>
                <!-- echo "$item->profile_pic"; -->
                <?php
                print_r('++++++++++++++++++++++++'.$item->email);
                ?>
            </form>
        <?php endforeach; ?>
        </table>
        <!-- <?php
$this->output->enable_profiler(true);
?> -->