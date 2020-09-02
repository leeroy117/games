@if(count($errors) > 0)
     <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <ul style="list-style-type:none;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
     </div>
@endif