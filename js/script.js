$(function()
    {
      $("#recordForm").validate(
      {
        rules: 
        {
          empname: 
          {
            required: true
          }
        },
        
        messages: 
        {
          empname: 
          {
            required: "Please enter your name"
          }
        }
      }); 
	

	});
