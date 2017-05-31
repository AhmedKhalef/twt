<!-- Change Avater -->

<form action="{{url ('/change')}}" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Update Your Image</label>
        <input type="file" class="form-control" name="avater">
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="submit" name="updata_avater" value="updata_avater">
</form>

