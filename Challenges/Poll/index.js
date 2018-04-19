function getPollResults() {        
  $.ajax({
      type: "POST",
      url: "",
      dataType: "",
      contentType: "",
      data: {},
      success: function(data, status) {
         console.log(data);
      },
      complete: function(data, status) {
        //optional, used for debugging purposes
        //console.log(status);
      }
   });
}