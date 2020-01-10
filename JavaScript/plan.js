
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

