{{-- funcion para renderizar la tabla antes de que se muestren los datos --}}
<script>
  $(document).ready(function renderTable(){
      var a = document.querySelector("#loadingTable");
      var b = document.querySelector("#readyTable");
      var c = document.querySelector("#readyHead");
      var d = document.querySelector("div.box-body");   
      a.setAttribute("hidden", "true");
      b.removeAttribute("hidden"); 
      c.removeAttribute("hidden");
      d.removeAttribute("hidden");
  });
</script>

<script>
  $(document).ready(function () {
    $('#PersonalsTable').DataTable({
      "scrollX": false,
      "autoWidth": true,
      "keys": true,
      "responsive": true
    });
  });
</script>

<script>
  $(document).ready(function () {
    $('#AssistancesTable1').DataTable({
      "scrollX": false,
      "autoWidth": true,
      "keys": true,
      "responsive": true,
      "columnDefs": [ {
        "targets": 6,
        "data": "ID_Asis",
        "render": function ( data, type, row, meta ) {
          return "<a href='/asistencia/" + data + "/edit' class='btn btn-warning'>Edit</a>";
          }
      }]
    });
  });
</script>

<script>
  $(document).ready(function () {
    $('#AssistancesTable2').DataTable({
      "scrollX": false,
      "autoWidth": true,
      "keys": true,
      "responsive": true
    });
  });
</script>