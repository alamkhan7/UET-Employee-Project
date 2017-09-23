
/* Only for add employee page */
$(document).ready(function() {
  
  $("#staff").change(function(){
     if($(this).val()=="T")
     {    
        $(".department").show();
        $(".qualification").show();
        $(".position").show();

        $(".section").hide();
        $(".departmentother").hide();

         
     }
     else if($(this).val()=="N")
     {
        $(".section").show();

        $(".department").hide();
        $(".departmentother").hide();
        $(".qualification").hide();
        $(".position").hide();
     }
     else if($(this).val()=="Q")
     {
        $(".departmentother").show();

        $(".department").hide();
        $(".section").hide();
        $(".qualification").hide();
        $(".position").hide();
     }
     else
     {
        $(".departmentother").hide();
        $(".department").hide();
        $(".section").hide();
        $(".qualification").hide();
        $(".position").hide();
     }
     
  });
/*-------------------------------------------------------------------------*/

/* Form Validation for Add Employee Page */
  $("#register-form").validate({
    rules: 
    {
      empname: {
        required: true,
        maxlength:30,
        pattern:/^[a-zA-z ]*$/
      },
      empfather: {
        required: true,
        maxlength:30,
        pattern:/^[a-zA-z ]*$/
      },
      cnic: {
        required: true,
        digits: true,
        minlength:13,
        maxlength:13
      },
      address: {
        required: true,
        maxlength:100
      },
      email: {
        email: true
      },
      ntn: {
        maxlength:30,
        pattern:/^[a-zA-z0-9-]*$/
      },
      accno: {
        maxlength:20,
      },
      bps: {
        required: true,
        min: 0,
        max: 22,
        digits: true
      },
      fix:{
        required: true
      },
      designation: {
        required: true
      },
      campus:{
        required:true
      },
      staff: {
        required: true
      },
      department: {
        required:true
      },
      departmentother:{
          required:true
      },
      section: {
        required:true
      },
      qualification: {
        required: true
      },
      position: {
        required: true
      },
      house: {
        required: true
      },
      vehicle: {
        required: true
      },
      marital: {
        required: true
      },
      date:{
        required:true,
        dateITA:true
      }

    },

    /* Error Messages*/
    messages: 
    {
      empname: {
        pattern:"Error: Name should contain only alphabets."
        //remote: $.validator.format("{0} is already associated with an account.")
      },
      empfather: {
        pattern:"Error: Name should contain only alphabets."
      },
      bps:{
        pattern:"Please enter a value between (0-22)"
      },
     
    },

    errorPlacement: function(error, element) 
    {
      if ( element.attr("name") == "date" ) 
      {
        error.appendTo( element.parents('.khan') );
      }
      else
      {   // This is the default behavior
        error.insertAfter( element );
      }
    }
  
  });

/*-------------------------------------------------------------------------*/

/* Validation for Update Page */
    $("#update-info").validate({
      rules: 
      {
        empname: {
          required: true,
          maxlength:30,
          pattern:/^[a-zA-z ]*$/
        },
        empfather: {
          required: true,
          maxlength:30,
          pattern:/^[a-zA-z ]*$/
        },
        cnic: {
          required: true,
          digits: true,
          minlength:13,
          maxlength:13
        },
        address: {
          required: true,
          maxlength:100
        },
        ntn: {
        maxlength:30,
        pattern:/^[a-zA-z0-9-]*$/
        },
        bps: {
          required: true,
          min: 0,
          max: 22,
          digits: true
        },
        fix: {
          required: true
        },
        accno: {
        required: true,
        maxlength:20,
        pattern:/^[a-zA-z0-9-]*$/
        },
        designation: {
          required: true
        },
        staff: {
          required: true
        },
        qualification: {
          required: true
        },
        position: {
          required: true
        },
        campus:{
          required:true
        },
        department:{
          required:true
        },
        house: {
          required: true
        },
        vehicle: {
          required: true
        },
        marital: {
          required: true
        },
        date:{
          required:true,
          // dateITA:true
        },

        /*Allownces Rules*/
        bpay: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        fpay: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        ppay: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        hreall: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        hresuball: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        conall: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        adhrel: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        compall: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        priall: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        extall: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        senall: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        deaall: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        medall: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        entall: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        deanall: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        integ: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        specadd: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        tech: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        ordall: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        qual: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        othall: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        Brain_Drain: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

        ARA2016: {
          required: true,
          number: true,
          maxlength:10,
          min: 0
        },

      /*Duduction Allownces*/
        House_1: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        House_2: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        elec_1: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        elec_2: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        gasded: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        water1: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        water2: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        endded: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        bfundded: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        HouseBuild: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        convded: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        gpfrded: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        gpfaded: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        eidded: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        ufund1: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        ufund2: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        vehded: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        tvehded: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        upkeepded: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        leavded: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        recovded: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        itexded: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        ginsded: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        },

        oth1ded: {
          required: true,
          number: true,
          maxlength:9,
          min: 0
        }
    
      },

      messages: 
      {
        empname: {
          pattern:"Error: Name should contain only alphabets."
          //remote: $.validator.format("{0} is already associated with an account.")
        },

        empfather: {
          pattern:"Error: Name should contain only alphabets."
        },

        cnic: {},
        address:{},
        ntn:{},
        bps:{},
        fix:{},
        accno:{},
        designation:{},
        staff:{},
        position:{},
        vehicle:{},
        marital:{}
      },

      errorPlacement: function(error, element) 
      {
        if ( element.attr("name") == "date" ) 
        {
          error.appendTo( element.parents('.khan') );
        }
        else
        {   // This is the default behavior
          error.insertAfter( element );
        }
      }
  
    });

/*-------------------------------------------------------------------------*/


/*For Operator Page */
  $.validator.addMethod('strongPassword', function(value, element) {
    return this.optional(element) 
      || value.length >= 6
      && /\d/.test(value)
      && /[a-z]/i.test(value);
  }, 'Your password must be at least 6 characters long and contain at least one number and one char\'.')

  $("#ChangeOP").validate({
    rules:
    {
      newOPusername:{
        required:true,
        nowhitespace: true
      },

      newOPpassword:{
        required:true,
        nowhitespace: true,
        strongPassword: true
      },

      newOPconfpassword:{
        required:true,
        equalTo: '#newOPpassword'
      }
    },
    messages:
    {
    }
  });

  $("#AdminChange").validate({
    rules:
    {
      adminoldpassword:{
        required:true,
        nowhitespace: true
      },

      adminnewpassword:{
        required:true,
        nowhitespace: true,
        strongPassword: true
      },

      adminconfpassword:{
        required:true,
        equalTo: '#adminnewpassword'
      }
    },
    messages:
    {
    }
  });

  $("#AddNewOP").validate({
    rules:
    {
      opusername:{
        required:true,
        nowhitespace: true
      },

      newpassword:{
        required:true,
        nowhitespace: true,
        strongPassword: true
      },

      confpassword:{
        required:true,
        equalTo: '#newpassword'
      }
    },
    messages:
    {
    }
  });

/*-------------------------------------------------------------------------*/

/*For Profile Page*/
  $("#userPasswordForum").validate({
    rules:
    {
      OldPassword:{
        required:true,
        nowhitespace: true
      },

      NewPassword:{
        required:true,
        nowhitespace: true,
        strongPassword: true
      },

      ConfirmPassword:{
        required:true,
        equalTo: '#NewPassword'
      }
    },
    messages:
    {
    }
  });  

/*End of doucument ready*/
});

/*-------------------------------------------------------------------------*/


/*
  $.validator.setDefaults({
    errorClass: 'help-block',
    highlight: function(element) {
      $(element)
        .closest('.form-group')
        .addClass('has-error');
    },
    unhighlight: function(element) {
      $(element)
        .closest('.form-group')
        .removeClass('has-error');
    },
    errorPlacement: function (error, element) {
      if (element.prop('type') === 'checkbox') {
        error.insertAfter(element.parent());
      } else {
        error.insertAfter(element);
      }
    }
  });
*/

/*
  $.validator.addMethod('strongPassword', function(value, element) {
    return this.optional(element) 
      || value.length >= 6
      && /\d/.test(value)
      && /[a-z]/i.test(value);
  }, 'Your password must be at least 6 characters long and contain at least one number and one char\'.')
*/