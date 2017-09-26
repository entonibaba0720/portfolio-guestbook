

jQuery(document).ready(function() {

  jQuery('#add-items').submit(function(event) {
    event.preventDefault();
    var uname = jQuery("#username").val();
    var mail = jQuery("#email").val();
    var comm = jQuery("#comment").val();

      jQuery.ajax({
        url: ajaxurl,
        dataType: "JSON",
        method: "POST",
       
        data: {action: "add_data_callback'", username: "username", comment: "comment"},
        // success: function(response){
        //   jQuery("#response").append("Név: " + jQuery("#username").val());
        //   jQuery("#response").append("Vélemény: " + jQuery("#comment").val());
            success: function(data) {
                        console.log(data);
                  alert(data);
        },
        error: function(errorThrown){
            console.log(errorThrown);

        }
  });
      return false;

      });
  jQuery("#add").click(function(){
      jQuery.get(ajaxurl, function(data, status){
          alert("Data: " + data + "\nStatus: " + status);
      });
 });

  });
  