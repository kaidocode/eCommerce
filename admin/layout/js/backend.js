$(function(){
    'use strict';

    $('[placeholder]').focus(function () {
        $(this).attr('data-text',$(this).attr('placeholder'));
        $(this).attr('placeholder','');
    }).blur(function () {
        $(this).attr('placeholder', $(this).attr('data-text'));
    })

    // Add Astresk required filed
    $('input').each(function () {
      if ($(this).attr('required') === 'required') {
          $(this).after('<span class="astrisk">*</span>');
      }
    });

    // Convert Password filed To Text filed
    var  passFiled = $('.password');
     $('.show-pass').hover(function () {
          passFiled.attr('type','text');
     },function () {
          passFiled.attr('type','password');
     });

     // Confermition Button On Click
     $('.confirm').click(function () {
        return confirm('Are You Sure?');
     });
});
