$(document).ready(function() {
  path = window.location.pathname.split("/")
  var URI_BASE = window.location.protocol + "//" + window.location.host +"/"+path[1]
  console.log(URI_BASE)
   $("#input-filter").select2({
      language:"es",
      placeholder:"Buscar cliente...",
      minimumInputLength: 3,
      ajax: {
        type: 'POST',
         dataType: 'JSON',
         delay: 250,
          url: URI_BASE+'/Customer/search',
          data: function (params) {
            return {
              searchTerm: params.term // search term
            }
           },
          processResults: function (data) {
            return {
              results: data.data
            }
          }
        }
   })
})

$("#filter-customer").submit(function(e){
    var _self = $(this)
    var _data =  _self.serializeJSON();
    e.preventDefault()
    let _uri = _self.attr("data-uri")+_data.customer;
    location.replace(_uri);
})

