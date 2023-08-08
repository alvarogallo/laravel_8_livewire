<div class="form-group">
    <label>Nombre</label>
    <input type="text" class="form-control" wire:model='nombre'>
    @error('nombre') <span>{{ $message }}</span> @enderror
    <button wire:click="crear()" class="btn btn-success btn-block">Crear</button>
    {{ $bandera }}
</div>
