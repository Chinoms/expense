@extends("partials.dashboard")

@section("hello")
{{"List Categories"}}
@endsection


@section('content')
<table class="table table-striped">
    <th>SN</th>
    <th>Category</th>
    <th>Status</th>
    <th>Date Created</th>
    <th>Action</th>
    <tbody>
        @foreach($cats as $cat)
        <tr>
            <td>
                {{$cat->id}}
            </td>
            <td>
                {{$cat->name}}
            </td>
            <td>
                {{$cat->status}}
            </td>
            <td>
                {{$cat->created_at}}
            </td>
            <td>
                <button class="btn btn-primary">Edit</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection