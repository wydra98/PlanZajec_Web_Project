
function printDay(day)

{
    if($_SESSION['lessons'].length>0){   
        flag = false; 
        for (lesson of $_SESSION['lessons'])
        {
            if(lesson.getDay() == '"' + day + '"' + dayToComapre + '"' && lesson.getWeekNumber() == $_SESSION['weekNumber'])
            {
                result = '<div class="button" style="background-color:'+ lesson.getColor()+ 
                '; border: 3px solid ' + lesson.getBorderColor()+ '">' +
                '<label class="labelnames">'+ lesson.getName()+'</label>'+
                '<label class="labelhours">'+ $lesson.getStartHour()+ ':'+ lesson.getStartMinute()+ '-'+ lesson.getEndHour()+':'+ lesson.getEndMinute()+'</label></div>';
                flag = true;
            }
        }
        if($flag != true)
            result = '<label class="labelempty">Brak lekcji!</label>';
    }  
    else result = '<label class="labelempty">Brak lekcji!</label>';

    result = result + '</div>';
    document.write(result);
}

