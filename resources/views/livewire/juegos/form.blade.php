<div class="col-lg-6">
    <div class="card">
        <div class="card-header"> @if( $selected_id == 0) Registrar juego @else Editar juego @endif</div>
        @include('common.messages')
        <div class="card-body">
            <hr>
            <form novalidate="novalidate">
                <div class="form-group has-success">
                    <label for="cc-name" class="control-label mb-1">Nombre</label>
                    <input wire:model="nombre" type="text" class="form-control cc-name valid">
                </div>
                <div class="form-group has-success">
                    <label for="cc-name" class="control-label mb-1">Precio pc</label>
                    <input wire:model="precio_pc" type="text" class="form-control cc-name valid">
                </div>
                <div class="form-group has-success">
                    <label for="cc-name" class="control-label mb-1">Precio xbox</label>
                    <input wire:model="precio_xbox" type="text" class="form-control cc-name valid">
                </div>
                <div class="form-group has-success">
                    <label for="cc-name" class="control-label mb-1">Precio Play station</label>
                    <input wire:model="precio_ps" type="text" class="form-control cc-name valid">
                </div>
                <div class="form-group has-success">
                    <label for="cc-name" class="control-label mb-1">Sinopsis</label>
                    <input wire:model="sinopsis" type="text" class="form-control cc-name valid">
                </div>
                <div class="form-group has-success">
                    <label for="cc-name" class="control-label mb-1">Video</label>
                    <input wire:model="video" type="text" class="form-control cc-name valid">
                </div>
                <div class="form-group has-success">
                    <label for="cc-name" class="control-label mb-1">Imagen</label>
                    @if($imagen)
                    <img src={{ $imagen }} witdh="100px" height="100px" alt="">
                    <img src="{{'storage/'.$imagen }}" witdh="100px" height="100px" alt="">
                    @endif
                    <input wire:change="$emit('fileChoosen')" accept="image/x-png,image/gif,image/jpeg" id="imagen" type="file" class="form-control cc-name valid">
                </div>
                <div class="row">
                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                        <label for="cc-payment" class="control-label mb-1">Desarrolladora</label>
                        <select wire:model="desarrolladoras_id_desarrolladora" class="js-select2" name="categoria">
                            @forelse($desarrolladoras as $item)
                            <option selected="selected">Click para elegir</option>
                            <option value="{{ $item->id_desarrolladora }}">{{ $item->nombre}}</option>
                            @empty
                            <option selected="selected">No hay desarrolladoras</option>
                            @endforelse
                        </select>
                        @error('desarrolladoras_id_desarrolladora') <span class="text-danger">{{ $message }}</span> @enderror

                        <div class="dropDownSelect2"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                        <label for="cc-payment" class="control-label mb-1">Desarrolladora</label>
                        <select wire:model="clasificaciones_id_clasificacion" class="js-select2" name="categoria">
                            @forelse($clasificaciones as $item)
                            <option selected="selected">Click para elegir</option>
                            <option value="{{ $item->id_clasificacion }}">{{ $item->nombre}}</option>
                            @empty
                            <option selected="selected">No hay clasificaciones</option>
                            @endforelse
                        </select>
                        @error('clasificaciones_id_clasificacion') <span class="text-danger">{{ $message }}</span> @enderror

                        <div class="dropDownSelect2"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                        <label for="cc-payment" class="control-label mb-1">Genero</label>
                        <select wire:model="generos_id_genero" class="js-select2">
                            @forelse($generos as $item)
                            <option selected="selected">Click para elegir</option>
                            <option value="{{ $item->id_genero }}">{{ $item->nombre}}</option>
                            @empty
                            <option selected="selected">No hay generos</option>
                            @endforelse
                        </select>
                        @error('generos_id_genero') <span class="text-danger">{{ $message }}</span> @enderror

                        <div class="dropDownSelect2"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3"></div>
                    <div>
                        <button wire:click="doAction(1)" type="button" class="btn btn-lg btn-secondary">
                            <span id="payment-button-amount">Regresar</span>
                        </button>
                    </div>
                    <div class="ml-5">
                        <button wire:click="storeOrUpdate()" type="button" class="btn btn-lg btn-success ">
                            <span>Guardar</span>
                        </button>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    window.livewire.on('fileChoosen', () => {
        let inputField = document.getElementById('imagen')

        let file = inputField.files[0]
        let reader = new FileReader();

        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result)

        }

        reader.readAsDataURL(file)
    })
</script>