function createNotification(notifications){
    let result = "";
    if(notifications.length > 0){
        let modalArray = 
            {"NCOMMENT" : ["bg-success text-white", "New comment!", " commented your post ", `<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chat-left-dots text-dark svg-navbar me-2" viewBox="0 0 16 16" role="img" aria-hidden="true">
                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                </svg>`],
            "NFOLLOWER": ["bg-dark text-white", "New follower!", " started following you!", `<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-add text-dark svg-navbar me-2" viewBox="0 0 16 16" role="img" aria-hidden="true">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                </svg>`],
            "NLIKECOMMENT": ['text-white" style="background-color: #e23152;', "New like!", ` liked your `, `<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-heart text-dark svg-navbar me-2" viewBox="0 0 16 16" role="img" aria-hidden="true">
                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                </svg>`],
            "NLIKEPOST": ['text-white" style="background-color: #e23152;', "New like!", " liked your post ", `<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-heart text-dark svg-navbar me-2" viewBox="0 0 16 16" role="img" aria-hidden="true">
                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                </svg>`],
            "NPOSTFEED": ["bg-primary text-white", "New post!", " posted something new! Post title: ", `<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus-square text-dark svg-navbar me-2" viewBox="0 0 16 16" role="img" aria-hidden="true">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>`]};
        for(let i=0; i < notifications.length; i++){
            // struttura della notifica
            let str = `
            <div class="toast fade show" role="alert" style="margin-bottom: 7%;" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                <div class="toast-header ${modalArray[notifications[i][`type`]][0]}">
                    ${modalArray[notifications[i][`type`]][3]}
                    <span class="fw-medium me-auto">${modalArray[notifications[i][`type`]][1]}</span>
                    <button type="button" onclick="readNotification(${notifications[i]['ID']});" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="row">
                    <div class="mt-2 ms-2 col-sm-3 col-md-3"><img class="userImg d-block rounded-circle mb-2 img-fluid" src = "./upload/userImages/${notifications[i][`path`]}" alt="${notifications[i][`altText`]}" />
                    </div>
                    <div class="toast-body col-sm-7 col-md-8"><a href="profile.php?u=${notifications[i]['userSrc']}"><strong>${notifications[i]['username']}</strong></a>${modalArray[notifications[i][`type`]][2]}<strong>${notifications[i]['content']}</strong></div>
                </div>
            </div>`;
            result += str;
        }
    } else {
        result = `
        <p class="text-center fs-md">Nothing to show</p>`;
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
    let totCount;

    axios.get('api/api-get-notification.php').then(response => {
        //console.log(response);
        let notificationNewComment = [];
        let notificationNewFollower = [];
        let notificationNewLike = [];
        let notificationNewPostFeed = [];

        for(let i=0; i < response.data.length; i++){
            switch (response.data[i]['type']) {
                case 'NCOMMENT':
                    notificationNewComment.push(response.data[i]);
                    break;
                
                case 'NFOLLOWER':
                    notificationNewFollower.push(response.data[i]);
                    break;
                
                case 'NLIKECOMMENT':
                    notificationNewLike.push(response.data[i]);
                    break;
                
                case 'NLIKEPOST':
                    notificationNewLike.push(response.data[i]);
                    break;

                case 'NPOSTFEED':
                    notificationNewPostFeed.push(response.data[i]);
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