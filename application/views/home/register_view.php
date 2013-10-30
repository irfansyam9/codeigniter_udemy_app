<div class="row">
<div class="alert alert-danger" id="register_form_error"></div>
<form id="register_form" role="form" method="post" action="<?=site_url('api/register')?>">
        <div class="form-group">
            <label for="login">Username</label>
            <input type="text" placeholder="Username" name="login" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" placeholder="Email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="control-label">Password</label>
            <input type="password" placeholder="Password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="confirm_password" class="control-label">Confirm Password</label>
            <input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Register" class="btn btn-default">
        </div>
    </form>
    <a href="<?=site_url('home')?>">Back</a>
</div>


<script type="text/javascript">
$(function(){
    $('#register_form').submit(function(e) {
        e.preventDefault();
        var url = $(this).attr('action'),
            postData = $(this).serialize();

        $.post(url, postData, function(o) {
            if (o.result == 1) {
                window.location.href = '<?=site_url('dashboard')?>';
            }
            else {
                $('#register_form_error').show();
                var output = "<ul>"
                for (var key in o.error) {
                    var value = o.error[key];
                    output += "<li>" + value + "</li>"
                }
                output += "</ul>"
                $('#register_form_error').html(output);
            }
        }, 'json')
    });

    $('#register_form_error').hide();
});
</script>
