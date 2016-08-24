        <div id="page-wrapper">
 <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
            <th>A</th>
                <th>qID</th>
                <th>userID</th>
                <th>Soru</th>
                <th>Dil</th>
                <th>Puan</th>
                <th>Aktif</th>
                <th>Created Date</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
            <th>A</th>
                <th>qID</th>
                <th>userID</th>
                <th>Soru</th>
                <th>Dil</th>
                <th>Puan</th>
                <th>Aktif</th>
                <th>Created Date</th>
            </tr>
        </tfoot>
    </table>

<!-- /#Modal -->
        </div>
            <!-- Modal -->
<div class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Question Düzenle</h4>
      </div>
      <div class="modal-body">
      <input style='display:none' id="i0" />
        <div class="form-group label-static is-empty">
        <label for="i1" class="control-label">UserID</label>
        <input class="form-control" id="i1" type="username">
        </div>

        <div class="form-group  label-static">
        <label for="i2" class="control-label">Soru</label>
        <input class="form-control" id="i2" type="text">
        </div>

        <div class="form-group label-static">
        <label for="i3" class="control-label">Dil</label>
        <input class="form-control" id="i3" type="text">
        </div>

        <div class="form-group label-static">
        <label for="i4" class="control-label">Puan</label>
        <input class="form-control" id="i4" type="text">
        </div>

        <div class="form-group label-static">
        <label for="i5" class="control-label">Aktif</label>
        <input class="form-control" id="i5" type="text">
        </div>

        <div class="form-group label-static">
        <label for="i6" class="control-label">Created Date</label>
        <input class="form-control" id="i6" type="text">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="questionsavebtn">Save changes</button>
      </div>
    </div>
  </div>
</div>
        <!-- /#page-wrapper -->
        <script>
        var table;
       $(document).ready(function() {
    table = $('#example').DataTable( {
       ajax: {
        url: '<?php echo URL . "yonet/getAllSorular"; ?> ',
        dataSrc: ''
    },
    columns: [    
        {
            "data": null,
            "sortable": false,
            "render": function (data, type, full) { return '<button class="btn" name="duzenle" onclick = "duzenleModal('+ full.question_id +')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button><button class="btn" onclick = "silModal('+ full.question_id +')"><i class="fa fa-times" aria-hidden="true"></i> </button>'; }
        }, 
    { "data": "question_id" },
    { "data": "user_id" },
    { "data": "question_detail" },
    { "data": "language_id" },
    { "data": "points" },
    { "data": "active" },
    { "data": "created_date" }  ]
    } );

} );

function duzenleModal(a){
 $.ajax({
        url: '/yonet/getQuestion',
        type: 'POST',
        dataType: 'json',
        data: {
            questionid: a
        },
    }).success(function(obj){
        $("#i0").val(obj.question_id);
        $("#i1").val(obj.user_id);
        $("#i2").val(obj.question_detail);
        $("#i3").val(obj.language_id);
        $("#i4").val(obj.points);
        $("#i5").val(obj.active);
        $("#i6").val(obj.created_date);
    });

$(".modal").show();
}

function silModal(a){
    if (confirm('Silmeye emin misin ?')) {
     $.ajax({
        url: '/yonet/silQuestion',
        type: 'POST',
        dataType: 'json',
        data: {
            questionid: a
        },
    }).success(function(obj){
        var n = noty({
                text: 'Soru Silindi',
                layout: 'top',
                type: 'success',
                animation: {
                    open: 'animated bounceIn', // Animate.css class names
                    close: 'animated bounceOut', // Animate.css class names
                }
                });
        table.ajax.reload( null, false );
    });
} else {
    // Do nothing!
}
}


$('[data-dismiss="modal"]').click(function(){
$(".modal").hide();
});

$('#questionsavebtn').click(function(){
 $.ajax({
        url: '/yonet/updateQuestion',
        type: 'POST',
        dataType: 'json',
        data: {
            questionid: $("#i0").val(),
            user_id: $("#i1").val(),
            question_detail: $("#i2").val(),
            language_id: $("#i3").val(),
            points: $("#i4").val(),
            active: $("#i5").val(),
        },
    }).success(function(obj){
        $(".modal").hide();
        var n = noty({
                text: 'Başarılı bir şekilde Soru güncellendi',
                layout: 'top',
                type: 'success',
                animation: {
                    open: 'animated bounceIn', // Animate.css class names
                    close: 'animated bounceOut', // Animate.css class names
                }
                });
                table.ajax.reload( null, false );
    });
});

        </script>

        <style>
        .btn{
            padding: 0px 5px 0px 5px;
            margin: 0px 0px 0px 0px;
        }
        </style>