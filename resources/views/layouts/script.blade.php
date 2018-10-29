<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('assets/libs/jquery/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/libs/jqueryui/jquery-ui-1.10.4.custom.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-detectmobile/detect.js')}}"></script>
<script src="{{asset('assets/libs/jquery-animate-numbers/jquery.animateNumbers.js')}}"></script>
<script src="{{asset('assets/libs/ios7-switch/ios7.switch.js')}}"></script>
<script src="{{asset('assets/libs/fastclick/fastclick.js')}}"></script>
<script src="{{asset('assets/libs/jquery-blockui/jquery.blockUI.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-bootbox/bootbox.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/libs/jquery-sparkline/jquery-sparkline.js')}}"></script>
<script src="{{asset('assets/libs/nifty-modal/js/classie.js')}}"></script>
<script src="{{asset('assets/libs/nifty-modal/js/modalEffects.js')}}"></script>
<script src="{{asset('assets/libs/sortable/sortable.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-fileinput/bootstrap.file-input.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-select2/select2.min.js')}}"></script>
<script src="{{asset('assets/libs/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/libs/pace/pace.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/libs/jquery-icheck/icheck.min.js')}}"></script>

<!-- Demo Specific JS Libraries -->
<script src="{{asset('assets/libs/prettify/prettify.js')}}"></script>

<script src="{{asset('assets/js/init.js')}}"></script>
<script src="{{asset('assets/libs/dist/dropzone.js')}}"></script>

<script src="{{asset('assets/libs/bootstrap-validator/js/bootstrapValidator.min.js')}}"></script>
<script src="{{asset('assets/js/pages/form-validation.js')}}"></script>

<script type="text/javascript">

    Dropzone.options.myDropzone = {
        autoProcessQueue: false,
        url: 'create/uploadImg',
        headers: {
            'X-CSRF-TOKEN': '{!! csrf_token() !!}'
        },
         // this is important as you dont want form to be submitted unless you have clicked the submit button
        autoDiscover: false,
        uploadMultiple: true,
        parallelUploads: 5,
        maxFiles: 50,
        maxFilesize: 10,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        dictFileTooBig: 'Image is bigger than 10MB',
        addRemoveLinks: true,
        removedfile: function (file) {
            var name = file.name;
            name = name.replace(/\s+/g, '-').toLowerCase();
            /*only spaces*/
            $.ajax({
                type: 'POST',
                // url: '{{ url('admincp/deleteImg') }}',
                headers: {
                    'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                },
                data: "id=" + name,
                dataType: 'html',
                success: function (data) {
                    $("#msg").html(data);
                }
            });
            var _ref;
            if (file.previewElement) {
                if ((_ref = file.previewElement) != null) {
                    _ref.parentNode.removeChild(file.previewElement);
                }
            }
            return this._updateMaxFilesReachedClass();
        },
        previewsContainer: null,
        hiddenInputContainer: "body",

        accept: function (file, done) {
            console.log("uploaded");
            done();
        },

        error: function (file, msg) {
            alert(msg);
        },
        init: function () {
            var myDropzone = this;
            //now we will submit the form when the button is clicked
            $("#sbmtbtn").on('click', function checkabc(e) {
            	
            	function checkValidate() {
            		var flag = true;
            		if(document.getElementById('tourname').value == "") {
            			$("#errorTourName").html("Chưa nhập tên tour"); 
            			flag = false;
            		}
            		else
            			$("#errorTourName").empty();

            		if(document.getElementById('vehicle').value == "") {
            			$("#errorVehicle").html("Chưa nhập phương tiện di chuyển");
            			flag = false; 
            		}
            		else
            			$("#errorVehicle").empty(); 

            		if(document.getElementById('startlocal').value == "") {
            			$("#errorStartLocal").html("Chưa nhập nơi bắt đầu"); 
            			flag = false;
            		}
            		else
            			$("#errorStartLocal").empty();   

            		if(document.getElementById('endlocal').value == "") {
            			$("#errorEndLocal").html("Chưa nhập nơi đến");
            			flag = false; 
            		}
            		else
            			$("#errorEndLocal").empty(); 

            		if(document.getElementById('overview').value == "") {
            			$("#errorOverView").html("Chưa nhập giới thiệu");
            			flag = false; 
            		}
            		else
            			$("#errorOverView").empty();  

            		if(document.getElementById('policy').value == "") {
            			$("#errorPolicy").html("Chưa nhập phương chính sách");
            			flag = false; 
            		}
            		else
            			$("#errorPolicy").empty();  

            		if(document.getElementById('short_description').value == "") {
            			$("#errorShortDescription").html("Chưa nhập mô tả ngắn");
            			flag = false; 
            		}
            		else
            			$("#errorShortDescription").empty();  

            		if(document.getElementById('number').value == "") {
            			$("#errorNumber").html("Chưa nhập số người");
            			flag = false; 
            		}
            		else
            			$("#errorNumber").empty(); 

            		if (!myDropzone.getQueuedFiles().length > 0) {
            			$("#errorFileInput").html("Chưa nhập Hình Ảnh");
            			flag = false; 
            		} 
            		else
            			$("#errorFileInput").empty(); 

        			return flag;
				}
                if (checkValidate()==true) {
                	$("#createtour1").submit();
                	myDropzone.processQueue();
                	return true;
            	}
            	else{ 
            			
            	 		return false;
            	 	}
            });
         	

                // setTimeout(function(){ location.href= "{{route('listTour')}}"}, 2500);
            
            this.on("sendingmultiple", function (data, xhr, formData) {


                formData.append("name", jQuery("#name").val());
                formData.append("vehicle", jQuery("#vehicle").val());
                formData.append("short_description", jQuery("#short_description").val());
                formData.append("startlocal", jQuery("#startlocal").val());
                formData.append("endlocal", jQuery("#endlocal").val());
                formData.append("overview", jQuery("#overview").val());
                formData.append("policy", jQuery("#policy").val());
                formData.append("number", jQuery("#number").val());
                formData.append("adultprice", jQuery("#adultprice").val());
                formData.append("childprice", jQuery("#childprice").val());

                var textinputs1 = document.querySelectorAll('input[name*=timestart]');
                for (var i = 0; i < textinputs1.length; i++)
                    formData.append(timestart[i], textinputs1[i].value);

                var textinputs2 = document.querySelectorAll('input[name*=timeend]');
                for (var i = 0; i < textinputs2.length; i++)
                    formData.append(timeend[i], textinputs2[i].value);


                var textinputs3 = document.querySelectorAll('input[name*=hourstart]');
                for (var i = 0; i < textinputs3.length; i++)
                    formData.append(hourstart[i], textinputs3[i].value);

                var textinputs4 = document.querySelectorAll('input[name*=adultprice]');
                for (var i = 0; i < textinputs4.length; i++)
                    formData.append(adultprice[i], textinputs4[i].value);

                var textinputs5 = document.querySelectorAll('input[name*=childprice]');
                for (var i = 0; i < textinputs5.length; i++)
                    formData.append(childprice[i], textinputs5[i].value);

            });

 	},       
}
        // init end
</script>

<script>
    $(document).ready(function () {
        var i = 1;
        $('#add').click(function () {
            i++;
            $('#dynamic_field').append('<tr id="multischedule' + i + '"><td><input type="date" name="timestart[]" id="timestart" placeholder="Nhập ngày khởi hành" class="form-control dpd3"/></td><td><input type="date" name="timeend[]" id="timeend" placeholder="Nhập ngày kết thúc" class="form-control dpd3"/></td><td><input type="time" name="hourstart[]" placeholder="Nhập giờ bắt đầu" class="form-control dpd3"/></td><td><input type="number" id="adultprice" name="adultprice[]" placeholder="Nhập giá người lớn" class="form-control dpd3"/></td><td><input type="number" id="childprice" name="childprice[]" placeholder="Nhập giá trẻ em" class="form-control dpd3"/></td><td><button type="button" name="remove" id="' + i + '" class="btn-danger btn_remove" style="padding: 5px; width:50%;">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#multischedule' + button_id + '').remove();
        });
    });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
<script type="text/javascript">
    $(".chosen").chosen();
</script>

<script type="text/javascript">
    function update_staff(staff_id,sche_id){
    	var staff_id = staff_id;
        var sche_id=sche_id;
        $.ajax({
            url: "schedule/"+sche_id+"/changestaff/"+staff_id,
            type: "GET",

            success: function(data){
                location.reload();
            }
        });
    }
</script>

<style>
    .dropzone {
        border: 2px dashed #0087F7;
        border-radius: 5px;
        background: white;
    }

    .contentError{
     		color: red;
    }
</style>