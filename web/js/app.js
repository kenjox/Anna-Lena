
$(function() {

	//News Form
    var newsForm= $('#news-form');
    var spinArea        = $('#spin-area');

    newsForm.submit(function(e){
      e.preventDefault();

      if(newsForm.parsley().isValid()){
        // Run the spinner
        spinArea.spin('large');

        // Send a POST AJAX request to the URL of the application
        $.ajax({
            type: "POST",
            url: newsForm.attr('action'),
            data: newsForm.serialize(),
            dataType: "json"
          })
          .done(function(response) {
            if (response.success) {

              humane.log(response.success.message, 
                { addnCls: 'humane-flatty-success'}, 

                
                function(){
                  window.location = response.success.url;
                } 
              );
            } else {
              humane.log(response.errors,{ addnCls: 'humane-flatty-error'});
              console.log(response);
            }
          })
          .fail(function () {
            humane.log('An error has occured, please try again',{ addnCls: 'humane-flatty-error'});
          })
          .always(function() {
            spinArea.spin(false);
          });
      }
      
    });


	//Login  Form
	
	

  });

