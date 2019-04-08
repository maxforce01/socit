<!-- Newsfeed Common Side Bar Left
          ================================================= -->
<div class="col-md-3 static">
    <div class="profile-card">
        <img src="{{url("storage/".\Illuminate\Support\Facades\Auth::user()->avatar)}}" alt="user" class="profile-photo" />
        <h5><a href="timeline.html" class="text-white">{{\Illuminate\Support\Facades\Auth::user()->name}}</a></h5>
        <p class="text-white"><i class="ion ion-android-person-add"></i>{{\Illuminate\Support\Facades\Auth::user()->subscribers->count()}}</p>
    </div><!--profile card ends-->
    {{menu('left_side','layouts.left_menu')}}
</div>
