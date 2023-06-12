function createNotification(notifications){
    let result = "";

    for(let i=0; i < notifications.length; i++){
        // notifica per
        let str = `
        <div class="toast fade show" role="alert" style="margin-bottom: 7%;" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
            <div class="toast-header bg-success text-white">
                <i class="ai-bell fs-lg me-2"></i>
                <span class="fw-medium me-auto">New comment!</span>
                <button id="notify${notifications[i]['ID']}" type="button" onclick="readNotification(${notifications[i]['ID']});" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="row">
                <div class="col-sm-5 col-md-4"><img class="userImg d-block rounded-circle mb-2 img-fluid" src = "./upload/userImages/${notifications[i][`path`]}" >
                </div>
                <div class="toast-body col-sm-7 col-md-8"><a href="profile.php?u=${notifications[i]['userSrc']}"><strong>${notifications[i]['username']}</strong></a> commented your post!</div>
            </div>
        </div>`;
        result += str;
    }
    return result;
}

window.addEventListener("load", function () {
    getNotifications();  // fetch notification when the page loads 

    setInterval(function(){ 
        getNotifications(); 
    }, 15000); // fetch new notifications every 15 seconds.  
});


function getNotifications(type = 'ALL'){
    axios.get('api/api-get-notification.php').then(response => {
        console.log(response);
        let notifications = createNotification(response.data);
        let totNotificationCount = response.data.length;
        let notificationNewComment = 0;
        let notificationNewFollower = 0;
        let notificationNewLike = 0;
        let notificationNewPostFeed = 0;

        for(let i=0; i < response.data.length; i++){
            switch (response.data[i]['type']) {
                case 'NCOMMENT':
                    notificationNewComment++;
                    break;
                
                case 'NFOLLOWER':
                    notificationNewFollower++;
                    break;
                
                case 'NLIKECOMMENT':
                    notificationNewLike++;
                    break;
                
                case 'NLIKEPOST':
                    notificationNewLike++;
                    break;

                case 'NPOSTFEED':
                    notificationNewPostFeed++;
                    break;
                
                default:
                    break;
            } 
        }

        document.querySelector("#totalNotification").innerText = totNotificationCount == 0 ? '' : totNotificationCount; 
        document.querySelector("#postNotification").innerText = notificationNewPostFeed == 0 ? '' : notificationNewPostFeed;
        document.querySelector("#likeNotification").innerText = notificationNewLike == 0 ? '' : notificationNewLike;
        document.querySelector("#followNotification").innerText = notificationNewFollower == 0 ? '' : notificationNewFollower;
        document.querySelector("#commentNotification").innerText = notificationNewComment == 0 ? '' : notificationNewComment;
        
        document.querySelector("#newCommentList").innerHTML = notifications;
    });
}