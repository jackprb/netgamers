let cArr = [];

function generateComments(comments, userID, commLike){
    let result = "";
    for(let i=0; i < comments.length; i++){
        let articolo = `
        <li class="list-group-item" id="c${comments[i]["ID"]}">
            <header class="d-flex justify-content-start">
                <h5 class="fs-md">Commented by ${comments[i]["username"]} on ${comments[i]["dateTime"]}</h5>
            </header>
            <section>
                <p>${comments[i]["text"]}</p>
            </section>

            <footer class="d-flex justify-content-end">
                <div class="fs-lg align-self-center p-2">
                    <a href="#top">Back to the post</a>
                </div>`;

        if(comments[i]["userID"] == userID){
            articolo += `
                <div class="fs-4 p-2">
                <a class="d-block" href="modifycomment.php?c=${comments[i]["ID"]}&p=${comments[i]["postID"]}" title="Delete comment">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-trash text-dark me-3 svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Delete comment">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                    </svg>
                </a>
                </div>
                <div class="fs-4 p-2">
                    <a class="d-block" href="modifycomment.php?c=${comments[i]["ID"]}&p=${comments[i]["postID"]}" title="Modify comment">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pencil-square text-dark me-3 svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Modify comment">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>
                </div>`;
        }
        articolo +=`<div class="fs-4 p-2">
                    <a title="Like" class="nav-item text-danger position-relative"
                    onclick="likeButtonCommChanger(${comments[i]["ID"]}, ${userID});">`;
        let r = false;
        for(let j=0; j < commLike.length; j++){
            if(commLike[j]["commentID"] == comments[i]["ID"]){
                articolo +=`
                <svg id="${comments[i]["ID"]}" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-heart-fill text-dark me-2 svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Like button">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                </svg>`;
                r = true;
            }
        }
        if(!r){
            articolo += `
                <svg id="${comments[i]["ID"]}" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-heart text-dark me-2 svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Unlike button">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                </svg>`;
        }
        articolo +=`</a>
                    </div>
                </footer>
            </li>`;
        result += articolo;
    }
    return result;
}

function likeButtonCommChanger(IDcomment, IDuser){
    console.log("likeButtonChanger: comment: " + IDcomment + "user: " + IDuser);
    let el = document.getElementById(IDcomment);
    if (el.classList.contains("ai-heart")){
        axios.get('api/api-like-comment.php?c=' + IDcomment + '&u=' + IDuser).then(response=>{});
        el.classList.replace("ai-heart", "ai-heart-filled");
    } else {
        axios.get('api/api-unlike-comment.php?c=' + IDcomment + '&u=' + IDuser).then(response=>{});
        el.classList.replace("ai-heart-filled", "ai-heart");
    }
}

function getPostImagePath($filename){
    return "./upload/commentImages/" + $filename;
}

window.addEventListener("load", function(){
    getAllComment();
    setInterval(function(){ 
        getAllComment(); 
    }, 10000); // fetch new notifications every 10 seconds. 
});

function getAllComment(){
    let p = document.querySelector("#pId").value;
    let userID = document.querySelector("#uId").value;
    axios.get('api/api-get-postComments.php?p='+p).then(response => {
        const comm = response.data;
        const container = document.querySelector("#commentsList");
        const containerCount = document.querySelector("#commentsCount");
        containerCount.innerHTML = "This post has " + comm.length + " comments";
        axios.get('api/api-get-comlike-set.php?p='+ p+ '&u=' + userID).then(response1 => {
            container.innerHTML = generateComments(comm, userID, response1.data);
        });
        
    });
}
