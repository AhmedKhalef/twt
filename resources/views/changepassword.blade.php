<!-- Change Usere Password -->

<form action="{{url ('/changepassword')}}" method="POST">
    <div class="form-group">
        <p>Old Password:</p>
        <input type="password" class="form-control" name="old_password"  id="old_password" />
        <p>New Password:</p>
        <input type="password" class="form-control" name="password"/>
        <p>Confirm Password:</p>
        <input type="password" class="form-control" name="password_confirmation"/>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
        <input type="submit" name="Updata_password" value="Updata_password">
</form>