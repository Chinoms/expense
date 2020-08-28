@extends("partials.dashboard")

@section("hello")
{{"List expenditure"}}
@endsection


@section('content')
@if ($message = Session::get('expensesaved'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif


<table class="table table-striped">
    <th>SN</td>
    <th>Narration</th>
    <th>Amount</th>
    <th>Category</th>
    <th>Date</th>
    <tbody>
        <?php $sn = 1; ?>
        @foreach($expenses as $expense)
        <?php $sn =$sn++; ?>
        <tr>
        <td>{{$sn}}</td>
        <td>{{ $expense->narration }}</td>
        <td>{{ number_format($expense->amount) }}</td>
        <td>{{ $expense->category }}</td>
        <td>{{ $expense->created_at }}</td>
        </tr>
        @php $sn++; @endphp
        @endforeach
    </tbody>
</table>


{{$expenses->links()}}

@endsection