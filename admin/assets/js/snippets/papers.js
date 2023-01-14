$(document).ready(function() {

});

function SubmitQuestion(obj, nextPagelink) {
    var form = obj.closest('form');
    var a = $(form).serialize();
    //console.log(a);
    var option = $(obj).data('option');
    //console.log($(obj).data('option'));
    //alert();
    $.ajax({
        url: 'ajax/paper.php',
        data: a + '&option=' + option + '&submitQuestion=true',
        method: "POST",
        success: function(e) {
            console.log(e);
            if (e != '') {
                alert(e);
            } else {
                if ($(obj).data('option') == $(form).find('[name="correct_answer"]').val()) {
                    //alert("correct");
                    $(obj).css({ 'background': 'green' });
                } else {
                    $(obj).css({ 'background': 'red' });
                }

                setTimeout(function() {
                    window.location.href = nextPagelink;
                }, 100);

            }
        }


    });
}