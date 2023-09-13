import './bootstrap';

var channel = Echo.private(`App.Models.User.${userID}`);
channel.notification(function(data) {
    console.log(data);
    alert(data.message);
    // alert(JSON.stringify(data));
});
