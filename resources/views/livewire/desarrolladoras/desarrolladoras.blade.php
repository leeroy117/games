<div>
    @if($action == 1)
    <div class="col-md-12">
        <!-- RECENT REPORT 2-->
        <div class="recent-report2">
            <h3 class="title-5">Desarrolladoras</h3>
            <div class="row">
                <button wire:click="doAction(2)"><i class="fa fa-plus-circle fa-lg"></i></button>
                <a href="/pdf_desarrolladoras" target="_blank" class="btn btn-dark ml-2 mb-2"><i class="fas fa-file"><span class="ml-2">Desarrolladoras</span></i></a>
            </div>
            <div class="recent-report__chart">
                @include('common.alerts')
                <div class="table-responsive table--no-card m-b-30">
                    <table class="table table-borderless table-striped table-earning">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th class="text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <input type="hidden" value="{{ $id = $item->id_desarrolladora }}">
                            <tr>
                                <td>{{ $id }}</td>
                                <td>{{ $item->nombre }}</td>
                                <td>
                                    @include('common.actions')
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- {{ $data->links() }} -->
                </div>
            </div>
            @elseif($action == 2)
            @include('livewire.desarrolladoras.form')
            @endif
        </div>
        <!-- END RECENT REPORT 2             -->
    </div>


</div>
<script type="text/javascript">
    function confirm(id) {
        let me = this;
        swal({
                title: 'Confirmar',
                text: 'Quieres eliminar el registro?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
                closeOnConfirm: false
            },
            function() {
                console.log('ID', id);
                window.livewire.emit('deleteRow', id)
                toastr.success('info', 'Registro eliminado con exito')
                swal.close()
            })

    }

    document.addEventListener('DOMContentLoaded', function() {

    })
</script>