var Dashboard = function() {

    this.__construct = function() {
        Template = new Template();
        Event = new Event();
        Result = new Result();
        load_todo();
    };

    var load_todo = function() {
        $.get('api/get_todo', function(o) {
            var output = '';

            for (var i = 0; i < o.length; i++) {
                output += Template.todo(o[i]);
            }

            $('#list_todo').html(output);
        }, 'json');
    };

    var load_note = function() {
    };

    this.__construct();
}
