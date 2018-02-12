<?php $message = $this->session->flashdata('message'); ?>
<?php if ($message != null) : ?>
    <div class="message">
        <?=$message; ?>
    </div>
<?php endif; ?>