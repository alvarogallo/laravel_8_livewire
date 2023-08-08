<div x-data="inicial()">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
	<?php $boton = (isset($actual_familiar['ver_B']))?$actual_familiar['ver_B']:'11111111'; ?>
	@if(substr($boton,1,1)=='1') 
		<div class=" flex border border-black border-2 rounded space-x-2 md:space-x-4 lg:space-x-8">
		  	<div class="w-full rounded-lg text-center">
		  		@if(isset($actual_familiar['id_padre']) && $actual_familiar['id_padre']>0)
		  			@livewire('traer-progenitor',['quien' => $actual_familiar['id_padre'],2])
		  		@endif
		  	</div>
		 	<div class="w-full rounded-lg text-center">
		 		@if(isset($actual_familiar['id_madre']) && $actual_familiar['id_madre']>0)
		 			@livewire('traer-progenitor',['quien' => $actual_familiar['id_madre'],2])
		 		@endif
		 	</div>
		</div>
	@endif
	<div class="flex justify-center">
		<div>
			<a href="/ppal/{{ $actual_familiar['id'] }}/{{ ('1-'.$boton) }}"><button type="button" class="btn_om inline-block px-6 py-2.5 bg-{{ (substr($boton,1,1)=='1')?'green':'gray' }}-500 text-gray-700 font-medium text-xs leading-tight rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out mx-1">Padres</button></a>
		</div>
		<div>
			<a href="/ppal/{{ $actual_familiar['id'] }}/{{ ('2-'.$boton) }}"><button type="button" class="btn_om inline-block px-6 py-2.5 bg-{{ (substr($boton,2,1)=='1')?'green':'gray' }}-500 text-gray-700 font-medium text-xs leading-tight rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out mx-1">Abuelos</button></a>
		</div>
		<div>
			<a href="/ppal/{{ $actual_familiar['id'] }}/{{ ('4-'.$boton) }}"><button type="button" class="btn_om inline-block px-6 py-2.5 bg-{{ (substr($boton,4,1)=='1')?'green':'gray' }}-500 text-gray-700 font-medium text-xs leading-tight rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out mx-1">Hijos</button></a>
		</div>
		<div>
			<a href="/ppal/{{ $actual_familiar['id'] }}/{{ ('5-'.$boton) }}">
				<button type="button" class="btn_om inline-block px-6 py-2.5 bg-{{ (substr($boton,5,1)=='1')?'green':'gray' }}-500 text-gray-700 font-medium text-xs leading-tight rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out mx-1" >Ahijados</button>
			</a>
		</div>
		<div>
			<button wire:click="$set('modal_ayuda',true)"  class="rounded-full bg-yellow-500 text-white w-10 h-10 flex items-center justify-center">?</button>
		</div>
	</div>	
	<div class="flex justify-center hidden md:block mobile-hide">
		{{-- <button>{{ $boton }}</button> --}}
	</div>
    <div class="flex justify-center space-x-2 md:space-x-4 lg:space-x-8">
        <div class="border border-black border-2 rounded w-5/12 md:w-4/12 lg:w-3/12">
        	<div class="relative">
        		<div @click="ch_foto = true" class="absolute top-0 right-0 w-12 cursor-pointer">
					<img src="{{ asset('images/camara_svg_1_64.svg') }}" title="Cambiar Foto de Perfil">      			
        		</div>
        		@if($userId==$actual_familiar['user_id'])
					<div @click="edit_indi = true" class="absolute top-0 left-0 w-12 cursor-pointer">
					    <img src="{{ asset('images/lapiz_svg_64.svg') }}" title="Editar datos Personales">	    			
	        		</div>
					<div x-on:click="window.location.href='/adicionar_familiar/{{ $actual_familiar['id'] }}'" class="absolute bottom-8 right-0 w-12 cursor-pointer">
						<img src="{{ asset('images/add_person_svg.svg') }}" title="Adicionar un familiar">			        			
	        		</div>
	        	@endif
        		<div class="m-3">
        			<img class="w-full rounded-full object-cover" src="{{ asset($actual_familiar['foto']) }}" style="max-width:200px" ></img>	
        		</div>
        		
        		<span class="hidden sm:block">(Indi:{{ $actual_familiar['id'] }})</span>{{ $actual_familiar['nombre'] }}
        	</div>
        </div>
        @livewire('traer-espos',['quien' => $actual_familiar['id'],2])
    </div>
    <div class="flex justify-center flex-wrap my-1">
	 	<div class="text-center rounded-md bg-gray-400 min-w-fit px-1 ml-1">Visitas:{{ $actual_familiar['visitas'] }}</div>

	 	@if(!$actual_familiar['is_user'])
			<div class="rounded-md bg-gray-400 min-w-fit px-1 ml-1">
		 		<a href="/comun/invitar/{{ $actual_familiar['id'] }}" class="bg-transparent hover:bg-green-500 px-1 rounded-full">Invitar</a>
	   	 	</div>
	   	@endif
	 	<div class="rounded-md bg-gray-400 min-w-fit px-1 ml-1">
	 		<a href="/mirar_fotos/individuo/{{ $actual_familiar['id'] }}" class="bg-transparent hover:bg-green-500 px-1 rounded-full">Fotos</a>
   	 	</div>
	 	<div class="rounded-md bg-gray-400 min-w-fit px-1 ml-1">
	 		<a href="/mirar_videos/individuo/{{ $actual_familiar['id'] }}" class="bg-transparent hover:bg-green-500 px-1 rounded-full">Videos</a>
   	 	</div> 	


   	 	{{-- 
	   	 	<div class="min-w-fit px-1 ml-1">
	   	 		@livewire('v2.nc-odometer')
	   	 	</div>
	   	--}}



		{{-- <div class="rounded-md bg-gray-400 min-w-fit px-1 ml-1">
			<button  @click="subir_fotos = true" class="bg-transparent hover:bg-green-500 px-1 rounded-full">SubirFotos</button>
		</div> --}}	    	 	
		{{-- <div class="rounded-md bg-gray-400 min-w-fit px-1 ml-1">
			<a href="/adicionar_familiar/{{ $actual_familiar['id'] }}" class="bg-transparent hover:bg-green-500 px-1 rounded-full">Adicionar Familiar</a>
		</div> --}}				
   	</div>        	
    @if($actual_familiar['id']>0)
	    @if(substr($boton,4,1)=='1')
	    	<div class="flex justify-center flex-wrap my-1">
				<div class="bg-slate-200 flex space-x-2 md:space-x-4 lg:space-x-8">
		  			@livewire('traer-hijos',['progenitor' => $actual_familiar['id']])
				</div>	
			</div>
		@endif
		@if(substr($boton,5,1)=='1')
			<div class="flex justify-center flex-wrap my-1">
				<div class="bg-slate-300 flex space-x-2 md:space-x-4 lg:space-x-8">
		  			@livewire('traer-ahijados',['adrin' => $actual_familiar['id']])
				</div>	
			</div>
		@endif
	@endif
	








	<div x-show="edit_indi" @click.away="edit_indi = false" class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center z-50" style="display:none" >
	    <div class="fixed inset-0 transition-opacity">
	      	<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
	    </div>
	    <div class="bg-white rounded-lg p-6 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
	      	<div class="flex justify-between items-center">
	      		<div class="w-5/6">
	      			@if($msg_edit)
	      				<p class="text-sm leading-5 font-medium text-green-800">{{ $msg_edit }}</p>
	      			@endif
	      		</div>
	      		<div class="w-1/6">
	        		<button @click="edit_indi = false" class="text-red-400 hover:text-red-500 font-bold py-2 px-4">Cerrar</button>
	        	</div>
	      	</div>
	      	<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Cambiando Informacion</h3>
	      	<form  class="space-y-6" wire:submit.prevent="submit_indi">
	      		<div>
		            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
		            <input type="text" wire:model.defer="actual_familiar.nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
		            @error('actual_familiar.nombre') <span class="text-red-500">{{ $message }}</span>@enderror	      			
	      		</div>
                <div  class="flex">
                	<label class="w-1/2 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido</label>
                	<label class="w-1/2 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Segundo Apellido</label>
                </div>
				<div  class="flex">
                    <input type="text" name="apellido" wire:model.defer="actual_familiar.apellido" id="apellido" class="w-1/2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    <input type="text" name="apellido_2" wire:model.defer="actual_familiar.apellido_2" id="apellido_2" class="w-1/2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </div> 
                <div  class="flex">
					<label class="w-1/3 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha Nace</label>
                	<label class="w-1/3 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apodo</label>
                	<label class="w-1/3 block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $isLive ? 'Vive' : 'Fallecido' }}</label>
                	
                </div>
				<div  class="flex">
					<div class="w-1/3">
                    	<div>{{ $actual_familiar['fecha_n'] }}</div>
						<input type="date" wire:model.defer="actual_familiar.fecha_n" id="fecha_n">
            			@error('actual_familiar.fecha_n') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                     <div class="w-1/3">					
                    	<input type="text" name="apodo" wire:model.defer="actual_familiar.apodo" id="apodo"  class="w-1/3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div class="w-1/3">
                    	<input type="checkbox" wire:model="isLive" {{ $isLive ? '' : 'disabled' }}>
                    	@if(!$isLive)
                    		<input type="date" wire:model.defer="actual_familiar.fecha_d" id="fecha_d">
            				@error('actual_familiar.fecha_d') <span class="text-red-500">{{ $message }}</span>@enderror
            			@endif
                    </div>
                    
                    
                </div>  
                <div class="flex">
                	<div>
						<label class="inline-flex items-center bg-gray-200 p-2">
			    		<input type="radio" class="appearance-none focus:outline-none" name="sexo" value="M"  wire:model="actual_familiar.sexo">
						<span class="ml-2 px-2 rounded-full bg-{{ ($actual_familiar['sexo']=='M')?'blue':'' }}-300" {{ ($actual_familiar['sexo']=='M')?'checked':'' }}>Masculino</span>
					</label>
					<label class="inline-flex items-center bg-gray-200 p-2">
				    	<input type="radio" class="appearance-none focus:outline-none" name="sexo" value="F"  wire:model="actual_familiar.sexo">
				    	<span class="ml-2 px-2 rounded-full bg-{{ ($actual_familiar['sexo']=='F')?'blue':'' }}-300" {{ ($actual_familiar['sexo']=='F')?'checked':'' }}>Femenino</span>
					</label>
					<input type="hidden" name="indi" wire.model="actual_familiar.id">
                	</div>
					<button class="inline-flex self-end bg-green-400 font-bold rounded-lg px-6 py-2">Actualizar Individuo</button>                	
                </div> 

	      	</form>
 			







	    </div>
	</div>
	<div x-show="ch_foto" @click.away="ch_foto = false" class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center">
	    <div class="fixed inset-0 transition-opacity">
	      	<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
	    </div>
	    <div class="bg-white rounded-lg p-6 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
	      	<div class="flex justify-end">
	        	<button @click="ch_foto = false" class="text-gray-400 hover:text-gray-500 font-bold py-2 px-4 rounded">Cerrar</button>
	      	</div> 
 			<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Cambiando Foto Perfil</h3>
			<form action="{{ route('upload-image') }}" method="POST" enctype="multipart/form-data" x-data="{ imagePreview: null }">@csrf
			    <div class="mb-4">
			        <label class="block text-gray-700 font-bold mb-2" for="image">Imagen</label>
			        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" type="file" name="image" x-on:change="imagePreview = URL.createObjectURL($event.target.files[0])">
			    </div>
			    <div class="mb-4" x-show="imagePreview"><img class="max-h-64 mx-auto" x-bind:src="imagePreview"></div>
			    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Subir imagen</button>
			    <input type="hidden" name="individuo" value="{{ $actual_familiar['id'] }}">
			</form>

<!-- 			<form class="space-y-6" action="/edit_indi" method="POST">@csrf
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar</button>
            </form> -->
            
           	<div class="flex justify-end">
           		<a href="/comun/perfil/{{ $actual_familiar['id']  }}"><button class="bg-green-300 text-gray-400 hover:text-gray-500 font-bold py-2 px-4 rounded">Tomar Imagen del Album</button></a>
           	</div>
	    </div>
	</div>



	<div x-show="subir_fotos"  class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center" >
	    <div class="fixed inset-0 transition-opacity">
	      	<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
	    </div>
	    <div x-data="{ isChecked: true }" class="bg-white rounded-lg p-6 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
	      	<div class="flex justify-end">
	      		<button @click="subir_fotos = false" class="text-red-400 hover:text-red-800 font-bold py-2 px-4 rounded">Cerrar</button>
	      	</div>
     	
 			<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Subiendo Fotos</h3>
			<form method="post" action="{{ route('subiendole_fotos') }}" enctype="multipart/form-data" class="dropzone" id="my-awesome-dropzone">@csrf
                <div class="dz-message">
                    <div class="icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <h2>Trae las fotos aca (Arrastralas con el Mouse)</h2>
                </div>
                <input type="hidden" name="individuo" :value="isChecked ? '{{ $actual_familiar['id'] }}' : ''">
            </form>	
            <input type="checkbox" x-model="isChecked" value=""><span x-show="isChecked">Incluire a {{ $actual_familiar['nombre'] }} en la foto</span>	
	    </div>
	</div>	
	@if($modal_ayuda)
		@include('v2.comunes.modal_ayudas')
	@endif
	<script>
		function inicial(){
			return {
				edit_indi: false,
				ch_foto:false,
				subir_fotos:false
			}
		}
		Dropzone.options.myAwesomeDropzone = {
		    paramName: "file", // Las imÃ¡genes se van a usar bajo este nombre de parÃ¡metro
		    maxFilesize: 2000, // TamaÃ±o mÃ¡ximo en MB
			// success: function (file, response) {
   //      		console.log(response);
   //  		}		    
		};
		document.addEventListener("DOMContentLoaded", function() {
  			var buttons = document.getElementsByClassName("btn_om");
  			for (var i = 0; i < buttons.length; i++) {
    			buttons[i].setAttribute("title", "Oculta o Muestra");
  			}
		});		
	</script>

</div>
