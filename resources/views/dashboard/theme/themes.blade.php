@extends('dashboard.layouts.common')

@section('content')
    <div class="card card-body">
        @include('dashboard.layouts.messages')
        <a href="{{ route('dashboard.themes.create') }}" class="text-primary m-1 mb-3">Create new theme</a>
        <div class="table-responsive">
            <table id="themes-table" class="text-dark w-100"></table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const themeDt = $('#themes-table');

        function c(title = null, data = null, name = null) {
            if (data == null) {
                data = title.toLowerCase();
            }
            if (name == null) {
                name = title.toLowerCase();
            }
            return {
                title,
                data,
                name
            }
        }

        themeDt.DataTable({
            processing: true,
            serverSide: true,
            ajax: `{{ route('dashboard.themes.index') }}`,
            columns: [{
                    title: "Image",
                    data: 'image_path',
                    name: "image_path",
                    render(data, type, row) {
                        return `<img src="/${data}" width='100px' />`
                    }
                },
                c('Title'),
                {
                    title: "Preview",
                    data: 'preview_link',
                    name: "preview_link",
                    render(data, type, row) {
                        return `<a href="${data}" target="_blank" class='text-primary'>Preview</a>`
                    }
                },
                {
                    title: "Source",
                    data: 'source_link',
                    name: "source_link",
                    render(data, type, row) {
                        return `<a href="/download/${row.id}" class='text-primary'>Download</a>`
                    }
                },

                {
                    title: "Downloads",
                    data: 'downloads',
                    name: "downloads",
                    render(data, type, row) {
                        if (data > 0) return `<span class="badge badge-success">${data}</span>`
                        if (data <= 0) return `<span class="badge badge-danger">${data}</span>`
                    }
                },
                {
                    title: "Status",
                    data: 'status',
                    name: "status",
                    render(data, type, row) {
                        if (data == 1) return `<span class="badge badge-success">Acitve</span>`
                        if (data == 0) return `<span class="badge badge-danger">Inacitve</span>`
                    }
                },
                {
                    title: "Action",
                    defaultContent: "----",
                    render(data, type, row) {
                        return `
                    <a href="/dashboard/themes/${row.id}/edit"><i class='fas fa-edit text-primary'></i></a>
                    `
                    }
                }
            ]
        });
    </script>
@endsection
