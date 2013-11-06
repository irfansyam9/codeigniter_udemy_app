var Template = function() {
    this.__construct = function() {
    }

    this.todo = function(obj) {
        var output = '';
        if (obj.completed == 1) {
            output += '<div id="todo_' + obj.todo_id + '" class="todo_complete">';
        }
        else {
            output += '<div id="todo_' + obj.todo_id + '">';
        }
        output += '<span>' + obj.content + '</span> ';
        var data_completed = (obj.completed == 1) ? 0 : 1;
        var data_completed_text = (obj.completed == 1) ? '<span class="glyphicon glyphicon-ok-circle"></span>' : '<span class="glyphicon glyphicon-ok-sign"></span>';
        output += '<a class="todo_update" data-id="' + obj.todo_id + '" data-completed="' + data_completed + '" href="api/update_todo">' + data_completed_text + '</a>';
        output += '<a class="todo_delete" data-id="' + obj.todo_id + '" href="api/delete_todo/"><span class="glyphicon glyphicon-remove"></span></a>';
        output += '</div>';
        return output;
    };

    this.note = function(obj) {
        var output = '';
        output += '<div id="note_' + obj.note_id +'">';
        output += '<a class="note_toggle" data-id="' + obj.note_id + '" id="note_title_' + obj.note_id +'" href="#">' + obj.title + '</a> ';
        output += '<a class="note_update_display" data-id="' + obj.note_id + '" href="#">Edit</a>';
        output += '<a class="note_delete" data-id="' + obj.note_id + '" href="api/delete_note/"><span class="glyphicon glyphicon-remove"></span></a>';
        output += '<div class="note_edit_container" id="note_edit_container_' + obj.note_id + '"></div>';
        output += '<div class="hide" id="note_content_' + obj.note_id +'">' + obj.content + '</div>';
        output += '</div>';
        return output;
    };

    this.note_edit = function(note_id) {
        var output = '';
        output += '<form method="post" action="api/update_note" class="note_edit_form" role="form">';
        output += '<div class="form-group">';
        output += '<input type="hidden" class="note_id form-control" name="note_id" value="' + note_id + '" />';
        output += '</div>';
        output += '<div class="form-group">';
        output += '<input type="text" class="title form-control" name="title" />';
        output += '</div>';
        output += '<div class="form-group">';
        output += '<textarea name="content" class="content form-control"></textarea>';
        output += '</div>';
        output += '<div class="form-group">';
        output += '<input type="submit" value="Save" class="btn btn-default" />';
        output += '<input type="submit" class="note_edit_cancel btn btn-danger" value="Cancel" />';
        output += '</div>';
        output += '</form>';
        return output;
    };

    this.__construct();
}
