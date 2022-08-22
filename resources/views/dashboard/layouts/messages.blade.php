@if ($errors->any())
    <div class="alert alert-danger">
        <ol class="p-0 m-0 text">

            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ol>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
