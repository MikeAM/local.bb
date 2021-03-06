<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>**Backbone Tutorial**</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>User Manager</h1>
    <hr>
    <div class="page">something</div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.4/underscore-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>

<script>
    // You were here: 20:00ish. Content should show here! does not show up
    // Last action: Fixed htaccess to pass routes to index.html, added line #50
    
    // "Lets us modify the base URL of ajax requests, instead of sending all locally"
    // Mike note: may not need this since I'm developing locally, not on Hiroku like tut dude is.
//    $.ajaxPrefilter( function( options, originalOptions, jqXHR ) {
//        options.url = 'http://backbonejs-beginner.herokuapp.com' + options.url;
//    });

    var Users = Backbone.Collection.extend({
        url: '/users'
    });

    var UserList = Backbone.View.extend({
       el: '.page',
        render: function() {
            var that = this;
            var users = new Users();
            users.fetch({
                success: function() {
                    that.$el.html('Content should show here!');
                }
            });
        }
    });

    var Router = Backbone.Router.extend({
        routes: {
            '':'home'
        }
    });

    var userList = new UserList();

    var router = new Router();
    router.on('route:home', function() {
        console.log('We have loaded the home page');
        userList.render();
    });

    Backbone.history.start();
</script>
</body>
</html>