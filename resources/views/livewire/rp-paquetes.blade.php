<div class="row">    
  	<div class="col-md-8">        
    	<div class="mt-2 table-responsive-md">            
      		<table class="table table-striped">                
        		<thead>                  
          			<tr>                    
            			<th scope="col">Id</th>                    
            			<th scope="col">Nombre</th>                    
            		</tr>                
        		</thead>                
        		<tbody>                    
          			@foreach ($paquetes as $paquete)                       
            			<tr>                            
              				<td>{{ $paquete->id }}</td>                            
              				<td>{{ $paquete->nombre }}</td>                            
              				<td>                                
                				<button type="button" class="btn btn-success">Editar</button>                            
              				</td>                            
              				<td>                                
                				<button type="button" class="btn btn-danger">Borrar</button>                            
              				</td>                        
            			</tr>                    
          			@endforeach                
        		</tbody>            
       		</table>             
       		{{ $paquetes->links() }}        
    	</div>    
   </div>    
   <div class="col-md-4">    
   		<div>
			<h3>Crear un nuevo producto</h3> 
	  		<!-- @include('livewire.add_paquete') -->
	  		<label>Nombre</label>
    <input type="text" class="form-control" wire:model='nombre'>
    @error('nombre') <span>{{ $message }}</span> @enderror
    <button wire:click="crear()" class="btn btn-success btn-block">Crear</button> 
	  		<button class="btn btn-success" wire:click='save'>Crear producto</button>   	
	  	</div>
   </div> 
</div>