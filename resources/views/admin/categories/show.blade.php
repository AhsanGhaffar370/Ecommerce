@extends('admin/layout/layout')

@section('page_title','| Show Category')

@section('page-style')
{{-- Page css files --}}

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
            <div class="col-md-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>View Category</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="form1" method="POST" action="{{ route('admin.categories.update', ['category' => $category->id]) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group">
                                <input 
                                    type="text" 
                                    name="name" 
                                    value="{{ old('name') ?? $category->name }}" 
                                    class="form-control rounded-0 p-4" 
                                    id="name" 
                                    placeholder="Category Name" 
                                    disabled
                                />
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div class="form-group">
                                <input 
                                    type="text" 
                                    name="parent_id" 
                                    value="{{ old('parent_id') ?? ($category->parent ? $category->parent->name : 'No Parent') }}" 
                                    class="form-control rounded-0 p-4" 
                                    id="parent_id" 
                                    placeholder="Parent Category" 
                                    disabled
                                />
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div class="form-group">
                                <input 
                                    type="text" 
                                    name="status" 
                                    value="{{ old('status') ?? ($category->status ? 'Active' : 'Inactive') }}" 
                                    class="form-control rounded-0 p-4" 
                                    id="status" 
                                    placeholder="Status" 
                                    disabled
                                />
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </form>
                        <!-- End of form -->
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

@endsection
