var Event = function() {
    this.__construct = function() {
        console.log('Event Created');
        create_todo();
        create_note();
        update_todo();
        update_note();
        delete_todo();
        delete_note();
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
                        self.parent('div').removeClass('todo_complete');
                        self.html('<span class="glyphicon glyphicon-ok-circle"></span>');
                        self.data('completed', 0);
                    }
                    else {
                        self.parent('div').addClass('todo_complete');
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
    };


    this.__construct();
}
