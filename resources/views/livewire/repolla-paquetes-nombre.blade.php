div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <button wire:click="create" class="btn btn-primary">Nuevo Paquete</button>
    @if($isOpen)
        @include('livewire.repolla-paquetes-nombre.form')
    @endif

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @dd($RS)
            @if(count($RS)>0)
                @foreach($RS as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->nombre }}</td>
                        <td>
                            <button wire:click="edit({{ $nombre->id }})" class="btn btn-primary">Editar</button>
                            <button wire:click="delete({{ $nombre->id }})" class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

