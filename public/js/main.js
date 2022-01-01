var notificationsWrapper = $('.notify-icon');
var notificationsCountElem = notificationsWrapper.find('span.notify-count');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('.dropdown-menu');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': csrf_token
    }
});

$('#notfiyForm').ajaxForm({url: '/push', type: 'post', resetForm: true});


// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('ea3504e29e1295ef8840', {
    cluster: 'mt1'
});

function notificationStyle() {
    if (notificationsCount <= 0) {
        $(notificationsCountElem).html('');
    } else {
        $(notificationsWrapper).addClass('active');
    }
}


// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('new-notification');
// Bind a function to a Event (the full Laravel class)
channel.bind('App\\Events\\NewNotification', function (data) {
    var existingNotifications = notifications.html();
    var newNotificationHtml = '<p class="dropdown-item" >' + data.content + '</p>';
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    $(notificationsCountElem).html(notificationsCount);
    notificationsWrapper.show();
    notificationStyle();

    PNotify.desktop.permission();
    new PNotify({
        type: 'info',
        text: data.content,
        desktop: {desktop: false} // to enable desktop noti. make it true
    });

});


$(document).ready(function () {
    notificationStyle();
});
