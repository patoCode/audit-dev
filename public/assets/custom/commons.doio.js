function viewPassword(id){
  if($("#password-"+id).prop("type")=='text')
    $("#password-"+id).prop("type", "password");
  else
    $("#password-"+id).prop("type", "text");
}

/* icon= success, error, warning*/
function SWAlert(icon,title,timer){
  Swal.fire({
      position: 'top-end',
      icon: icon,
      title: title,
      showConfirmButton: false,
      timer: timer!=null?timer:1500
    })
}


function delayReload(time){
   setInterval(function(){
            location.reload();
  },time)
}