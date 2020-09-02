<div class="table-data-feature">
    <div class="row">              
        <a href="javascript:void(0);" wire:click="edit({{ $id }})" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
            <i class="zmdi zmdi-edit"></i>
        </a>
        <a href="javascript:void(0);" onclick="confirm('{{ $id }}')" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
            <i class="zmdi zmdi-delete"></i>
        </a> 
    </div>                  
</div>