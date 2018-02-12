<h2 class="heading padding">Login Form</h2>
<div class="container hor-center">
    <form class = "card" action="<?=base_url('login/status'); ?>" method = "post">
    
        <label for="">User Name</label>
        <input type="text" value = "" name="user_name">

        <label for="">Password</label>
        <input type="password" value="" name="user_password">
        <button>save</button>
    </form>
</div>