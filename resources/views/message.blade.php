<div class="row">
    <div class="col-md-12">
        @if (session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                <strong>Error! </strong> {{ session()->get('error') }}
            </div>
        @endif
    </div>
</div>
