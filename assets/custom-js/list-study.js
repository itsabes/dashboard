function getExpertiseStudyByStudyId(study_id, patient_id, description, study_date, patient_name, patient_id_2) {

    $.ajax({
        type: "GET",
        url: 'http://localhost/rsud-ta-pacs/Studies/getExpertiseStudyByStudiesId/'+study_id,
        dataType: "JSON",
        success: function(data) {
            
            $('#modalExpertiseStudy_patientprofile').html('');
            $('#modalExpertiseStudy_patientprofile').append("<tr><td>Deskripsi</td><td>&nbsp;:&nbsp;</td><td>"+description+"</td></tr>");
            $('#modalExpertiseStudy_patientprofile').append("<tr><td>Tanggal</td><td>&nbsp;:&nbsp;</td><td>"+study_date+"</td></tr>");
            $('#modalExpertiseStudy_patientprofile').append("<tr><td>Nama Pasien</td><td>&nbsp;:&nbsp;</td><td>"+patient_name+"</td></tr>");
            $('#modalExpertiseStudy_patientprofile').append("<tr><td>Id Pasien</td><td>&nbsp;:&nbsp;</td><td>"+patient_id_2+"</td></tr>");

            $('#modalExpertiseStudy_studyid').val(study_id);
            $('#modalExpertiseStudy_patientid').val(patient_id);

            if(data.status == 1) document.getElementById("modalExpertiseStudy_expertise_parent").innerHTML = '<div class="form-group"><label>Expertise</label><textarea id="modalExpertiseStudy_expertise" name="modalExpertiseStudy_expertise" style="width: 100%; height: 200px; font-size: 20px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">'+data.data.expertise+'</textarea></div>';
            else document.getElementById("modalExpertiseStudy_expertise_parent").innerHTML = '<div class="form-group"><label>Expertise</label><textarea id="modalExpertiseStudy_expertise" name="modalExpertiseStudy_expertise" style="width: 100%; height: 200px; font-size: 20px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea></div>';
            
            $('#modalExpertiseStudy').modal('show');
        },
        error: function(errorMsg) {
            alert("Kode : STDY01. Gagal mengirim permintaan. "+errorMsg.status+"-"+errorMsg.statusText);
        }
    });
}