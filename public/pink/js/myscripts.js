jQuery(document).ready(function ($) {
   $('#commentform').on('click','#submit',function (event) {

       event.preventDefault();
       var comParrent = $(this);

       $('.wrap_result').
                    css('color','green').
                    text('Comment Save').
                    fadeIn(500,function () {
                        var data = $('#commentform').serializeArray();
                        $.ajax({
                            url:$('#commentform').attr('action'),
                            data:data,
                            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            type:'POST',
                            dataType:'JSON',
                            success:function (html) {
                                console.log(html.error);
                                console.log(html.success);

                                        if(html.error){
                                            $('.wrap_result').css('color','red').append('</br><strong>Savved error</strong></br>'+html.error.join('<br>'));
                                            $('.wrap_result').delay(2000).fadeOut(500);
                                        }

                                        if(html.success){
                                            $('.wrap_result').append('</br><strong>Saved</strong>')
                                                .delay(2000)
                                                .fadeOut(5000,function () {
                                                    $('#respond').append(html.comment);
                                                })

                                        }



                            },
                            error:function () {
                                $('.wrap_result').css('color','red').append('</br><strong>Savved error</strong>');
                                $('.wrap_result').delay(1000).fadeOut(100);

                            }
                        });

                    });

   });
});
