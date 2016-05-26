<br><br>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function()
{
    $(document).on('submit', '#form-comment', function()
    {
        var name = $('#name').val();
        var email = $('#email').val();
        var text = $('#text').val();
        var postId = $('#add').attr("postid");
        var data = $(this).serialize();

        var errors = [];
        if(name.length < 2) {
            errors.push('Too short name, js');
        }
        if(email.length < 4) {
            errors.push('Too short email, js');
        }
        if(text.length < 2) {
            errors.push('Too short comment, js');
        }
        if (errors.length == 0 ) {
            $.ajax({
                type : 'POST',
                url  : '/comment/add/' + postId,
                data : data,
                success :  function(data)
                {
                    if (data){
                        $('.errors').html(data);
                    } else {
                        $('.errors').empty();
                        $("#comments").append('<h5>' + name + ' ' + '<small>' + email + '</small>' + '</h5>' + '<p>' + text + '</p>');
                    }
                }
            });
        } else {
            errors.forEach(function(error, i, errors) {
                $('.errors').empty();
                $('.errors').append('<p>' + error + '</p>');
            })
        }

        return false;
    });
});
</script>

</body>
</html>
