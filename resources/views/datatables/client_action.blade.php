<div class="d-flex ">
    <a href="{{route('admin.file_status.file_status',$user['id'])}}" class="btn btn-primary btn-sm mr-1 ">File
        Status</a>
    <a href="{{route('admin.download_tax_document',$user['id'])}}" class="btn btn-success btn-sm mr-1">Tax Docs</a>
    <a href="{{route('admin.user_tax_document',$user['id'])}}" class="btn btn-info btn-sm mr-1">User Tax Docs</a>
    <a href="{{$invoice_link}}" class="btn btn-warning btn-sm mr-1">Invoice</a>
    <button class="btn btn-secondary btn-sm mr-1">View</button>
    <button class="btn btn-danger btn-sm">Delete</button>
</div>
