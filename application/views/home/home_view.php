<div class="row">
<form id="login_form" role="form" method="post" action="<?=site_url('api/login')?>">
        <div class="form-group">
            <label for="login">Username</label>
            <input type="text" placeholder="Username" name="login" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="control-label">Password</label>
            <input type="password" placeholder="Password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Login" class="btn btn-default">
        </div>
    </form>
    <a href="<?=site_url('home/register')?>">Register</a>
</div>


<script type="text/javascript">
$(function(){
    $('#login_form').submit(function(e) {
        e.preventDefault();
        var url = $(this).attr('action'),
            postData = $(this).serialize();

        $.post(url, postData, function(o) {
            if (o.result == 1) {
                window.location.href = '<?=site_url('dashboard')?>';
            }
            else {
                alert('Invalid Login');
            }
        }, 'json')
    });
});
</script>
