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
        @php
        $expenseTime = \Carbon\Carbon::parse($expense->created_at);
        $timeofExpense = $expenseTime->format('d-M-Y');
        @endphp
        <tr>
        <td>{{$sn}}</td>
        <td>{{ $expense->narration }}</td>
        <td>{{ number_format($expense->amount) }}</td>
        <td>{{ $expense->categories->name }}</td>
        <td>{{ $timeofExpense }}</td>
        </tr>
        <?php
        $sn++;
        ?>
        @endforeach
    </tbody>
</table>


{{$expenses->links()}}

@endsection