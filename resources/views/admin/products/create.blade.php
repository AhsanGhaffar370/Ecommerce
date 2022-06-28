@extends('admin/layout/layout')

@section('page_title','| Home')

@section('page-style')
{{-- Page css files --}}

@endsection

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Products Management</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Product</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="form1" method="post" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div class="form-group">
                                <input 
                                    type="text" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    class="form-control rounded-0 p-4" 
                                    id="name" 
                                    placeholder="Product Name" 
                                     
                                />
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            
                            <div class="form-group">
                                <input 
                                    type="text" 
                                    name="slug" 
                                    value="{{ old('slug') }}" 
                                    class="form-control rounded-0 p-4" 
                                    id="slug" 
                                    placeholder="Slug" 
                                    required 
                                />
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            
                            <div class="form-group">
                                <input 
                                    type="file" 
                                    name="image" 
                                    class="form-control rounded-0 p-4" 
                                    id="image" 
                                    required 
                                />
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            
                            <div class="form-group">
                                <select 
                                    id="category_id" 
                                    name="category_id" 
                                    class="form-control rounded-0" 
                                    multiple
                                    required
                                >
                                    <option value="" disabled selected>Select Category</option>     
                                    <option value="0">No Parent</option>
                                    {{ Helper::getCategories($categories, null) }}
                                </select>                                
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div class="form-group">
                                <textarea 
                                    name="description" 
                                    class="form-control rounded-0" 
                                    id="description" 
                                    cols="20" 
                                    rows="10" 
                                    placeholder="Description" 
                                    required
                                >{{ old('description') }}</textarea>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            
                            <div class="form-group">
                                <input 
                                    type="text" 
                                    name="price" 
                                    value="{{ old('price') }}" 
                                    class="form-control rounded-0 p-4" 
                                    id="price" 
                                    placeholder="Price" 
                                    required 
                                />
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            
                            <div class="form-group">
                                <input 
                                    type="text" 
                                    name="quantity" 
                                    value="{{ old('quantity') }}" 
                                    class="form-control rounded-0 p-4" 
                                    id="quantity" 
                                    placeholder="Quantity" 
                                    required 
                                />
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            
                            <div class="form-group">
                                <select 
                                    id="status" 
                                    name="status" 
                                    class="form-control rounded-0" 
                                    required
                                >
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="1" {{ (old('status') == '1') ? 'selected' : '' }}>Active</option>
                                    <option value="2" {{ (old('status') == '2') ? 'selected' : '' }}>Inactive</option>
                                </select>                                
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div class="centre">
                                <input type="submit" value="Submit" class="btn btn-outline-dark btn-md" />
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

<script>
        // Disable form submissions if there are invalid fields
        (function() {
            "use strict";
            window.addEventListener(
                "load",
                function() {
                    // Get the forms we want to add validation styles to
                    var forms = document.getElementsByClassName("needs-validation");
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(
                        form
                    ) {
                        form.addEventListener(
                            "submit",
                            function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add("was-validated");
                            },
                            false
                        );
                    });
                },
                false
            );
        })();
    </script>
@endsection
