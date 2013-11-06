var Event = function() {
    this.__construct = function() {
        create_todo();
        create_note();
        update_todo();
        update_note_display();
        update_note();
        delete_todo();
        delete_note();
        toggle_note();
    }

    var create_todo = function() {
        $('#create_todo').submit(function(evt) {
            var url = $(this).attr('action');
            var postData = $(this).serialize();

            $.post(url, postData, function(o) {
                if (o.result == 1) {
                    Result.success('Success');
                    var output = Template.todo(o.data[0]);
                    $('#list_todo').append(output);

                    $('#create_todo input[type=text]').val('');
                }
                else {
                    Result.error(o.error);
                }
            }, 'json');

            return false;
        });
    }

    var create_note = function() {
        $('#create_note').submit(function(evt) {
            var url = $(this).attr('action');
            var postData = $(this).serialize();

            $.post(url, postData, function(o) {
                if (o.result == 1) {
                    Result.success('Success');
                    var output = Template.note(o.data[0]);
                    $('#list_notes').append(output);

                    $('#create_note input[type=text]').val('');
                }
                else {
                    Result.error(o.error);
                }
            }, 'json');

            return false;
        });
    }

    var update_todo = function() {
        $('body').on('click', '.todo_update', function() {
            var self = $(this);
            var url = $(this).attr('href');
            var postData = {
                todo_id: $(this).data('id'),
                completed: $(this).data('completed')
            };

            $.post(url, postData, function(o) {
                if (o.result == 1) {
                    if (postData.completed == 1) {
                        self.parent('div').addClass('todo_complete');
                        self.html('<span class="glyphicon glyphicon-ok-circle"></span>');
                        self.data('completed', 0);
                    }
                    else {
                        self.parent('div').removeClass('todo_complete');
                        self.html('<span class="glyphicon glyphicon-ok-sign"></span>');
                        self.data('completed', 1);
                    }
                }
                else {
                    Result.error('Nothing Updated');
                }
            }, 'json');

            return false;
        });
    };

    var update_note = function() {
        $('body').on('submit', '.note_edit_form', function(e) {

            var url = $(this).attr('action'),
                postData = {
                    note_id: $(this).find('.note_id').val(),
                    title: $(this).find('.title').val(),
                    content: $(this).find('.content').val()
                },
                form = $(this);

            console.log(postData)
            $.post(url, postData, function(o) {
                if (o.result == 1) {
                    Result.success('Successfully updated note!');
                    $('#note_title_' + postData.note_id).html(postData.title);
                    $('#note_content_' + postData.note_id).html(postData.content);
                    form.remove();
                }
                else {
                    Result.error('Error saving');
                }
            }, 'json');

            return false;
        });
    };

    var update_note_display = function() {
        $('body').on('click', '.note_update_display', function(e) {
            note_id = $(this).data('id');
            var output = Template.note_edit(note_id);
            $('#note_edit_container_' + note_id).html(output);

            var title = $('#note_title_' + note_id).html();
            var content = $('#note_content_' + note_id).html();

            $('#note_edit_container_' + note_id).find('.title').val(title);
            $('#note_edit_container_' + note_id).find('.content').val(content);

            return false;
        });

        $('body').on('click', '.note_edit_cancel', function(e) {
            $(this).parents('.note_edit_container').html('');

            return false;
        });
    };

    var delete_todo = function() {
        $('body').on('click', '.todo_delete', function(evt) {
            var self = $(this).parent('div');
            var url = $(this).attr('href');
            var postData = {
                'todo_id': $(this).data('id')
            }
            $.post(url, postData, function(o) {
                if (o.result == 1) {
                    Result.success('Item Deleted');
                    self.remove();
                }
                else {
                    Result.error(o.msg);
                }
            }, 'json');

            return false;
        });
    };

    var delete_note = function() {
        $('body').on('click', '.note_delete', function(evt) {
            var self = $(this).parent('div');
            var url = $(this).attr('href');
            var postData = {
                'note_id': $(this).data('id')
            }
            $.post(url, postData, function(o) {
                if (o.result == 1) {
                    Result.success('Item Deleted');
                    self.remove();
                }
                else {
                    Result.error(o.msg);
                }
            }, 'json');

            return false;
        });
    };

    var toggle_note = function() {
        $('body').on('click', '.note_toggle', function(e) {
            var note_id = $(this).data('id');

            $('#note_content_' + note_id).toggleClass('hide');
            return false;
        });
    };


    this.__construct();
}
