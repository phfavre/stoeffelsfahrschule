
$(document).ready(function() {

    function set_rows_type(jsonData, row_type) {
        let htmlStr = '';

        let today = new Date();
        let yesterday = new Date(today);
        yesterday.setDate(yesterday.getDate() - 1);

        let yesterdayStr = yesterday.getFullYear() + "-" + (yesterday.getMonth() + 1) + "-" + yesterday.getDate();
        jsonData[row_type].sort((a, b) => a.date < b.date ? -1 : a.date > b.date ? 1 : 0);

        let count = 0;

        for (let i = 0; i < jsonData[row_type].length; ++i) {
            if (jsonData[row_type][i].date <= yesterdayStr)
            {
                continue;
            }

            ++count;
            htmlStr += '<div class="row course_info_row">';
            htmlStr += '<div class="col-xs-4"><div class="course_info_date">';
            htmlStr += jsonData[row_type][i].date;
            htmlStr += '</div></div>';

            htmlStr += '<div class="col-xs-4"><div class="course_info_time">';
            htmlStr += jsonData[row_type][i].startTimeHour + ":" + jsonData[row_type][i].startTimeMin;
            htmlStr += ' - ';
            htmlStr += jsonData[row_type][i].endTimeHour + ":" + jsonData[row_type][i].endTimeMin;
            htmlStr += " Uhr";
            htmlStr += '</div></div>';

            if (jsonData[row_type][i].full == "true") {
                htmlStr += '<div class="col-xs-4"><div class="course_info_status course_info_full">';
                htmlStr += "Ausgebucht";
                htmlStr += '</div></div>';
            }
            else {
                htmlStr += '<div class="col-xs-4"><div class="course_info_status course_info_available">';
                htmlStr += "Frei";
                htmlStr += '</div></div>';
            }
            htmlStr += '</div>';
        }
        htmlStr += '<div class="course_info_address"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;test Lauenenstrasse 5, Lauenen</div>';

        if (count == 0)
        {
            htmlStr = '<div>Bitte rufen Sie uns unter +41 79 311 18 62 an, um weitere Informationen zu den nächsten geplanten Kursen zu erhalten.</div>';
        }

        $("#" + row_type + "_course_info_div").html(htmlStr);
    }

    function fill_course_info() {
        let jsonDataStr = $("#course_dates_data_hidden").text();
        let jsonData = JSON.parse(jsonDataStr);

        set_rows_type(jsonData, "moto");
        set_rows_type(jsonData, "vku");
    }

    fill_course_info();

});