$(function() {
  
    // Setup form validation on the #register-form element
    $("#reg-form").validate({
    
        // Specify the validation rules
        rules: {

        	teamname : {
        		required: true,
        		maxlength: 20,
        		minlength: 3,
        	},
        	strength : {
        		required: true,
        	},

        	name1: {
        		required: true,
        		maxlength: 50,
        	},
        	contact1 : {
    			required: true,
			    minlength: 10,
				maxlength: 10,
				number:true,        		
        	},
        	email1:{
        		required: true,
                email: true
            },
            college1 : {
            	required: true,
            	maxlength: 50,
            },

            name2: {
        		maxlength: 50,
        	},
        	contact2 : {
				minlength: 10,
				maxlength: 10,
				number:true,
        	},
        	email2:{
                email: true
            },
            college2 : {
            	
            	maxlength: 50,
            },


            name3: {
        		maxlength: 50,
        	},
        	contact3 : {
				minlength: 10,
				maxlength: 10,
				number:true,
        	},
        	email3:{
                email: true
            },
            college3 : {
            	
            	maxlength: 50,
            },

            name4: {
        		maxlength: 50,
        	},
        	contact4 : {

				minlength: 10,
				maxlength: 10,
				number:true,
			},
        	email4:{
                email: true
            },
            college4 : {
            	
            	maxlength: 50,
            },
            eventselect : {
                required :true
            }
        },
        
        // Specify the validation error messages
        messages: {
            eventselect : {
                required : "ATLEAST ONE TO BE SELECTED"
            },
        	teamname : {
        		required: "This field is required",
        		maxlength: "Maximum 20 characters allowed"  ,
        		minlength: "Should be atleast 3 characters long",
        	},
        	strength : {
        		required: "This field is required",
        	},
        	name1: {   
        		required: "This field is required",     		
        		maxlength: "Maximum 50 characters allowed",
        	},
        	contact1 : {
    			required: "This field is required",
			    minlength: "Should be of 10 DIGITS",
				maxlength: "Should be of 10 DIGITS only",
				number: "Should contain only Digits",        		
        	},
        	email1:{  
        		required: "This field is required",      		
                email: "Please enter a valid email address",
            },
            college1 : {
            	required: "This field is required",
            	maxlength: "Maximum 50 characters allowed",
            },

            name2: {        		
        		maxlength: "Maximum 50 characters allowed",
        	},
        	contact2 : {
        			
			    minlength: "Should be of 10 DIGITS",
				maxlength: "Should be of 10 DIGITS only",
				number: "Should contain only Digits",       		
        	},
        	email2:{        		
                email: "Please enter a valid email address",
            },
            college3 : {
            	maxlength: "Maximum 50 characters allowed",
            },


            name3: {        		
        		maxlength: "Maximum 50 characters allowed",
        	},
        	contact3: {
        			
				minlength: "Should be of 10 DIGITS",
				maxlength: "Should be of 10 DIGITS only",
				number: "Should contain only Digits",        		
        	},
        	email3:{        		
                email: "Please enter a valid email address",
            },
            college3: {
            	maxlength: "Maximum 50 characters allowed",
            },


            name4: {        		
        		maxlength: "Maximum 50 characters allowed",
        	},
        	contact4: {
        			
				minlength: "Should be of 10 DIGITS",
				maxlength: "Should be of 10 DIGITS only",
				number: "Should contain only Digits",       		
        	},
        	email4:{        		
                email: "Please enter a valid email address",
            },
            college4 : {
            	maxlength: "Maximum 50 characters allowed",
            }
            
        },
        errorPlacement: function (error, element) {
           element.parent().next(".errorTxt").append(error);
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});

