<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>{{ $page_title ?? '' }}</title>
    {!! $metas ?? '' !!}
    @include('dashboard.layouts.links')
</head>

<body class="dashboard dashboard_1">
    <h1 class="text-center">Tables Of Themes or Template</h1>
    @auth
        <h3 class="text-center"><a href="{{route('dashboard.index')}}">Dashboard</a></h3>
    @endauth
    <div class="card card-body">
        <div class="table-responsive">
            <table id="themes-table" class="text-dark w-100 h-100"></table>
        </div>
    </div>
    @include('dashboard.layouts.scripts')
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
            ajax: `{{ route('landing.page') }}`,
            columns: [{
                    title: "Image",
                    data: 'image_path',
                    name: "image_path",
                    render(data, type, row) {
                        return `<img src="/${data}" alt="${row.title}" title="${row.title}" width='200px' />`
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
            ]
        });
    </script>
</body>

</html>
