@extends('admin/layout/layout')

@section('page_title','| Home')

@section('page-style')
{{-- Page css files --}}
<!-- Bootstrap -->
<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<!-- Datatables -->
<link href="{{ asset('admin_assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin_assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}"
  rel="stylesheet">
<link href="{{ asset('admin_assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"
  rel="stylesheet">
<link href="{{ asset('admin_assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
  rel="stylesheet">
<link href="{{ asset('admin_assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}"
  rel="stylesheet">
@endsection

@section('content')

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Categories Management</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_alerts">
            @include('admin/includes/alerts')
            <div class="clearfix"></div>
          </div>
          <div class="x_title">
            <h2>List Categories</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($categories as $category)
                      <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                          <label class='badge badge-secondary '>
                            {{ $category->parent->name ?? 'No Parent' }}
                          </label>
                        </td>
                        <td>{{ ($category->status) ? 'Active' : 'Inactive'  }}</td>
                        <td>{{ $category->created_at->format('d-m-Y') }}</td>
                        <td>
                          <a href="{{ route('admin.categories.show', ['category' => $category->id]) }}"
                            class="btn btn-sm btn-info">
                            View
                          </a>
                          <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}"
                            class="btn btn-sm btn-warning">
                            Edit
                          </a>
                          <a 
                            href="{{ route('admin.categories.destroy', ['category' => $category->id]) }}"
                            {{-- href="javascript:void(0)" --}}
                            data-id="{{ $category->id }}"
                            class="btn btn-sm btn-danger delete_category">
                            Delete
                          </a>

                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

@endsection

@section('page-script')
{{-- Page js files --}}
<!-- Datatables -->
<script src="{{ asset('admin_assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/pdfmake/build/vfs_fonts.js') }}"></script>

<script>
$(document).on('click', '.delete_category', function(e) {
  e.preventDefault();
  console.log($(this).attr('href'));
  let id = $(this).data('id');
  let token = $("meta[name='csrf-token']").attr("content");

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type: "post",
    url: $(this).attr('href'),
    data: {
      id: id,
      _method: 'DELETE',
    },
    success: function(data) {
      alert(data.msg);
      console.log(data);
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
});
</script>
@endsection