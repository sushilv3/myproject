<!-- <?php echo $error; ?> -->
<?php echo form_open_multipart(base_url('test')); ?>

        <div class="form-group">
            
           
            <label for="exampleFormControlFile1">Choose Profile Photo</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="profile_pic">
            
           
        </div>
        <button>Submit</button>
    </form>