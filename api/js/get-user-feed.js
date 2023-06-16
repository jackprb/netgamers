function generatePost(posts){
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
                                <img class="img-fluid userImgPostHeader" src="${UPLOAD_USERIMG_DIR + posts[i]['userImgPath']}" alt="${posts[i]['userImgAltText']}" />
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
                                    <i class="ai-external-link"></i>
                                </a>
                                <a href="#" title="Like this post" class="nav-item position-relative fs-4 p-2 mx-sm-1">
                                    <i class="ai-heart"></i>
                                </a>
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
                                <img class="img-fluid userImgPostHeader" src="${UPLOAD_USERIMG_DIR + posts[i]['userImgPath']}" alt="${posts[i]['userImgAltText']}" />
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
                                <a href="#" title="Like" class="nav-item position-relative fs-4 p-2 mx-sm-1">
                                    <i class="ai-heart"></i>
                                </a>
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

window.addEventListener("load", function(){
    updateFeed();

    setInterval(function() {
        updateFeed();
    }, 20000);
});

function  updateFeed(){
    axios.get('api/api-get-feed.php').then(response => {
        console.log(response);
        let posts = generatePost(response.data);
        const container = document.getElementById("feed");
        container.innerHTML = posts;
    });
}