
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


