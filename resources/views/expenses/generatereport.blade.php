@extends("partials.dashboard")

@section("hello")
{{"List expenditure"}}
@endsection


@section('content')



<table class="table table-striped">
    <th>SN</td>
    <th>Name</th>
    <th>Total amount</th>
    <tbody>
        <?php $sn = 1; ?>
        @foreach($reports as $report)
        <?php $sn =$sn++; ?>
        <tr>
        <td>{{$sn}}</td>
        <td>{{ $report->name }}</td>
        <td>{{ $report->total_amount }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection