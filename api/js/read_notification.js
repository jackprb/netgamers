window.addEventListener("click", function () {
    readNotification();
});


function readNotification(IDnotify){
    axios.get('api/api-read-notification.php?idN='+IDnotify).then(response => {
        console.log(response);
    });
}