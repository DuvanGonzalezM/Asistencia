<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (asset('/js/app.js')) }}"></script>


<!-- DataTables -->


{{-- SmartWizard --}}


{{-- bootstrap-switch --}}


<!-- funcion para flitrado de tablas -->
<script>
  $(document).ready(function(){
      $('input[name="CliNit"]').mask('999.999.999.999-9');
      $('input[name="cliente"]').mask('999.999.999.999-9');
      $('input[name="SedePhone2"]').mask('(999)-999 9999');
      $('input[name="SedePhone1"]').mask('(999)-999 9999');
      $('input[name="SedeCelular"]').mask('(999)-999 9999');
      $('input[name="GenerNit"]').mask('999.999.999.999-9');
      $('input[name="GSedePhone2"]').mask('(999)-999 9999');
      $('input[name="GSedePhone1"]').mask('(999)-999 9999');
      $('input[name="GSedeCelular"]').mask('(999)-999 9999');
      $('input[name="GSedeinputext1"]').mask('999-9');
      $('input[name="GSedeinputext2"]').mask('999-9');
      $('input[name="CargSalary"]').mask('000.000.000.000');
  });
</script>

{{-- funcion para recargar lista de generadores de cada cliente mediante ajax--}}

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script type="text/javascript">
    $(Selector.sidebar).slimScroll({
      height: ($(window).height() - $(Selector.mainHeader).height()) + 'px',
      color : 'rgba(0,0,0,0.2)',
      size  : '3px'
    })
</script>


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
      "responsive": true,
      "columnDefs": [ {
        "targets": 6,
        "data": "PersSlug",
        "render": function ( data, type, row, meta ) {
          return "<a method='get' href='/personal/" + data + "' class='btn btn-success' /*style='width:5em; height:2em '*/>Ver</a>";
        }
      }]
    });
  });
</script>
 

<script>
  $(document).ready(function () {
    $('#Vigilante').DataTable({
      "scrollX": false,
      "autoWidth": true,
      "keys": true,
      "responsive": true,
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
        "targets": 5,
        "data": "ID_Asis",
        "render": function ( data, type, row, meta ) {
          return "<a href='/asistencia/" + data + "/edit' class='btn btn-warning'>Edit</a>";
          }
      }]
    });
  });
</script>

