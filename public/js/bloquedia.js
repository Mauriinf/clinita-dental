function init(){
	$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

    $('.bloque').click($(this), seleccionar);
}

function seleccionar(bloques){
    let dia = parseInt(bloques.target.dataset.dia);
    let bloque = parseInt(bloques.target.dataset.bloque);
    
    $.ajax({
        url: `/bloque-dia/config-agenda/${dia}/${bloque}`,
        type: 'GET',
        data: {},
        contentType: false,
        processData: false,
  
        success: function(data)
        {
          console.log(data);
        }
      });
}

init();

