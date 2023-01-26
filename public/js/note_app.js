$(function() {
    //using the id create_note to validate 
    $("#create_note").validate({
        errorClass: 'text-red-300',
        // rules set for user so they have restrictions when filling out the form to create a new note
        rules: {
            name: {
                required: true,
                minlength: 2 
            }
        },
        // display a message if rules aren't satisfied
        messages: {
            name: "You gotta write more than that dude"
        },
        submitHandler: function(form) {
            form.submit();
        }

    });
});