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
                                        if(html.success){
                                            console.log('done');
                                            $('.wrap_result').append('</br><strong>Saved</strong>')
                                                .delay(2000)
                                                .fadeOut(5000,function () {
                                                    $('#respond').append(html.comment);
                                                })

                                        }



                            },
                            error:function () {
                                console.log('error');

                            }
                        });

                    });

   });
});