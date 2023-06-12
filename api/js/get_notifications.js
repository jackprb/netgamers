function createNotification(notifications){
    let result = "";
    if(notifications.length > 0){
        let modalArray = 
            {"NCOMMENT" : ["bg-success text-white", "New comment!", " commented your post!"],
            "NFOLLOWER": ["bg-dark text-white", "New follower!", " started following you!"],
            "NLIKECOMMENT": ['text-white" style="background-color: #e23152;', "New like!", " liked your comment!"],
            "NLIKEPOST": ['text-white" style="background-color: #e23152;', "New like!", " liked your post!"],
            "NPOSTFEED": ["bg-primary text-white", "New post!", " posted something new!"]};
        for(let i=0; i < notifications.length; i++){
            // struttura della notifica
            let str = `
            <div class="toast fade show" role="alert" style="margin-bottom: 7%;" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                <div class="toast-header ${modalArray[notifications[i][`type`]][0]}">
                    <i class="ai-bell fs-lg me-2"></i>
                    <span class="fw-medium me-auto">${modalArray[notifications[i][`type`]][1]}</span>
                    <button type="button" onclick="readNotification(${notifications[i]['ID']});" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="row">
                    <div class="col-sm-5 col-md-4"><img class="userImg d-block rounded-circle mb-2 img-fluid" src = "./upload/userImages/${notifications[i][`path`]}" >
                    </div>
                    <div class="toast-body col-sm-7 col-md-8"><a href="profile.php?u=${notifications[i]['userSrc']}"><strong>${notifications[i]['username']}</strong></a>${modalArray[notifications[i][`type`]][2]}</div>
                </div>
            </div>`;
            result += str;
        }
    }
    return result;
}

window.addEventListener("load", function () {
    getNotifications(); // fetch notification when the page loads

    setInterval(function(){ 
        getNotifications(); 
    }, 10000); // fetch new notifications every 10 seconds.  
});


function getNotifications(){
    let settings = [];
    let totCount;

    axios.get('api/api-get-notification-preferences.php').then(response => {
        for(let i=0; i < response.data.length; i++){
            switch (response.data[i]['type']){
                case 'NCOMMENT':
                    settings[0] = response.data[i]['value'];
                    break;

                case 'NFOLLOWER':
                    settings[1] = response.data[i]['value'];
                    break;

                case 'NLIKECOMMENT':
                    settings[2] = response.data[i]['value'];
                    break;

                case 'NLIKEPOST':
                    settings[3] = response.data[i]['value'];
                    break;

                case 'NPOSTFEED':
                    settings[4] = response.data[i]['value'];
                break;
            }
        }
    });

    axios.get('api/api-get-notification.php').then(response => {
        //console.log(response);
        let notificationNewComment = [];
        let notificationNewFollower = [];
        let notificationNewLike = [];
        let notificationNewPostFeed = [];

        for(let i=0; i < response.data.length; i++){
            switch (response.data[i]['type']) {
                case 'NCOMMENT':
                    if(settings[0] == 1) notificationNewComment.push(response.data[i]);
                    break;
                
                case 'NFOLLOWER':
                    if(settings[1] == 1) notificationNewFollower.push(response.data[i]);
                    break;
                
                case 'NLIKECOMMENT':
                    if(settings[2] == 1) notificationNewLike.push(response.data[i]);
                    break;
                
                case 'NLIKEPOST':
                    if(settings[3] == 1) notificationNewLike.push(response.data[i]);
                    break;

                case 'NPOSTFEED':
                    if(settings[4] == 1) notificationNewPostFeed.push(response.data[i]);
                    break;
                
                default:
                    break;
            } 
        }

        totCount = notificationNewPostFeed.length + notificationNewLike.length + notificationNewFollower.length + notificationNewComment.length;
        document.querySelector("#totalNotification").innerText = totCount == 0 ? '' : totCount; 
        document.querySelector("#postNotification").innerText = notificationNewPostFeed.length == 0 ? '' : notificationNewPostFeed.length;
        document.querySelector("#likeNotification").innerText = notificationNewLike.length == 0 ? '' : notificationNewLike.length;
        document.querySelector("#followNotification").innerText = notificationNewFollower.length == 0 ? '' : notificationNewFollower.length;
        document.querySelector("#commentNotification").innerText = notificationNewComment.length == 0 ? '' : notificationNewComment.length;

        document.querySelector("#newCommentList").innerHTML = createNotification(notificationNewComment);
        document.querySelector("#newLikeList").innerHTML = createNotification(notificationNewLike);
        document.querySelector("#newPostList").innerHTML = createNotification(notificationNewPostFeed);
        document.querySelector("#newFollowList").innerHTML = createNotification(notificationNewFollower);
    });
}