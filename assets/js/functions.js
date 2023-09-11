//Set item as checked/unchecked
$(document).on("click", ".switch-checked", function() {

    var id = $(this).attr('edit-id');
    var checked = $(this).attr('edit-checked') == 1? 0 : 1;

    $.post('index.php?action=update', {
        id: id,
        checked: checked
    }, function(data){
        bootbox.alert(data, function() {
            location.reload();
        });
    }).fail(function() {
        alert('Unable to update');
    });
});

//Update POST
$(document).on("click", ".update", function() {

    const id = $('#id').val();
    const description = $('#description').val();
    const checked = $('#checked').val();

    $.post('index.php?action=update', {
        id: id,
        checked: checked,
        description: description
    }, function(data){
        bootbox.alert(data, function() {
            window.location.href = "/";
        });
    }).fail(function() {
        alert('Unable to update');
    });
});

//Create POST
$(document).on("click", ".create", function() {

    const id = $('#id').val();
    const description = $('#description').val();
    const checked = $('#checked').val();

    $.post('index.php?action=create', {
        id: id,
        checked: checked,
        description: description
    }, function(data){
        bootbox.alert(data, function() {
            window.location.href = "/";
        });
    }).fail(function() {
        alert('Unable to create.');
    });
});


//Delete
$(document).on('click', '#delete-item', function() {

    var id = $(this).attr('delete-id');
    bootbox.confirm({
        message: "<h4>Are you sure?</h4>",
        buttons: {
            confirm: {
                label: '<span class="glyphicon glyphicon-ok"></span> Yes',
                className: 'btn-danger'
            },
            cancel: {
                label: '<span class="glyphicon glyphicon-remove"></span> No',
                className: 'btn-primary'
            }
        },
        callback: function (result) {
            if(result==true){
                $.post('index.php?action=delete', {
                    object_id: id
                }, function(data){
                    bootbox.alert(data, function() {
                        location.reload();
                    });
                }).fail(function() {
                    alert('Unable to delete');
                });
            }
        }
    });

    return false;
});

var el = document.querySelector('#checked');
$(document).on('click', '#checked', function() {
    this.value = this.value == '0'? 1:0;
});
