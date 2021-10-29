
$(document).ready(function() {

    function set_rows_type(jsonData, row_type) {
        for (let i = 0; i < jsonData[row_type].length; ++i) {
            $("#" + row_type + "_schedule_date_input_" + (i + 1)).val(jsonData[row_type][i].date);
            $("#" + row_type + "_schedule_start_hour_input_" + (i + 1)).val(jsonData[row_type][i].startTimeHour);
            $("#" + row_type + "_schedule_start_min_input_" + (i + 1)).val(jsonData[row_type][i].startTimeMin);
            $("#" + row_type + "_schedule_end_hour_input_" + (i + 1)).val(jsonData[row_type][i].endTimeHour);
            $("#" + row_type + "_schedule_end_min_input_" + (i + 1)).val(jsonData[row_type][i].endTimeMin);

            if (jsonData[row_type][i].full == "true") {
                $("#" + row_type + "_schedule_status_input_" + (i + 1)).prop("checked", true);
            }
            else {
                $("#" + row_type + "_schedule_status_input_" + (i + 1)).prop("checked", false);
            }
        }
    }

    function set_rows() {
        let jsonDataStr = $("#json_data_div").text();
        let jsonData = JSON.parse(jsonDataStr);
        set_rows_type(jsonData, "moto");
        set_rows_type(jsonData, "vku");
    }

    set_rows();

    $("#save-schedule-btn").on("click", function() {
        let scheduleJson = {};
        scheduleJson["moto"] = [];
        scheduleJson["vku"] = [];
        
        for (let index = 0; index < $('.moto_course_schedule_card').length; ++index) {
            scheduleJsonItem = {};
            scheduleJsonItem["date"] = $($('.moto_course_schedule_card')[index]).find('#moto_schedule_date_input_' + (index + 1)).val();
            scheduleJsonItem["startTimeHour"] = $($('.moto_course_schedule_card')[index]).find('#moto_schedule_start_hour_input_' + (index + 1)).val();
            scheduleJsonItem["startTimeMin"] = $($('.moto_course_schedule_card')[index]).find('#moto_schedule_start_min_input_' + (index + 1)).val();
            scheduleJsonItem["endTimeHour"] = $($('.moto_course_schedule_card')[index]).find('#moto_schedule_end_hour_input_' + (index + 1)).val();
            scheduleJsonItem["endTimeMin"] = $($('.moto_course_schedule_card')[index]).find('#moto_schedule_end_min_input_' + (index + 1)).val();
            scheduleJsonItem["full"] = "";
            if($($('.moto_course_schedule_card')[index]).find('#moto_schedule_status_input_' + (index + 1)).prop('checked') == true){
                scheduleJsonItem["full"] = "true";
            }
            else {
                scheduleJsonItem["full"] = "false";
            }
            scheduleJson["moto"].push(scheduleJsonItem);
        }

        for (let index = 0; index < $('.vku_course_schedule_card').length; ++index) {
            scheduleJsonItem = {};
            scheduleJsonItem["date"] = $($('.vku_course_schedule_card')[index]).find('#vku_schedule_date_input_' + (index + 1)).val();
            scheduleJsonItem["startTimeHour"] = $($('.vku_course_schedule_card')[index]).find('#vku_schedule_start_hour_input_' + (index + 1)).val();
            scheduleJsonItem["startTimeMin"] = $($('.vku_course_schedule_card')[index]).find('#vku_schedule_start_min_input_' + (index + 1)).val();
            scheduleJsonItem["endTimeHour"] = $($('.vku_course_schedule_card')[index]).find('#vku_schedule_end_hour_input_' + (index + 1)).val();
            scheduleJsonItem["endTimeMin"] = $($('.vku_course_schedule_card')[index]).find('#vku_schedule_end_min_input_' + (index + 1)).val();
            if($($('.vku_course_schedule_card')[index]).find('#vku_schedule_status_input_' + (index + 1)).prop('checked') == true){
                scheduleJsonItem["full"] = "true";
            }
            else {
                scheduleJsonItem["full"] = "false";
            }
            scheduleJson["vku"].push(scheduleJsonItem);
        }

        var ajaxData = new FormData();
        ajaxData.append('data', JSON.stringify(scheduleJson));
        
        $.ajax({
            url: 'model/save_schedule.php',
            data: ajaxData,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            dataType: 'json',
            success: function(data) {
              console.log(data['msg']);
            }
          })
    });
});