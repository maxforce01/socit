<h4 class="grey"><i class="icon ion-ios-briefcase-outline"></i>Work Experiences</h4>
<div class="line"></div>
<div class="edit-block">
    <div class="row">
        <div class="form-group col-xs-12">
            <input type="hidden" value="{{empty($id->company) ? "" : $work->id}}" name="id">
            <label for="company">Company</label>
            <input id="company" class="form-control input-group-lg" type="text" name="company" title="Enter Company" placeholder="Company name" value="{{empty($work->company) ? "" : $work->company}}" />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-12">
            <label for="designation">Designation</label>
            <input id="designation" class="form-control input-group-lg" type="text" name="position" title="Enter designation" placeholder="designation name" value="{{empty($work->position) ? "" : $work->position}}" />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-6">
            <label for="from-date">From</label>
            <input type="date" name="start" class="form-control" value="{{empty($work->start) ? "" : $work->start->format('Y-m-d')}}">
        </div>
        <div class="form-group col-xs-6">
            <label for="to-date" class="">To</label>
            <input type="date" name="end" class="form-control" value="{{empty($work->end) ? "" : $work->end->format('Y-m-d')}}">
        </div>
    </div>
</div>
