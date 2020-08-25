@extends("partials.dashboard")

@section("hello")
{{"Record new expenditure"}}
@endsection


@section('content')
@if ($message = Session::get('expensesaved'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<form class="form-horizontal" method="post" action="{{ route('storeexpense') }}">
    @csrf
    <fieldset>

        <!-- Form Name -->
        <legend>Record new expenditure</legend>



        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Category name</label>
            <div class="col-md-5">
                <input id="name" name="narration" type="text" placeholder="Narration" class="form-control input-md" required="">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Amount</label>
            <div class="col-md-5">
                <input id="amount" name="amount" type="number" placeholder="Amount" class="form-control input-md" required="">

            </div>
        </div>

        

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="status">Status</label>
            <div class="col-md-5">
                <select id="category" name="category" class="form-control">
                    @foreach($cats as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}<option>
                    @endforeach
                </select>
            </div>
        </div>


        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
                <button id="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </fieldset>
</form>

@endsection