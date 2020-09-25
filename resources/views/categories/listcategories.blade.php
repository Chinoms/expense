    @extends("partials.dashboard")

    @section("hello")
    {{"List Categories"}}
    @endsection


    @section('content')
    <table class="table table-striped">
        <th>SN</th>
        <th>Category</th>
        <th>Total Expenditure</th>
        <th>Status</th>
        <th>Date Created</th>
        <tbody>

            <?php
            $i = 1;
            ?>
            @foreach($cats as $cat)
            @php
            $catTime = \Carbon\Carbon::parse($cat->created_at);
            $time = $catTime->format('d-M-Y');
            @endphp
            <tr>
                <td>
                    {{$i}}
                </td>
                <td>
                    {{$cat->name}}
                </td>
                <td>
                    {{ number_format($cat->expenses->sum('amount'))}}
                </td>
                <td>
                    {{$cat->status}}
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