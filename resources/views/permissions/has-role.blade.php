<div>
    <div class="card mb-3">
        <div class="card-header">Peran untuk seorang user</div>
        <div class="card-body">
            <form action="#" wire:submit.prevent="store">
                <div class="form-group">
                    <input type="text" wire:model="email" class="form-control" placeholder="User Email">
                </div>
                <div class="form-group">
                    <select wire:model="requestRole" class="form-control" required>
                        <option selected>Pilih Role</option>
                        @foreach ($roles as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('role') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tetapkan</button>
            </form>
        </div>
    </div>


    <div class="card">
        <div class="card-header">Peran & Perizinan</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Peran</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>
                                {{ implode(',', $item->getRoleNames()->toArray()) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
