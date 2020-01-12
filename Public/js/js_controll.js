
function hideLesson(lessonId)
{
    $('#'+lessonId).css('display', 'none');

    apiUrl = 'http://localhost';

    $.ajax({
        method : "POST",
        url : apiUrl + '/?page=removeLesson',
        data : { 
            lessonId : lessonId,
        },
        success:function() {
            console.log("called");
        }
   });
   
}
function mouseOver(id) {
    $('#'+id).children('.text').html('Usunąć?');
    $('#'+id).children('.text').css('margin-top','20px');
    $('#'+id).children('.text').css('color','red');
    $('#'+id).children('.text').css('font-weight','bold');
    $('#'+id).css('background-color', 'white');
    $('#'+id).css('border', '3px solid red');
  }
  
function mouseOut(id,color,borderColor,name,startHour,startMinute,endHour,endMinute) {
    $('#'+id).children('.text').html('<label>'+name+'</label><label>'+startHour+':'+startMinute+'-'+endHour+':'+endMinute+'</label>');
    $('#'+id).children('.text').css('font-weight','normal');
    $('#'+id).children('.text').css('margin-top','11px');
    $('#'+id).children('.text').css('color','white');
    $('#'+id).css('background-color', color);
    $('#'+id).css('border', '3px solid ' + borderColor);
   
  }
  

  function loginValidation(){
    var name = document.forms['login']['emailNick'].value;
    var password = document.forms['login']['password'].value;
   
    if (name.length==0 || password.length==0) {
      $(".messages").html('Uzupełnij wszystkie dane!');
      return false;
    }
    return true;
  }

  function registrationValidation(){
    var email = document.forms['registration']['email'].value;
    var nick = document.forms['registration']['nick'].value;
    var password1 = document.forms['registration']['password1'].value;
    var password2 = document.forms['registration']['password2'].value;

   
    if (email.length==0 || nick.length==0 || password1.length==0 || password2.length==0) {
     $("#registrationMessages").html('Uzupełnij wszystkie dane!');
     return false;
   }
 
    if (nick.length<3 || nick.length>15) {
      $("#registrationMessages").html('Nick musi posiadać od 3 do 15 znaków!');
      return false;
    }

    if(password1.length<6 || password1.length>15){
      $("#registrationMessages").html('Hasło musi posiadać od 6 do 15 znaków!');
      return  false;
    }

    if(password1 != password2){
      $("#registrationMessages").html('Podane hasła są różne!');
      return false;
    }

    return true;
  }

  function newNamePlanValidation(){
    var name = document.forms['newPlan']['namePlan'].value;
   
    if (name.length==0) {
     $("#messages").html('Podaj nazwę planu!');
     return false;
   }
 
    if (name.length<1 || name.length>15) {
     $("#messages").html('Nazwa planu musi posiadać od 1 do 15 znaków!');
    return false;
    }

    return true;
  }

  function newShareNamePlanValidation(){
    var code = document.forms['newSharePlan']['code'].value;
    var name = document.forms['newSharePlan']['newPlanName'].value;
   
    if (name.length==0 || code.length==0) {
     $("#messages").html('Uzupełnij dane!');
     return false;
   }
 
    if (name.length<1 || name.length>15) {
      $("#messages").html('Nazwa planu musi posiadać od 1 do 15 znaków!');
      return false;
    }

    if (code.length!=13) {
      $("#messages").html('Podany kod jest niepoprawny!');
      return false;
    }

    return true;
  }

  
  function confirmPlanValidation(){
    var plan = document.forms['confirm']['option'].value;
   alert(plan);
    if (plan.length==0) {
     $("#messages").html('Nie masz żadnego planu!');
     return false;
   }
 
    return true;
  }


  function newLessonValidation(){
    var email = document.forms['registration']['email'].value;
    var nick = document.forms['registration']['nick'].value;
    var password1 = document.forms['registration']['password1'].value;
    var password2 = document.forms['registration']['password2'].value;

   
    if (email.length==0 || nick.length==0 || password1.length==0 || password2.length==0) {
     $("#registrationMessages").html('Uzupełnij wszystkie dane!');
     return false;
   }
 
    if (nick.length<3 || nick.length>15) {
      $("#registrationMessages").html('Nick musi posiadać od 3 do 15 znaków!');
      return false;
    }

    if(password1.length<6 || password1.length>15){
      $("#registrationMessages").html('Hasło musi posiadać od 6 do 15 znaków!');
      return  false;
    }

    if(password1 != password2){
      $("#registrationMessages").html('Podane hasła są różne!');
      return false;
    }

    return true;
  }



  $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});