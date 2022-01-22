<div class="d-flex  align-items-center">
    <a target="_blank"
       href="{{route('admin.file_status.file_status',['user'=>$user['id'], 'year' => request('year') ?? date("Y")])}}"
       class="btn btn-primary btn-sm mr-1 ">File
        Status</a>

    <a target="_blank"
       href="{{route('admin.download_tax_document',['user'=>$user['id'], 'year' => request('year') ?? date("Y")])}}"
       class="btn btn-success btn-sm mr-1">Tax Docs</a>

    <a target="_blank"
       href="{{route('admin.user_tax_document',['user'=>$user['id'], 'year' => request('year') ?? date("Y")])}}"
       class="btn btn-info btn-sm mr-1">User Tax Docs</a>

    <a @if($invoice_link == '#')  onclick="alert('No Invoice Found!')" @else target="_blank" href="{{$invoice_link}}"
       @endif  class="btn btn-warning btn-sm mr-1">Invoice</a>

    <a target="_blank" href="{{route('admin.client.show',$user['id'])}}" class="btn btn-secondary btn-sm mr-1">View</a>

    <form action="{{route('admin.client.delete',$user['id'])}}" method="post">
        @csrf
        @method('DELETE')
        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm">Delete</button>
    </form>
</div>
