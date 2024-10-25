<!DOCTYPE html>
<html>
 <head>
  <title>Импорт данных CSV в базу</title>  
  
  <script  src="bootstrap/jquery.min.js"></script>
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" href="bootstrap/all.css" />
  <link rel="stylesheet" href="bootstrap/bootstrap-icons.css" />
  <script src="bootstrap/bootstrap.min.js"></script>
 </head>
 
 <body>
       <h1 align="center"  >Импорт таблицы CSV в базу</h1>


  <div class="container">
<style>
  .select,
  #locale {
    width: 100%;
  }
  .like {
    margin-right: 10px;
  }
</style>

<div class="select">
       <form id="sample_form" method="POST" enctype="multipart/form-data"  >
         <label class="col-md-2 ">Выберите CSV файл</label>
         <input class="col-md-4 " type="file" name="file" id="file" accept=".csv" />
          
           <div class="col-md-2 ">
           <input type="hidden" name="hidden_field" value="1" />
           <!--<input type="submit" name="import" id="import" class="btn btn-primary" value="Import" /> -->
             <button id="import" value="Import" class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i> Тестирование
             </button>


        </div>
       </form>
</div>           
       
             <button id="send" class="btn btn-danger" >
                <i class="bi bi-cloud-arrow-up"></i> Отправить
             </button>
             <a href="delete.php"  class="btn btn-success"  >
                <i class="fa fa-trash" ></i> Удалять строки из базы
             </a>      
       
        <link rel="stylesheet" href="bootstrap/bootstrap-table.min.css">
        <script src="bootstrap/tableExport.min.js"></script>
        <script src="bootstrap/bootstrap-table.min.js"></script>
        <script src="bootstrap/bootstrap-table-ru-RU.js"></script>
        <script src="bootstrap/bootstrap-table-export.min.js"></script>

<table
  id="table"
  data-toolbar="#toolbar"
  data-search="true"
  data-show-refresh="true"
  data-show-toggle="true"
  data-show-fullscreen="true"
  data-show-columns="true"
  data-show-columns-toggle-all="true"
  data-detail-view="true"
  data-show-export="true"
  data-click-to-select="true"
  data-detail-formatter="detailFormatter"
  data-minimum-count-columns="2"
  data-show-pagination-switch="true"
  data-pagination="true"
  data-id-field="id"
  data-page-list="[10, 25, 50, 100, all]"
  data-show-footer="true"

</table>

<script>
  var $table = $('#table')
  
  var $remove = $('#remove')
  var selections = []

  function getIdSelections() {
    return $.map($table.bootstrapTable('getSelections'), function (row) {
      return row.id
    })
  }

  function responseHandler(res) {
    $.each(res.rows, function (i, row) {
      row.state = $.inArray(row.id, selections) !== -1
    })
    return res
  }

  function detailFormatter(index, row) {
    var html = []
    $.each(row, function (key, value) {
      html.push('<p><b>' + key + ':</b> ' + value + '</p>')
    })
    return html.join('')
  }

  function operateFormatter(value, row, index) {
    return [

      '<a class="remove" href="javascript:void(0)" title="Remove">',
      '<i class="fa fa-trash"></i>',
      '</a>'
    ].join('')
  }

  window.operateEvents = {

    'click .remove': function (e, value, row, index) {
      $table.bootstrapTable('remove', {
        field: 'id1',
        values: [row.id1]
      })
    }
  }

  function totalTextFormatter(data) {
    return 'Total'
  }

  function totalNameFormatter(data) {
    return data.length
  }

  function totalPriceFormatter(data) {
    var field = this.field
    return '$' + data.map(function (row) {
      return +row[field].substring(1)
    }).reduce(function (sum, i) {
      return sum + i
    }, 0)
  }

  function initTable() {
    $table.bootstrapTable('destroy').bootstrapTable({
      height: 550,
      locale: $('#locale').val(),
      columns: [

           {
            field: 'id1',
            title: 'id1',
            sortable: true,
            align: 'center'
          },       
          {
            field: 'id',
            title: 'id',
            sortable: true,
            align: 'center'
          },
          {
            field: 'custom_id',
            title: 'custom_id',
            sortable: true,
            align: 'center'
          },
          {
            field: 'rooms1',
            title: 'rooms',
            align: 'center',
            sortable: true,
            align: 'center'
          },
          {
            field: 'floor',
            title: 'floor',
            align: 'center',
            sortable: true,
            align: 'center'
          },
          {
            field: 'price',
            title: 'price',
            align: 'center',
            sortable: true,
            align: 'center'
          },
          {
            field: 'description',
            title: 'description',
            align: 'center',
            sortable: true,
            align: 'center'
          },
          {
            field: 'residential_complex',
            title: 'residential_complex',
            align: 'center',
            sortable: true,
            align: 'center'
          },
          {
            field: 'comment',
            title: 'comment',
            align: 'center',
            sortable: true,
            align: 'center'
          },
          {
            field: 'del',
            title: 'del',
            align: 'center',
            clickToSelect: false,
            events: window.operateEvents,
            formatter: operateFormatter
          }
        
      ]
    })
    $table.on('check.bs.table uncheck.bs.table ' +
      'check-all.bs.table uncheck-all.bs.table',
    function () {
      $remove.prop('disabled', !$table.bootstrapTable('getSelections').length)

      // save your data, here just save the current page
      selections = getIdSelections()
      // push or splice the selections if you want to save all data selections
    })
    $table.on('all.bs.table', function (e, name, args) {
      console.log(name, args)
    })
    $table.on('load-success.bs.table', function (e, data) {
    if (data.total && !data.rows.length) {
        $table.bootstrapTable('prevPage').bootstrapTable('refresh');
    }
});
    $remove.click(function () {
      
      var ids = getIdSelections()
      $table.bootstrapTable('remove', {
        field: 'id1',
        values: ids
      })
      $remove.prop('disabled', true)
    })
  }

  $(function() {
    initTable()

    $('#locale').change(initTable)
  })
</script>
<script>
 $(document).ready(function(){

  $('#sample_form').on('submit', function(event){
   $('#message').html('');
   event.preventDefault();
   $.ajax({
    url:"test.php",
    method:"POST",
    data: new FormData(this),
    dataType:"json",
    contentType:false,
    cache:false,
    processData:false,
    success:function(data)
    {
     
     
     $table.bootstrapTable('load', data)
     $('#sample_form')[0].reset();
     
     
    }
   })
  });
  
  
  $('#send').click(function() { 

$.ajax({
    url:"import.php",
    method:"POST",
    data: JSON.stringify($table.bootstrapTable('getData')),
    dataType:"json",
    contentType:false,
    cache:false,
    processData:false,
    async: false,
    success:function(data)
    {
     
     
     $table.bootstrapTable('load', data)
     $('#sample_form')[0].reset();
     
     
    }
   })
      
  });
  
  
  
  
  
  

 });
 </script>
