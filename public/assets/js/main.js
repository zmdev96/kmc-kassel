/*
* ----------------------------------------------------------------------------------------
* 01. Page Loder
* ----------------------------------------------------------------------------------------
*/

$(window).on("load", function (e) {
  'use strict'
	$("body").css("overflow","auto");
	$(".page-loder").fadeOut(300,
	function(e){

        $(".page-loder").remove();
    });
});

/*
* ----------------------------------------------------------------------------------------
* 02.LI DROPDOWN ACTIVE
* ----------------------------------------------------------------------------------------
*/

	$('ul.nav li.dropdown').hover(function (){
	  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);},
	  function (){
	  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
	});


/*
* ----------------------------------------------------------------------------------------
* 02. Slider Config
* ----------------------------------------------------------------------------------------
*/
$('#demo1').skdslider({
 slideSelector: '.slide',
 delay:7000,
 animationSpeed:2000,
 showNextPrev:true,
 showPlayButton:false,
 autoSlide:true,
 animationType:'fading'
});

/*
* ----------------------------------------------------------------------------------------
* 03. Blog Scroll
* ----------------------------------------------------------------------------------------
*/
$(document).ready(function() {
  $( '#owl-demo' ).owlCarousel({
      items: 3,
      nav: true,
      dots: false,
      mouseDrag: true,
      responsiveClass: true,
      responsive:{
        0:{
            items:1,
            nav:true
        },
        767:{
            items:2,
            nav:true
        },
        1000:{
            items:3,
            nav:true,
            loop:false
        }
    }
  });
});

/*
* ----------------------------------------------------------------------------------------
* 04. Online Medical
* ----------------------------------------------------------------------------------------
*/
$(document).ready(function(){

  //VARIABLES
  var fnameError  = true,
      lnameError  = true,
      emailError  = true,
      insurError  = true,
      medicaError = true,
      dosError    = true,
      pznError    = true,
      birthError = true,
      medicListError   = true;

// Add to medicine-list (medicamentname & dosage or pzn)
  $('.online-medical .form-online-medical .add').click(function(e){
      e.preventDefault();
      if($('.online-medical .form-group .medicamentname ').val().length > 0 && $('.online-medical .form-group .dosage ').val().length > 0 ){
         var medicineName = $('.online-medical .medicamentname').val();
         var medicineDosage = $('.online-medical .dosage').val();
         var medicinePZN = $('.online-medical .pzn').val();
         var medicinepzn = $('.online-medical .pzn').val();

         if(!$('.online-medical .pzn').val()){
           medicinePZN=0;
         }

         $('.online-medical .form-group .medicine-list').append(
           "<div class='medicine-dosage'><input type='checkbox' checked class='listed-input' name='mdlist[]' value='Medikamentenname: "+ medicineName +', Dosierung: '+ medicineDosage +', PZN: '+medicinePZN +"'>"+"<label>Medikamentenname: "+ medicineName +', Dosierung: '+ medicineDosage +', PZN: '+ medicinepzn +"</label></div>"
         );
         // empty the medicament name & dosage input
         $('#mname , #dosageml , #pzn-barcode').val('');
      }

     if($('.online-medical .form-group .medicamentname').val('') || $('.online-medical .form-group .dosage').val('') || $('.online-medical .form-group .pzn').val('')){
        $('.medicamentname-feld .error i.fa-check-circle-o , .dosage-feld .error i.fa-check-circle-o , .pzn-feld .error i.fa-check-circle-o').fadeOut(300);
        $('.online-medical .form-group .medicamentname , .online-medical .form-group .dosage , .online-medical .form-group .pzn').css('border', '1px solid #f7f8fa');
      }

      if (medicaError === true ||dosError === true) {
        $('.medicamentname, .dosage').blur();
      }

      // medicine-list validation
      if($('.online-medical .form-group .medicine-list').find(":checkbox").length){
        $('.medicine-list-div .error i.fa-check-circle-o').fadeIn(300);
        $('.medicine-list-div .error i.fa-exclamation-circle , .online-medical .medicine-list-div .error p').fadeOut(300);
        $('.online-medical .form-group .medicine-list').css('border', '1px solid #080');
      }
  });


  // FIRSTNAME VALIDATE
  $('.online-medical .form-group .firstname').blur(function(){
    var userinput = $('.online-medical .form-group .firstname').val();
    var pattern = /^[a-zA-ZüÜöÖäÄß ]+$/;
      if(!$('.online-medical .form-group .firstname').val()){
          $('.online-medical .firstname-feld .error i.fa-check-circle-o ').fadeOut(300);
          $('.online-medical .firstname-feld .error i.fa-exclamation-circle , .online-medical .firstname-feld .error p').fadeIn(300);
          $('.online-medical .firstname-feld .error p').html(Required);
          $(this).css('border', '1px solid #f00');
          fnameError = true;
      }else if (!pattern.test(userinput)) {
          $('.online-medical .firstname-feld .error i.fa-check-circle-o').fadeOut(300);
          $('.online-medical .firstname-feld .error i.fa-exclamation-circle ,.online-medical .firstname-feld .error p').fadeIn(300);
          $('.online-medical .firstname-feld .error p').html(Alpha);
          $(this).css('border', '1px solid #f00');
          fnameError = true;
      }else if ($(this).val().length < 3 || $(this).val().length > 30) {
          $('.firstname-feld .error i.fa-check-circle-o').fadeOut(300);
          $('.firstname-feld .error i.fa-exclamation-circle , .online-medical .firstname-feld .error p').fadeIn(300);
          $('.online-medical .firstname-feld .error p').html(Between);
          $(this).css('border', '1px solid #f00');
          fnameError = true;
      } else{
          $('.firstname-feld .error i.fa-check-circle-o').fadeIn(300);
          $('.firstname-feld .error i.fa-exclamation-circle , .online-medical .firstname-feld .error p').fadeOut(300);
          $(this).css('border', '1px solid #080');
          fnameError = false;
      }
  });

  // LASTNAME VALIDATE
  $('.online-medical .form-group .lastname ').blur(function(){
    var userinput = $('.online-medical .form-group .lastname').val();
    var pattern = /^[a-zA-ZüÜöÖäÄß ]+$/;
      if(!$('.online-medical .form-group .lastname ').val()){
          $('.online-medical .lastname-feld .error i.fa-check-circle-o ').fadeOut(300);
          $('.online-medical .lastname-feld .error i.fa-exclamation-circle , .online-medical .lastname-feld .error p').fadeIn(300);
          $('.online-medical .lastname-feld .error p').html(Required);
          $(this).css('border', '1px solid #f00');
          lnameError = true;
      }else if (!pattern.test(userinput)) {
          $('.online-medical .lastname-feld .error i.fa-check-circle-o').fadeOut(300);
          $('.online-medical .lastname-feld .error i.fa-exclamation-circle ,.online-medical .lastname-feld .error p').fadeIn(300);
          $('.online-medical .lastname-feld .error p').html(Alpha);
          $(this).css('border', '1px solid #f00');
          lnameError = true;
      }else if ($(this).val().length < 3 || $(this).val().length > 30) {
          $('.lastname-feld .error i.fa-check-circle-o').fadeOut(300);
          $('.lastname-feld .error i.fa-exclamation-circle , .online-medical .lastname-feld .error p').fadeIn(300);
          $('.online-medical .lastname-feld .error p').html(Between);
          $(this).css('border', '1px solid #f00');
          lnameError = true;
      } else{
          $('.lastname-feld .error i.fa-check-circle-o').fadeIn(300);
          $('.lastname-feld .error i.fa-exclamation-circle , .online-medical .lastname-feld .error p').fadeOut(300);
          $(this).css('border', '1px solid #080');
          lnameError = false;
      }
  });

  // EMAIL VALIDATE
  $('.online-medical .form-group .email ').blur(function(){
    var emailinput = $('.online-medical .form-group .email').val();
    var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
      if(!$('.online-medical .form-group .email ').val()){
          $('.online-medical .email-feld .error i.fa-check-circle-o').fadeOut(300);
          $('.online-medical .email-feld .error i.fa-exclamation-circle ,.online-medical .email-feld .error p ').fadeIn(300);
          $('.online-medical .email-feld .error p').html(Required);
          $(this).css('border', '1px solid #f00');
          emailError = true;
      }else if (!pattern.test(emailinput)) {
          $('.email-feld .error i.fa-check-circle-o').fadeOut(300);
          $('.email-feld .error i.fa-exclamation-circle , .online-medical .email-feld .error p').fadeIn(300);
          $('.online-medical .email-feld .error p').html(Email);
          $(this).css('border', '1px solid #f00');
          emailError = true;
      } else{
          $('.email-feld .error i.fa-check-circle-o').fadeIn(300);
          $('.email-feld .error i.fa-exclamation-circle , .online-medical .email-feld .error p').fadeOut(300);
          $(this).css('border', '1px solid #080');
          emailError = false;
      }
  });

  // Birth date VALIDATE
  $('.online-medical .form-group .birth-date ').blur(function(){
    var userinput = $('.online-medical .form-group .birth-date').val();
      if(!$('.online-medical .form-group .birth-date ').val()){
          $('.online-medical .birth-date-feld .error i.fa-check-circle-o').fadeOut(300);
          $('.online-medical .birth-date-feld .error i.fa-exclamation-circle ,.online-medical .birth-date-feld .error p ').fadeIn(300);
          $('.online-medical .birth-date-feld .error p').html(Required);
          $(this).css('border', '1px solid #f00');
          birthError = true;
      }else{
          $('.birth-date-feld .error i.fa-check-circle-o').fadeIn(300);
          $('.birth-date-feld .error i.fa-exclamation-circle , .online-medical .birth-date-feld .error p').fadeOut(300);
          $(this).css('border', '1px solid #080');
          birthError = false;
      }
  });

  // INSURANCE VALIDATE
  $('.online-medical .form-group .insurance ').blur(function(){
    var userinput = $('.online-medical .form-group .insurance').val();
    var pattern = /^[0-9a-zA-ZüÜöÖäÄß]+$/;
      if(!$('.online-medical .form-group .insurance ').val()){
          $('.online-medical .insurance-feld .error i.fa-check-circle-o ').fadeOut(300);
          $('.online-medical .insurance-feld .error i.fa-exclamation-circle , .online-medical .insurance-feld .error p').fadeIn(300);
          $('.online-medical .insurance-feld .error p').html(Required);
          $(this).css('border', '1px solid #f00');
          insurError = true;
      }else if (!pattern.test(userinput)) {
          $('.online-medical .insurance-feld .error i.fa-check-circle-o').fadeOut(300);
          $('.online-medical .insurance-feld .error i.fa-exclamation-circle ,.online-medical .insurance-feld .error p').fadeIn(300);
          $('.online-medical .insurance-feld .error p').html(AlphaNum);
          $(this).css('border', '1px solid #f00');
          insurError = true;
      }else if ($(this).val().length < 7 || $(this).val().length > 15) {
          $('.insurance-feld .error i.fa-check-circle-o').fadeOut(300);
          $('.insurance-feld .error i.fa-exclamation-circle , .online-medical .insurance-feld .error p').fadeIn(300);
          $('.online-medical .insurance-feld .error p').html(Int11);
          $(this).css('border', '1px solid #f00');
          insurError = true;
      } else{
          $('.insurance-feld .error i.fa-check-circle-o').fadeIn(300);
          $('.insurance-feld .error i.fa-exclamation-circle , .online-medical .insurance-feld .error p').fadeOut(300);
          $(this).css('border', '1px solid #080');
          insurError = false;
      }
  });

  // PZN VALIDATE
  $('.online-medical .form-group .pzn ').blur(function(){
    var userinput = $('.online-medical .form-group .pzn').val();
    var pattern = /^[0-9a-zA-Z]+$/;
      if(!$('.online-medical .form-group .pzn ').val()){
          $('.online-medical .pzn-feld .error i.fa-check-circle-o ').fadeOut(300);
          $('.online-medical .pzn-feld .error i.fa-exclamation-circle , .online-medical .pzn-feld .error p').fadeOut(300);
          $('.online-medical .pzn-feld .error p').html('');
          $(this).css('border', 'none')

      }else if (!pattern.test(userinput)) {
          $('.online-medical .pzn-feld .error i.fa-check-circle-o').fadeOut(300);
          $('.online-medical .pzn-feld .error i.fa-exclamation-circle ,.online-medical .pzn-feld .error p').fadeIn(300);
          $('.online-medical .pzn-feld .error p').html(Num);
          $(this).css('border', '1px solid #f00');
          pznError = true;
      }else if ($(this).val().length < 6 || $(this).val().length > 8) {
          $('.pzn-feld .error i.fa-check-circle-o').fadeOut(300);
          $('.pzn-feld .error i.fa-exclamation-circle , .online-medical .pzn-feld .error p').fadeIn(300);
          $('.online-medical .pzn-feld .error p').html(Betweenpzn);
          $(this).css('border', '1px solid #f00');
          pznError = true;
      } else{
          $('.pzn-feld .error i.fa-check-circle-o').fadeIn(300);
          $('.pzn-feld .error i.fa-exclamation-circle , .online-medical .pzn-feld .error p').fadeOut(300);
          $(this).css('border', '1px solid #080');
          pznError = false;
      }
  });


  // MEDICAMENT NAME VALIDATE
  $('.online-medical .form-group .medicamentname ').blur(function(){
    var userinput = $('.online-medical .form-group .medicamentname').val();
    var pattern = /^[a-zA-ZüÜöÖäÄß0-9._%-&, ]+$/;
      if(!$('.online-medical .form-group .medicamentname ').val()){
          $('.online-medical .medicamentname-feld .error i.fa-check-circle-o ').fadeOut(300);
          $('.online-medical .medicamentname-feld .error i.fa-exclamation-circle , .online-medical .medicamentname-feld .error p').fadeIn(300);
          $('.online-medical .medicamentname-feld .error p').html(Required);
          $(this).css('border', '1px solid #f00');
          medicaError = true;
      }else if (!pattern.test(userinput)) {
          $('.online-medical .medicamentname-feld .error i.fa-check-circle-o').fadeOut(300);
          $('.online-medical .medicamentname-feld .error i.fa-exclamation-circle ,.online-medical .medicamentname-feld .error p').fadeIn(300);
          $('.online-medical .medicamentname-feld .error p').html(AlphaNum);
          $(this).css('border', '1px solid #f00');
          medicaError = true;
      }else if ($(this).val().length < 3 || $(this).val().length > 30) {
          $('.medicamentname-feld .error i.fa-check-circle-o').fadeOut(300);
          $('.medicamentname-feld .error i.fa-exclamation-circle , .online-medical .medicamentname-feld .error p').fadeIn(300);
          $('.online-medical .medicamentname-feld .error p').html(Between);
          $(this).css('border', '1px solid #f00');
          medicaError = true;
      } else{
          $('.medicamentname-feld .error i.fa-check-circle-o').fadeIn(300);
          $('.medicamentname-feld .error i.fa-exclamation-circle , .online-medical .medicamentname-feld .error p').fadeOut(300);
          $(this).css('border', '1px solid #080');
          medicaError = false;
      }
  });

  // DOSAGE VALIDATE
  $('.online-medical .form-group .dosage ').blur(function(){
    var userinput = $('.online-medical .form-group .dosage').val();
    var pattern = /^[0-9.-]+$/;
      if(!$('.online-medical .form-group .dosage ').val()){
          $('.online-medical .dosage-feld .error i.fa-check-circle-o ').fadeOut(300);
          $('.online-medical .dosage-feld .error i.fa-exclamation-circle , .online-medical .dosage-feld .error p').fadeIn(300);
          $('.online-medical .dosage-feld .error p').html(Required);
          $(this).css('border', '1px solid #f00');
          dosError = true;
      }else if (!pattern.test(userinput)) {
          $('.online-medical .dosage-feld .error i.fa-check-circle-o').fadeOut(300);
          $('.online-medical .dosage-feld .error i.fa-exclamation-circle ,.online-medical .dosage-feld .error p').fadeIn(300);
          $('.online-medical .dosage-feld .error p').html(Num);
          $(this).css('border', '1px solid #f00');
          dosError = true;
      }else if ($(this).val().length < 1 || $(this).val().length > 10) {
          $('.dosage-feld .error i.fa-check-circle-o').fadeOut(300);
          $('.dosage-feld .error i.fa-exclamation-circle , .online-medical .dosage-feld .error p').fadeIn(300);
          $('.online-medical .dosage-feld .error p').html(Betweendos);
          $(this).css('border', '1px solid #f00');
          dosError = true;
      } else{
          $('.dosage-feld .error i.fa-check-circle-o').fadeIn(300);
          $('.dosage-feld .error i.fa-exclamation-circle , .online-medical .dosage-feld .error p').fadeOut(300);
          $(this).css('border', '1px solid #080');
          dosError = false;
      }
  });


  // SUBMIT FORM VALIDATIONS
  $('.form-online-medical').submit(function (e) {
    if (fnameError === true || lnameError === true || emailError === true || insurError === true || medicaError === true || dosError === true || birthError === true ) {
      e.preventDefault();
      $('.firstname, .lastname , .email , .insurance , .birth-date').blur();
    }
      // Medicine list Validations
    if(!$('.online-medical .form-group .medicine-list').find(":checkbox").length){
        $('.online-medical .medicine-list-div .error i.fa-check-circle-o ').fadeOut(300);
        $('.online-medical .medicine-list-div .error i.fa-exclamation-circle , .online-medical .medicine-list-div .error p').fadeIn(300);
        $('.online-medical .medicine-list-div .error p').html('Medicine List is empty');
        $('.online-medical .form-group .medicine-list').css('border', '1px solid #f00');
    }else if (!$('.online-medical .form-group .medicine-list').find("input:checked").length) {
        $('.medicine-list-div .error i.fa-check-circle-o').fadeOut(300);
        $('.medicine-list-div .error i.fa-exclamation-circle , .online-medical .medicine-list-div .error p').fadeIn(300);
        $('.online-medical .medicine-list-div .error p').html('check min 1 in medicine list');
        $('.online-medical .form-group .medicine-list').css('border', '1px solid #f00');
    } else{
        $('.medicine-list-div .error i.fa-check-circle-o').fadeIn(300);
        $('.medicine-list-div .error i.fa-exclamation-circle , .online-medical .medicine-list-div .error p').fadeOut(300);
        $('.online-medical .form-group .medicine-list').css('border', '1px solid #080');
    }

  })

});

/*
* ----------------------------------------------------------------------------------------
* 05. CONTACT FOEM VALIIDATE
* ----------------------------------------------------------------------------------------
*/

$(document).ready(function(){
  'use strict'
    //VARIABLES
    var userError   = true,
        emailError  = true,
        subError  = true,
        msgError    = true;
    // ERROR MESSAGE TRANSLATE

    // USERNAME VALIDATE
    $('.contact .form-group .username ').blur(function(){
      var userinput = $('.contact .form-group .username').val();
      var pattern = /^[a-zA-ZüÜöÖäÄß ]+$/;
        if(!$('.contact .form-group .username ').val()){
            $('.contact .username-feld .error i.fa-check-circle-o ').fadeOut(300);
            $('.contact .username-feld .error i.fa-exclamation-circle , .contact .username-feld .error p').fadeIn(300);
            $('.contact .username-feld .error p').html(Required);
            $(this).css('border', '1px solid #f00');

            userError = true;

        }else if (!pattern.test(userinput)) {
            $('.contact .username-feld .error i.fa-check-circle-o').fadeOut(300);
            $('.contact .username-feld .error i.fa-exclamation-circle ,.contact .username-feld .error p').fadeIn(300);
            $('.contact .username-feld .error p').html(Alpha);
            $(this).css('border', '1px solid #f00');
            userError = true;
        }else if ($(this).val().length < 4 || $(this).val().length > 30) {
            $('.username-feld .error i.fa-check-circle-o').fadeOut(300);
            $('.username-feld .error i.fa-exclamation-circle , .contact .username-feld .error p').fadeIn(300);
            $('.contact .username-feld .error p').html(Between);
            $(this).css('border', '1px solid #f00');
            userError = true;
        } else{
            $('.username-feld .error i.fa-check-circle-o').fadeIn(300);
            $('.username-feld .error i.fa-exclamation-circle , .contact .username-feld .error p').fadeOut(300);
            $(this).css('border', '1px solid #080');
            userError = false;
        }
    });
    // EMAIL VALIDATE
    $('.contact .form-group .email ').blur(function(){
      var emailinput = $('.contact .form-group .email').val();
      var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        if(!$('.contact .form-group .email ').val()){
            $('.contact .email-feld .error i.fa-check-circle-o').fadeOut(300);
            $('.contact .email-feld .error i.fa-exclamation-circle ,.contact .email-feld .error p ').fadeIn(300);
            $('.contact .email-feld .error p').html(Required);
            $(this).css('border', '1px solid #f00');
            $(this).css('background-color', '#fff');
            emailError = true;
        }else if (!pattern.test(emailinput)) {
            $('.email-feld .error i.fa-check-circle-o').fadeOut(300);
            $('.email-feld .error i.fa-exclamation-circle , .contact .email-feld .error p').fadeIn(300);
            $('.contact .email-feld .error p').html(Email);
            $(this).css('border', '1px solid #f00');
            emailError = true;
        } else{
            $('.email-feld .error i.fa-check-circle-o').fadeIn(300);
            $('.email-feld .error i.fa-exclamation-circle , .contact .email-feld .error p').fadeOut(300);
            $(this).css('border', '1px solid #080');
            emailError = false;
        }
    });
    // SUBJECT VALIDATE
    $('.contact .form-group .subject ').blur(function(){
      var userinput = $('.contact .form-group .subject').val();
      var pattern = /^[a-zA-ZüÜöÖäÄß1-9 ]+$/;
        if(!$('.contact .form-group .subject ').val()){
            $('.contact .subject-feld .error i.fa-check-circle-o ').fadeOut(300);
            $('.contact .subject-feld .error i.fa-exclamation-circle , .contact .subject-feld .error p').fadeIn(300);
            $('.contact .subject-feld .error p').html(Required);
            $(this).css('border', '1px solid #f00');

            subError = true;

        }else if (!pattern.test(userinput)) {
            $('.contact .subject-feld .error i.fa-check-circle-o').fadeOut(300);
            $('.contact .subject-feld .error i.fa-exclamation-circle ,.contact .subject-feld .error p').fadeIn(300);
            $('.contact .subject-feld .error p').html(AlphaNum);
            $(this).css('border', '1px solid #f00');
            subError = true;
        }else if ($(this).val().length < 4 || $(this).val().length > 30) {
            $('.subject-feld .error i.fa-check-circle-o').fadeOut(300);
            $('.subject-feld .error i.fa-exclamation-circle , .contact .subject-feld .error p').fadeIn(300);
            $('.contact .subject-feld .error p').html(Between);
            $(this).css('border', '1px solid #f00');
            subError = true;
        } else{
            $('.subject-feld .error i.fa-check-circle-o').fadeIn(300);
            $('.subject-feld .error i.fa-exclamation-circle , .contact .subject-feld .error p').fadeOut(300);
            $(this).css('border', '1px solid #080');
            subError = false;
        }
    });
    // MESSAGE VALIDATE
    $('.contact .form-group .message ').blur(function(){
      var userinput = $('.contact .form-group .message').val();
      var pattern = /^[a-zA-ZüÜöÖäÄß1-9 ]+$/;
        if(!$('.contact .form-group .message ').val()){
            $('.contact .message-feld .error i.fa-check-circle-o ').fadeOut(300);
            $('.contact .message-feld .error i.fa-exclamation-circle , .contact .message-feld .error p').fadeIn(300);
            $('.contact .message-feld .error p').html(Required);
            $(this).css('border', '1px solid #f00');
            msgError = true;
        }else if (!pattern.test(userinput)) {
            $('.contact .message-feld .error i.fa-check-circle-o').fadeOut(300);
            $('.contact .message-feld .error i.fa-exclamation-circle ,.contact .message-feld .error p').fadeIn(300);
            $('.contact .message-feld .error p').html(AlphaNum);
            $(this).css('border', '1px solid #f00');
            userError = true;
        }else if ($(this).val().length < 30 || $(this).val().length > 300) {
            $('.message-feld .error i.fa-check-circle-o').fadeOut(300);
            $('.message-feld .error i.fa-exclamation-circle , .contact .message-feld .error p').fadeIn(300);
            $('.contact .message-feld .error p').html(Betweenm);
            $(this).css('border', '1px solid #f00');
            msgError = true;
        } else{
            $('.message-feld .error i.fa-check-circle-o').fadeIn(300);
            $('.message-feld .error i.fa-exclamation-circle , .contact .message-feld .error p').fadeOut(300);
            $(this).css('border', '1px solid #080');
            msgError = false;
        }
    });

    // SUBMIT FORM VALIDATIONS
    $('.contact').submit(function (e) {
      if (userError === true || emailError === true || subError === true || msgError === true ) {
        e.preventDefault();
        $('.username , .email , .subject , .message').blur();
      }
    })
});


// Add Asterisk On Required Field

$(document).ready(function(){
/*
  $('input').each(function () {
		if ($(this).attr('required') === 'required') {
			$(this).after('<span class="asterisk">*</span>');
		}
	});
*/
  /*$('.contact ').validate({
    errorPlacement: function(error,element) {
      return true;
    }
  });*/

});






$(document).ready(function(){
  $('#form_content').submit(function(event){
    event.preventDefault();
    var form_data = $(this).serialize();
    $.ajax({
         url:"https://www.munir-lebensmittel.de/mail/sendemail.php",
         method:"POST",
         data:form_data,
         success:function(data)
         {
           console.log(data);
         }
    });

  });


});
