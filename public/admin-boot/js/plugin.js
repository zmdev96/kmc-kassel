
$(document).ready(function(){
  // Ajax Request To Check if The Username Is Exists In Database
  var userName = $('input[name=username]');
  var userid   = $('input[name=userid]').val();
  var action   = 'usercheck';
  $(userName).blur(function(){
    var username       = userName.val();

    if (username !== '' && username.length > 5) {
      $.ajax({
           url:"/app-admin/users/checkuserexistsajax",
           method:"POST",
           data:{username:username, userid:userid, action:action},
           dataType:"text",
           success:function(data)
           {
             if (data == 1) {
               $('.username-field .errors .success').fadeOut(200);
               $('.username-field .errors .wrong').fadeIn(200);
             }else if (data == 2){
               $('.username-field .errors .wrong').fadeOut(200);
               $('.username-field .errors .success').fadeIn(200);
             }
           }
      });
    }else {
      $('.username-field .errors .wrong').fadeOut(200);
      $('.username-field .errors .success').fadeOut(200);
    }
  });

  // Ajax Request To Check if The Eamil Is Exists In Database
  var userEmail = $('input[name=email]');
  var userid   = $('input[name=userid]').val();
  var action   = 'emailcheck';
  $(userEmail).blur(function(){
    var email       = userEmail.val();

    if (email !== '' && email.length > 5) {
      $.ajax({
           url:"/users/checkemailexistsajax",
           method:"POST",
           data:{email:email, userid:userid, action:action},
           dataType:"text",
           success:function(data)
           {
             if (data == 1) {
               console.log('google')
             }else if (data == 2){
               console.log('facebook')
             }
           }
      });
    }else {
      $('.email-field .errors .wrong').fadeOut(200);
      $('.email-field .errors .success').fadeOut(200);
    }
  });

});

// /*
// * ----------------------------------------------------------------------------------------
// * 01.Email List
// * ----------------------------------------------------------------------------------------
// */
// $(document).ready(function(){
//
//     $('.file-manager .image-content #copy-btn').click(function() {
//         $(this).parent().addClass('active').siblings().removeClass('active');
//         var imgSrc = $('.active img').attr('src');
//         console.log(imgSrc)
//         copyToClipboard(imgSrc);
//     });
//
//
//     function copyToClipboard(value) {
//         var inputCopy = $('.active .myInput');
//         var item =inputCopy.val(value);
//         item.select();
//         document.execCommand('copy');
//     }
// });
/*
* ----------------------------------------------------------------------------------------
* 01.Email List
* ----------------------------------------------------------------------------------------
*/
$(document).ready(function(){
    $('.email .email-list a').click(function(e){
        e.preventDefault();
    });
    $('.email .getMail').click(function() {
      var mailid   = $(this).attr("id");
      var action   = 'onemail';
      $.ajax({
           url:"/app-admin/email/getemaildetails",
           method:"POST",
           data:{mailid:mailid, action:action},
           dataType:"json",
           success:function(data)
           {
             $('.email .email-wrraper #subject').html(data.Subject);
             $('.email .email-wrraper #sendemail').html(data.Senderemail);
             $('.email .email-wrraper #date').html(data.Senddate + ' Uhr');
             $('.email .email-wrraper #emailcontent').html(data.Emailcontent);
             $('.email .email-wrraper #sendemail').attr("href", "mailto:" + data.Senderemail );


           }
      });
    });


});
/*
* ----------------------------------------------------------------------------------------
* 01.Email NOTIFY
* ----------------------------------------------------------------------------------------
*/
$(document).ready(function(){

  load_data();

  function load_data()
  {
   var action = "allinfo";
   $.ajax({
        url:"/app-admin/ajax/getallinfo",
        method:"POST",
        data:{ action:action},
        dataType:"json",
        success:function(data)
        {
          $('.emails #notify-list-ajax').html(data.email_notify);
          $('.emails #badge-unsen').html(data.email_unsen);
          $('.medicines #notify-list-ajax').html(data.order_notify);
          $('.medicines #badge-unsen').html(data.order_unsen);
        }
   });
  }
  setInterval(function(){
    load_data();
  }, 10000);

});
