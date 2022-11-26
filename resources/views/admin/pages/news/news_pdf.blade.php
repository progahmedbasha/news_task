<h1>Result For News :</h1>
<table id="datatable" class="table table-striped table-bordered p-0">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Date</th>
            <th>Publishers</th>
            <th>Status</th>
        </tr>
    </thead>
   
    <tbody>

        @foreach($news as $index=>$new)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$new->title}}</td>
            <td>{{$new->publish_date}}</td>
            <td>{{ $new->User->name }}</td>
            <td>
            @if ($new->active ==1)
                Active
                @else
                Deactive
            @endif
            </td>
        </tr>
        @endforeach
    </tbody>


</table>