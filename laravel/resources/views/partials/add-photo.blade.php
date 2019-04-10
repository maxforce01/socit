<div class="create-post">
    <div class="row">
        <form action="{{route('create.photo')}}" method="post" enctype="multipart/form-data">
        <div class="col-md-7 col-sm-7">
            <div class="form-group">
                <img src="{{asset('/storage/'.$user->avatar)}}" alt="" class="profile-photo-md" />
                <input name="photo" type="file">
            </div>
        </div>
        <div class="col-md-5 col-sm-5">
            <div class="tools">
                <button type="submit" class="btn btn-success pull-right">Add</button>
            </div>
        </div>
        </form>
    </div>
</div>
