$(document).ready(function(){
    $("#button").click(function(){
        $.ajax({
            url:'submit_form.php',
            method:'POST',
            data:{
                name:name,
                student_id:student_id,
                email:email,
                phone:phone,
                dob:dob,
                gender:gender,
                address:address,
                note:note
            },
           success:function(data){
               alert(data);
           }
        });
    });
});
