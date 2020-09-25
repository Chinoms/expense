@extends("partials.dashboard")

@section("hello")
{{"List Categories"}}
@endsection


@section('content')
<table class="table table-striped">
    <th>SN</th>
    <th>Category</th>
    <th>Amount</th>
    <th>Date</th>
    <tbody>

        <?php
        $i = 1;
        ?>
        @foreach($reportsbyCategory as $expenses)
        @php
        $catTime = \Carbon\Carbon::parse($expenses->created_at);
        $time = $catTime->format('d-M-Y');
        @endphp
        <tr>
            <td>
                {{$i}}
            </td>
            <td>
                {{$expenses->narration}}
            </td>
            <td>
                {{ number_format($expenses->amount) }}
            </td>
            <td>
                {{$time}}
            </td>   
        </tr>
        <?php
        $i += 1;
        ?>
        @endforeach
    </tbody>
</table>
@endsection