<label class="custom-toggle">
    <form action="{{ route('espec.update.estado', $id) }}" id="form-estado{{$id}}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="estado" value="{{($estado==1)?'0':'1'}}">
    <input type="checkbox" {{ $estado==1 ? 'checked' :"" }}/>
    <span class="custom-toggle-slider rounded-circle" onclick="event.preventDefault();
        document.getElementById('form-estado<?php echo $id; ?>').submit();"></span>
    </form>

</label>
