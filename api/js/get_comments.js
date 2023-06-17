function generateComments(comments){
    let result = "";
//`text`, `dateTime`, users.username
    for(let i=0; i < comments.length; i++){
        let articolo = `
        <li class="list-group-item">
            <header class="justify-content-start d-flex">
                <h4>Commented by ${comments[i]["username"]} on ${comments[i]["dateTime"]}</h4>
                
            </header>
            <section>
                <p>${comments[i]["text"]}</p>
            </section>
            <footer>
                <a href="post.php?p=${comments[i]["postID"]}">Back to the post</a>
            </footer>
        </li>
        `;
        result += articolo;
    }
    return result;
}

function getPostImagePath($filename){
    return "./upload/commentImages/" + $filename;
}

window.addEventListener("load", function(){
    getAllComment();
});

function getAllComment(){
    let p = document.querySelector("#pId").value;
    axios.get('api/api-get-postComments.php?p='+p).then(response => {
        console.log(response.data);
        const container = document.querySelector("#commentsList");
        const containerCount = document.querySelector("#commentsCount");
        containerCount.innerHTML = "This post has " + response.data.length + " comments";
        console.log(response.data.length);
        console.log(generateComments(response.data));
        container.innerHTML = generateComments(response.data);
    });
}
