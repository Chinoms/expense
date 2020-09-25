@extends("partials.dashboard")

@section("hello")
{{"Create Report"}}
@endsection


@section('content')
@if ($message = Session::get('expensesaved'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<form action="{{ route('reportbycategory') }}" method="post">
    @csrf

    <div class="form-group">
            <label  for="category">Category</label>
            <div class="col-md-6">
                <select id="category" name="category" class="form-control col-md-6">
                    @foreach($cats as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

    <div class="form-group">
        <label for="startdate">From:</label>
        <input type="date" class="form-control col-md-6" name="start">
    </div>
    <div class="form-group">
        <label for="startdate">To:</label>
        <input type="date" class="form-control col-md-6" name="end">
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Generate report">
    </div>
</form>





@endsection