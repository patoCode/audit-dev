$("#add-credentials").submit(function(e){
    var _self = $(this)
    var _data =  _self.serializeJSON();
    e.preventDefault()
    let _uri = _self.attr("data-uri");
    console.log($("#add-credentials").serializeJSON())
    $.ajax({
      url: _uri,
      type:'POST',
      dataType:'json',
      data:_data,
      success: function(respuesta) {
        if(respuesta.response === 1){
            console.log(respuesta)
        }else{
          $('#modalForm').modal('hide');
          SWAlert('success', "Agregado correctamente")
          delayReload(2000)
        }
      },
      error: function(xhr, status) {
            console.log("No se ha podido obtener la información");
        }
    });
})

function removeCredential(id, uri){
   const data = new FormData()
        data.append("id", id)

  Swal.fire({
    text: "Esta accion no se podra revertir! Esta seguro?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si',
    cancelButtonText: 'No'
  }).then((result) => {
      if (result.isConfirmed) {
        axios.post(uri, data)
        .then(function(response){
          if(response.response === 1){
                console.log(response)
            }else{
              SWAlert('success', "Eliminado correctamente")
              delayReload(2000)
            }
        })
    }
  })
}


