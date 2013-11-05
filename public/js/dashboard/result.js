var Result = function() {
    this.__construct = function() {
    }

    this.success = function(msg) {
        var success = $('#success');

        if (typeof msg === 'undefined') {
            success.html('success').show();
        }
        success.html(msg).show();

        setTimeout(function() {
            success.fadeOut();
        }, 5000);
    }

    this.error = function(msg) {
        var error = $('#error');

        if (typeof msg === 'undefined') {
            error.html('Error');
        }

        if (typeof msg === 'object') {
            var output = '<ul>';
            for (var key in msg) {
                output += '<li>' + msg[key] + '</li>';
            }
            output += '</ul>';
            error.html(output).show();
        }
        else {
            error.html(msg).show();
        }

        setTimeout(function() {
            error.fadeOut();
        }, 5000);
    }

    this.__construct();
};
