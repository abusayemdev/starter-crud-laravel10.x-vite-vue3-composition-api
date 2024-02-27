// custom.js


// ibox check
 $(document).ready(function () {
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
});


// Sidebar Menu Active Script
$(function(){
    var current = location.pathname;

    $('ul.metismenu li a').each(function(){
        if($(this).attr('href').indexOf(current) !== -1){
            $(this).closest('li').addClass('active');
        }
    });

    $('ul.metismenu .nav-second-level a').each(function(){
        console.log($(this).attr('href').indexOf(current));
        if($(this).attr('href').indexOf(current) !== -1)  {
            $(this).parent().parent().closest('li').addClass('active');
            $(this).closest('ul').addClass('in');
        }
    });
});


// Cusrtom File Input Select Script
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
}); 


// Delete Data Scripts
$(document).on('click', '.delete', function() {

    let form_id = $(this).data('form-id');

    swal({
        title: "Are you sure?",
        text: "Once deleted, this will be deleted permanently!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $('#'+form_id).submit();
            swal("File has been deleted!", {
            icon: "success",
            });

        } else {
            swal("File is safe!");
        }
    }); 

});


// Active Inactive Scripts
$(function(){
    $("input:checkbox.input_status").change(function() {
        if(this.checked) {
            window.location = this.value;
        }
    });
});

$(function(){
    $("input:checkbox.input_status").change(function() {
        if(this.checked == false) {
            window.location = this.value;
        }
    });
});


// Read input file
function readURL(input)
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image')
            .attr('src', e.target.result)
            .width(80);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Add styles for Arabic language 
$(document).ready(function () {
   
    var currentLang = localStorage.getItem('lang') || 'en';

    if (currentLang === 'ar') {
        $('.nav-label').css('margin-right', '5px');
        $('.label').css('margin-right', '5px');
    }
});


// Add more button and remove button for translation text
$(document).ready(function(){

    var i=0;
    
    $('#add_btn').click(function(){    
        i++;    
        $('#add_text').append('<tr id="row'+i+'" class="dynamic-added"><td><label for="text[]">'+i+'.</label><textarea type="text" id="text[]" v-model="addmore[' + i + '][text]" placeholder="Text" class="form-control name_list" rows="3"/></textarea></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-sm btn-danger btn_remove">Remove</button></td></tr>');    
    });  

    $(document).on('click', '.btn_remove', function(){    
        var button_id = $(this).attr("id");     
        $('#row'+button_id+'').remove();    
    });    

});


// Add styles for Arabic language 
$(document).ready(function () {

    var currentLang = localStorage.getItem('lang');

    if (currentLang === 'ar') {
        $('.ibox-title').css({'padding-right':'1rem'});

    }
});

$(document).ready(function() {
    $('.dataTables-example').DataTable();
});


