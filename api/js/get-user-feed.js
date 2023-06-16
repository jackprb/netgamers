function generatePost(posts){
    let result = "";
    const UPLOAD_USERIMG_DIR = "./upload/userImages/";
    const UPLOAD_POSTIMG_DIR = "./upload/postImages/";

    for(let i=0; i < posts.length; i++){
        let post = "";
        if(posts[i]['img'] != null){ /* post CON IMMAGINE */
            post = `
            <div class="card py-1 p-md-2 p-xl-3 mb-4">
                <div class="card-header">
                    <div class="row align-content-center">
                        <div class="col-3">
                            <img class="img-fluid userImg" src="${UPLOAD_USERIMG_DIR} + $userImg['path']; ?>" alt="<?php echo $userImg['altText']; ?>" />
                        </div>
                        <div class="col-8">
                            <h4 class="card-title text-center">${posts[i]['title']}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-center text-muted">Published on ' . $res[0]['dateTimePublished'] . ' by 
                        <a href="profile.php?u='. $res[0]['userID'] .'">'. $username[0]['username'] .'</a>
                    </p>
                    <p class="text-center card-text">
                        <?php echo $res[0]['text']; ?>
                    </p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="d-flex justify-content-end">
                            <a href="#" title="View text content" class="nav-item position-relative fs-4 p-2 mx-sm-1" data-bs-toggle="modal" data-bs-target="#modalText" >
                                <i class="ai-note"></i>
                            </a>
                            <a href="#" title="Like" class="nav-item position-relative fs-4 p-2 mx-sm-1">
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
                    <div class="row align-content-center">
                        <div class="col-3">
                            <img class="img-fluid userImg" src="${UPLOAD_USERIMG_DIR} + $userImg['path']; ?>" alt="$userImg['altText']" />
                        </div>
                        <div class="col-8">
                            <h4 class="card-title text-center">${posts[i]['title']}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-center text-muted">Published on ${posts[i]['dateTimePublished']} by 
                        <a href="profile.php?u='. ${posts[i]['userID']}">username</a>
                    </p>
                    <p class="text-center card-text">${posts[i]['text']}</p>
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