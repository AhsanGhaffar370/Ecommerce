@if($errors->any())
    <div class="alert alert-danger">
        <h4>Error</h4>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">
        <h4>Success</h4>
        <ul>
            <li>{{ session('success') }}</li>
        </ul>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        <h4>Error</h4>
        <ul>
            <li>{{ session('error') }}</li>
        </ul>
    </div>
@endif