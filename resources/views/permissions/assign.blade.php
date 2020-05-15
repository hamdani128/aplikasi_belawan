@section('styles')
    <link href="/vendor/select2/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-search { background-color: #131314; padding: 2px 4px }
        .select2-search input { background-color: #131314; }
        .select2-results { background-color: #131314; }
        .select2-container--default .select2-selection--multiple {
            background-color: #131314;
            border-color: #2f2f36;
        }
        .select2-dropdown {border-color: #2f2f36;}
        .select2-container--default.select2-container--focus .select2-selection--multiple {border-color: #2f2f36;}
        .select2-container--default .select2-selection--multiple .select2-selection__choice {background-color: #000;}
    </style>
@endsection
@push('scripts')
    <script src="/vendor/select2/js/select2.min.js"></script>
    <script>
        $(function () {
            $('.select2').select2({
                placeholder: "Pilih perizinan",
                allowClear: true
            });
            $('.select2').on('select2:select', function (e) {
                var data = $(e.target).select2("val");
                @this.set('permission', data);
            });
        })
    </script>
@endpush
<div>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">Tetapkan Peran & Perizinan</div>
                <div class="card-body">
                    <form action="#" method="post" wire:submit.prevent="store">
                        <div class="form-group">
                            <select wire:model="role" class="form-control" required>
                                <option selected>Pilih Role</option>
                                @foreach ($roles as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('role') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group" wire:ignore>
                            <select name="permission" class="form-control select2" multiple required>
                                @foreach ($permissions as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit">Tetapkan</button>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-header">Peran & Perizinan</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Peran</th>
                                <th>Perizinan</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($roles as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @foreach ($item->permissions as $item)
                                            <span class="mx-1">{{ $item->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <livewire:permissions.has-role/>
        </div>
    </div>
</div>
