window.addEventListener("click", function () {
    readNotification();  // fetch notification when the page loads 
});


function readNotification(IDnotify){
    axios.post('api/api-read-notification.php', {
            firstName: IDnotify
          })
          .then(function (response) {
            console.log(response);
          });
}