@extends("partials.dashboard")

@section("hello")
{{"Create New Category"}}
@endsection


@section('content')
@if ($message = Session::get('catsaved'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<form class="form-horizontal" method="post" action="{{ route('storecat') }}">
    @csrf
    <fieldset>

        <!-- Form Name -->
        <legend>Create new category</legend>



        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Category name</label>
            <div class="col-md-5">
                <input id="name" name="name" type="text" placeholder="Category name" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="status">Status</label>
            <div class="col-md-5">
                <select id="status" name="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
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