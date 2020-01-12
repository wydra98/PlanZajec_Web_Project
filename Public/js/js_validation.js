
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
    var plan = document.forms['confirm']['id'].value;
    if (plan.length==0) {
     $("#messages").html('Nie masz żadnego planu!');
     return false;
   }
    return true;
  }


  function newLessonValidation(){
    var lessonName = document.forms['newLesson']['lessonName'].value;
    var startHour = (document.forms['newLesson']['startHour'].value);
    var startMinute = (document.forms['newLesson']['startMinute'].value);
    var endHour = (document.forms['newLesson']['endHour'].value);
    var endMinute  = (document.forms['newLesson']['endMinute'].value);
   
    if (lessonName.length==0 || startHour.length==0 || startMinute.length==0 || endHour.length==0 || endMinute .length==0) {
     $("#choiceMesagges").html('Uzupełnij wszystkie dane!');
     return false;
    }

    if (lessonName.length>15) {
     $("#choiceMesagges").html('Nazwa lekcji nie może zawierać więcej niż 15 znaków!');
     return false;
    }

    if (startHour.length>2 || startMinute.length>2 || endHour.length>2 || endMinute .length>2) {
      $("#choiceMesagges").html('Nie poprawna ilość znaków w czasie!');
      return false;
    }

    if (isNaN(startHour) || isNaN(startMinute) || isNaN(endHour) || isNaN(endMinute)) {
      $("#choiceMesagges").html('Godziny i minuty muszą być liczbami!');
      return false;
    }

    var startHour = parseInt(document.forms['newLesson']['startHour'].value);
    var startMinute = parseInt(document.forms['newLesson']['startMinute'].value);
    var endHour = parseInt(document.forms['newLesson']['endHour'].value);
    var endMinute  = parseInt(document.forms['newLesson']['endMinute'].value);

    if (startHour<0 || startHour>23 || endHour<0 || endHour>23) {
      $("#choiceMesagges").html('Niepoprawna godzina!');
      return false;
    }

    if (startMinute<0 || startMinute>60 || endMinute<0  || endMinute>60) {
      $("#choiceMesagges").html('Niepoprawna minuta!');
      return false;
    }

    if(!checkTime(startHour,startMinute,endHour,endMinute)){
      $("#choiceMesagges").html('Czas rozpoczęcia musi być mniejszy bądź równy czasu zakończenia!');
      return false;
    }

    return true;
  }

  function checkTime(startHour,startMinute,endHour,endMinute){
    flag = true;
    start_time = (startHour)*60 + startMinute;
    end_time = (endHour)*60 + endMinute;
    if(end_time<=start_time) flag = false;
    return flag;
  }
