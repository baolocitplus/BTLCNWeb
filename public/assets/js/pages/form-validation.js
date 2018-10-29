$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 20), '+', randomNumber(1, 30), '='].join(' '));
	

	//EXAMPLE REGISTER FORM
    $('#createtour').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Tên tour không được để trống'
                    }
                }
            },


        }
    });

	
});