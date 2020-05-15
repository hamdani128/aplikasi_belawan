<div>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>Buat {{ $name == "role" ? "peran" : "permission" }} baru</div>
                        <div>
                            {{ $name == "role" ? "⌘" : "⌥" }}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="#" method="post" wire:submit.prevent="store">
                        <div class="form-group">
                            <label for="permissionRequest">Name</label>
                            <input type="text" wire:model="permissionRequestName" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="text-center">Perbaiki</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles_permissions as $permissions)
                        <tr>
                            <td>{{ $permissions->name }}</td>
                            <td class="d-flex align-items-center justify-content-center">
                                <a href="">Edit</a>
                                <livewire:permissions.delete :key="$permissions->id" :permissions="$permissions">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
