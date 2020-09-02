<div class="col-lg-6">
	<div class="card">
		<div class="card-header"> @if( $selected_id == 0) Registrar desarrolladora @else Editar desarrolladora @endif</div>
		@include('common.messages')
		<div class="card-body">
			<hr>
			<form novalidate="novalidate">
				<div class="form-group has-success">
					<label for="cc-name" class="control-label mb-1">Nombre</label>
					<input wire:model="nombre" type="text" class="form-control cc-name valid">
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