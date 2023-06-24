function generatePost(posts, postsLikes){
    let result = "";
    const UPLOAD_USERIMG_DIR = "./upload/userImages/";
    const UPLOAD_POSTIMG_DIR = "./upload/postImages/";

    if(posts.length == 0){ // non ci sono post da mostrare
        result = `
            <div class="card py-1 p-md-2 p-xl-3 mb-4">
                <div class="card-body">
                    <p class="text-center card-text">OOPS... There are no post to show.<br/>
                        Start following someone (<a href="search.php">search here</a>) to see their posts.
                    </p>
                </div>
            </div>`;

    } else {
        for(let i=0; i < posts.length; i++){
            let post = "";
            if(posts[i]['postImgID'] != null){ /* post CON IMMAGINE */
                post = `
                <div class="card py-1 p-md-2 p-xl-3 mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-2 justify-content-start">
                                <img class="img-fluid userImgPostHeader rounded-circle" src="${UPLOAD_USERIMG_DIR + posts[i]['userImgPath']}" alt="${posts[i]['userImgAltText']}" />
                            </div>
                            <div class="col-7 text-center justify-content-center">
                                <a class="card-title align-self-center" href="post.php?p=${posts[i]['postID']}"><h4>${posts[i]['postTitle']}</h4></a>
                            </div>
                            <div class="col-2 justify-content-end">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-center text-muted">Published on ${posts[i]['dateTimePost']} by 
                            <a href="profile.php?u=${posts[i]['userID']}">${posts[i]['username']}</a>
                        </p>
                        <div class="row align-content-center">
                            <img class="img-fluid" src="${UPLOAD_POSTIMG_DIR + posts[i]['postImgPath']}" alt="${posts[i]['postImgAltText']}" />            
                        </div>    
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="d-flex justify-content-end">
                                <a href="post.php?p=${posts[i]['postID']}" target="_blank" title="Click to see this post in a new page" class="nav-item position-relative fs-4 p-2 mx-sm-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-box-arrow-up-right text-dark me-3 svg-navbar" viewBox="0 0 16 16" role="img" aria-label="View post">
                                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                                    </svg>
                                </a>
                                <a href="#." title="Like this post" class="nav-item position-relative fs-4 p-2 mx-sm-1" onclick="likeButtonChangerP(${posts[i]["postID"]});">`;
                                let r = false;
                                for(let j=0; j < postsLikes.length; j++){
                                    if(postsLikes[j]["postID"] == posts[i]["postID"]){
                                        post +=`
                                        <svg id="${posts[i]['postID']}" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-heart-fill text-dark svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Like button">
                                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                        </svg>`;
                                        r = true;
                                    }
                                }
                                if(!r){
                                    post += `
                                        <svg id="${posts[i]['postID']}" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-heart text-dark svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Unlike button">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                        </svg>`;
                                }
                              post+=  `</a>
                            </div>
                        </div>   
                    </div>
                </div>
                `;
    
            } else { /*post SENZA IMMAGINE*/
    
                post = `
                <div class="card py-1 p-md-2 p-xl-3 mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-2 justify-content-start">
                                <img class="img-fluid userImgPostHeader rounded-circle" src="${UPLOAD_USERIMG_DIR + posts[i]['userImgPath']}" alt="${posts[i]['userImgAltText']}" />
                            </div>
                            <div class="col-7 text-center justify-content-center">
                                <a class="card-title align-self-center" href="post.php?p=${posts[i]['postID']}"><h4>${posts[i]['postTitle']}</h4></a>
                            </div>
                            <div class="col-2 justify-content-end">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-center text-muted">Published on ${posts[i]['dateTimePost']} by 
                            <a href="profile.php?u=${posts[i]['userID']}">${posts[i]['username']}</a>
                        </p>
                        <p class="text-center card-text">${posts[i]['postText']}</p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="d-flex justify-content-end">
                                <a href="#." title="Like" class="nav-item position-relative fs-4 p-2 mx-sm-1" onclick="likeButtonChangerP(${posts[i]["postID"]});">`;
                                let r = false;
                                for(let j=0; j < postsLikes.length; j++){
                                    if(postsLikes[j]["postID"] == posts[i]["postID"]){
                                        post +=`
                                        <svg id="${posts[i]['postID']}" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-heart-fill text-dark svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Like button">
                                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                        </svg>`;
                                        r = true;
                                    }
                                }
                                if(!r){
                                    post += `
                                        <svg id="${posts[i]['postID']}" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-heart text-dark svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Unlike button">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                        </svg>`;
                                }
                                post+=  `</a>
                            </div>
                        </div>   
                    </div>
                </div>
                `;
            }
            result +=  post;
        }
    }
    return result;
}

function likeButtonChangerP(postID){
    console.log("likeButtonChangerFeed: post:" + postID );
    let el = document.getElementById(postID);
    if (el.classList.contains("bi-heart")){
        axios.get('api/api-like-post.php?p='+ postID).then(response=>{
            console.log(response.data);
        });
        el.classList.replace("bi-heart", "bi-heart-fill");
        el.innerHTML = '<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>';
    } else {
        axios.get('api/api-unlike-post.php?p='+ postID).then(response=>{});
        el.classList.replace("bi-heart-fill", "bi-heart");
        el.innerHTML = '<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>';
    }
}

window.addEventListener("load", function(){
    updateFeed();

    setInterval(function() {
        updateFeed();
    }, 20000);
});

function  updateFeed(){
    axios.get('api/api-get-feed.php').then(response => {
        const container = document.getElementById("feed");
        axios.get('api/api-get-like-set.php').then(response1 => {
            console.log(response1.data);
            container.innerHTML = generatePost(response.data, response1.data);
        });
    });
}