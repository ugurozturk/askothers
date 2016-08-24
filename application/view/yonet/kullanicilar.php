        <div id="page-wrapper">
 <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
            <th>A</th>
                <th>ID</th>
                <th>Type</th>
                <th>Puan</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Aktif</th>
                <th>Created Date</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
            <th>A</th>
                <th>ID</th>
                <th>Type</th>
                <th>Puan</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
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
        <h4 class="modal-title">Kullanıcı Düzenle</h4>
      </div>
      <div class="modal-body">
      <input style='display:none' id="i0" />
        <div class="form-group label-static is-empty">
        <label for="i1" class="control-label">Username</label>
        <input class="form-control" id="i1" type="username">
        </div>

        <div class="form-group  label-static">
        <label for="i2" class="control-label">Password</label>
        <input class="form-control" id="i2" type="password">
        </div>

        <div class="form-group label-static">
        <label for="i3" class="control-label">Email</label>
        <input class="form-control" id="i3" type="email">
        </div>

        <div class="form-group label-static">
        <label for="i4" class="control-label">Phone</label>
        <input class="form-control" id="i4" type="text">
        </div>

        <div class="form-group label-static">
        <label for="i6" class="control-label">Points</label>
        <input class="form-control" id="i6" type="number">
        </div>

        <div class="form-group label-static">
        <label for="i5" class="control-label">Aktif</label>
        <input class="form-control" id="i5" type="text">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="usersavebtn">Save changes</button>
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
        url: '<?php echo URL . "yonet/getAllUser"; ?> ',
        dataSrc: ''
    },
    columns: [    
        {
            "data": null,
            "sortable": false,
            "render": function (data, type, full) { return '<button class="btn" name="duzenle" onclick = "duzenleModal('+ full.user_id +')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button><button class="btn" onclick = "silModal('+ full.user_id +')"><i class="fa fa-times" aria-hidden="true"></i> </button>'; }
        }, 
    { "data": "user_id" },
    { "data": "user_type_id" },
    { "data": "points" },
    { "data": "username" },
    { "data": "email" },
    { "data": "phone" },
    { "data": "active" },
    { "data": "created_date" }  ]
    } );

} );

function duzenleModal(a){
 $.ajax({
        url: '/yonet/getUser',
        type: 'POST',
        dataType: 'json',
        data: {
            userid: a
        },
    }).success(function(obj){
        $("#i0").val(obj.user_id);
        $("#i1").val(obj.username);
        $("#i2").val(obj.password);
        $("#i3").val(obj.email);
        $("#i4").val(obj.phone);
        $("#i5").val(obj.active);
        $("#i6").val(obj.points);

    });

$(".modal").show();
}

function silModal(a){
    if (confirm('Silmeye emin misin ?')) {
     $.ajax({
        url: '/yonet/silUser',
        type: 'POST',
        dataType: 'json',
        data: {
            userid: a
        },
    }).success(function(obj){
        var n = noty({
                text: 'Kullanıcı Silindi',
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

$('#usersavebtn').click(function(){
 $.ajax({
        url: '/yonet/updateUser',
        type: 'POST',
        dataType: 'json',
        data: {
            userid: $("#i0").val(),
            username: $("#i1").val(),
            password: $("#i2").val(),
            email: $("#i3").val(),
            phone: $("#i4").val(),
            aktif: $("#i5").val(),
            points: $("#i6").val()
        },
    }).success(function(obj){
        $(".modal").hide();
        var n = noty({
                text: 'Başarılı bir şekilde kullanıcı güncellendi',
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