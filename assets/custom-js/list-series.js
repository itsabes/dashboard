function getExpertiseSeriesBySeriesId(series_id, study_id, study_name, description, study_date, patient_name, patient_rm, patient_id) {

    $.ajax({
        type: "GET",
        url: 'http://localhost/rsud-ta-pacs/Series/getExpertiseSeriesBySeriresId/'+series_id,
        dataType: "JSON",
        success: function(data) {
            
            $('#modalExpertiseSeries_patientprofile').html('');
            $('#modalExpertiseSeries_patientprofile').append("<tr><td>Study</td><td>&nbsp;:&nbsp;</td><td>"+study_name+"</td></tr>");
            $('#modalExpertiseSeries_patientprofile').append("<tr><td>Description</td><td>&nbsp;:&nbsp;</td><td>"+description+"</td></tr>");
            $('#modalExpertiseSeries_patientprofile').append("<tr><td>Series Date</td><td>&nbsp;:&nbsp;</td><td>"+study_date+"</td></tr>");
            $('#modalExpertiseSeries_patientprofile').append("<tr><td>Patient Name</td><td>&nbsp;:&nbsp;</td><td>"+patient_name+"</td></tr>");
            $('#modalExpertiseSeries_patientprofile').append("<tr><td>Patient Id</td><td>&nbsp;:&nbsp;</td><td>"+patient_rm+"</td></tr>");

            $('#modalExpertiseSeries_seriesid').val(series_id);
            $('#modalExpertiseSeries_studyid').val(study_id);
            $('#modalExpertiseSeries_patientid').val(patient_id);

            if(data.status == 1) document.getElementById("modalExpertiseSeries_expertise_parent").innerHTML = '<div class="form-group"><label>Expertise</label><textarea id="modalExpertiseSeries_expertise" name="modalExpertiseSeries_expertise" style="width: 100%; height: 200px; font-size: 20px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">'+data.data.expertise+'</textarea></div>';
            else document.getElementById("modalExpertiseSeries_expertise_parent").innerHTML = '<div class="form-group"><label>Expertise</label><textarea id="modalExpertiseSeries_expertise" name="modalExpertiseSeries_expertise" style="width: 100%; height: 200px; font-size: 20px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea></div>';
            
            $('#modalExpertiseSeries').modal('show');
        },
        error: function(errorMsg) {
            alert("Kode : STDY01. Gagal mengirim permintaan. "+errorMsg.status+"-"+errorMsg.statusText);
        }
    });
}