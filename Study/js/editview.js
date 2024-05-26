$(document).ready(function () {

    $("#btnAddRow").on("click", function () {
        var count_row = parseInt($('#count_row').val());
        $('#last_row').before(insertRow(count_row + 1));
        SetCountSTT();
    });
});

function insertRow(count) {

    $('#count_row').val(count);
    var html = '';
    html += '<tr id="ct_line_' + count + '" >';
    html += '<td class="stt" style="text-align:center;" id="stt' + count + '">' + count + '</td>';
    html += '<td style="text-align:center;"><input placeholder="Tìm học sinh" type="text" name="student_name[]" class="student_name" id="student_name_'+ count +'" value="" data-positon="'+ count +'" oninput="SearchStudent('+ count +')">';          
    html += '</td>';
    html += '<td style="text-align:center;"><input type="number" step="0.01" name="point_answer[]"></td>';
    html += '<td style="text-align:center;"><input type="number" step="0.01" name="point_15[]"></td>';
    html += '<td style="text-align:center;"><input type="number" step="0.01" name="point_45[]"></td>';
    html += '<td style="text-align:center;"><input type="number" step="0.01" name="point_exam[]"></td>';
    html += '<td style="text-align:center;"><input type="hidden" name="point_id[]" id="point_id_' + count + '"></td>';
    html += '<td><input type="hidden" name="student_id[]" class="student_id" id="student_id_' + count + '"></td>';

    html += '<td><button class="button remove-line" title="Xóa dòng" type="button" onclick="markPointDeleted(' + count + ')"><img src="modules/Study/image/delete.png" /></button><input type="hidden" value="0" name="ct_deleted[]" id="ct_deleted' + count + '" /></td>';
    html += '</tr>';

    return html;
}


function markPointDeleted(count) {
    if (!confirm("Do you want to delete?")){
        return false;
      }
    //hide the row if it contain pointID
    if ($('#point_id_' + count).val()) {
        $("#ct_line_" + count).hide();
        $("#ct_deleted" + count).val('1');

        var element_stt = document.getElementById('stt' + count);
        element_stt.classList.remove('stt');
        element_stt.classList.add('stt_removed');

    } else {
        // remove the row if it not contain pointID
        $("#ct_line_" + count).remove();
    }
    SetCountSTT();
}


function SetCountSTT() {
    var elements = document.getElementsByClassName('stt');
    for (var i = 0; i < elements.length; i++) {
        elements[i].innerHTML = i + 1;
    }
}

//input student name
function SearchStudent(count) {
    var allStudent = JSON.parse($('#json_data').text());
    var student_name = [];
    allStudent.forEach(student => {
        student_name.push(student.name);
    });

    $('#student_name_' + count).autocomplete({
    // source:  "index.php?entryPoint=find_student"
      source: student_name,
      select: function(event, ui){
        var id ='';
        var name = ui.item.value;
        allStudent.forEach(student => {
            if(trim(name) == trim(student.name)){
                id = trim(student.id);
                return false;
            }
        });

        $('#student_id_' + count).val(id);
        // console.log($('#student_id_' + count).val());
    }
    });

  }
