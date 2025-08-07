function detailStudyPatientList(patientId) {

  console.log('detailStudyPatientList, patientId: ' + patientId);
}

$(document).ready(function() {
  
  $(function () {
    $('#tablePatientList1').DataTable({
      "responsive": true,
        "autoWidth": false,
        "paging": true,
    });
  });
});



