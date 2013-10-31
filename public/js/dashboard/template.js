var Template = function() {
    this.__construct = function() {
        console.log('Template Created');
    }

    this.todo = function(obj) {
        var output = '';
        if (obj.completed == 1) {
            output += '<div id="todo_' + obj.todo_id + '" class="todo_complete">';
        }
        else {
            output += '<div id="todo_' + obj.todo_id + '">';
        }
        output += '<span>' + obj.content + '</span>';
        var data_completed = (obj.completed == 1) ? 0 : 1;
        var data_completed_text = (obj.completed == 1) ? '<span class="glyphicon glyphicon-ok-sign"></span>' : '<span class="glyphicon glyphicon-ok-circle"></span>';
        output += '<a class="todo_update" data-id="' + obj.todo_id + '" data-completed="' + obj.completed + '" href="api/update_todo">' + data_completed_text + '</a>';
        output += '<a class="todo_delete" data-id="' + obj.todo_id + '" href="api/delete_todo/"><span class="glyphicon glyphicon-remove"></span></a>';
        output += '</div>';
        return output;
    };

    this.note = function(obj) {
        var output = '';
        output += '<div id="note_' + obj.note_id +'">';
        output += '<span>' + obj.title + '</span>';
        output += '<a href="#">Delete</a>';
        output += '<span>' + obj.content + '</span>';
        output += '</div>';
        return output;
    };

    this.__construct();
}
