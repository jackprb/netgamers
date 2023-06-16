function generateComments(comments){
    let result = "";
//`text`, `dateTime`, users.username
    for(let i=0; i < comments.length; i++){
        let articolo = `
        <article>
            <header>
                <h2>${comments[i]["username"]} - ${comments[i]["dateTime"]}</h2>
                
            </header>
            <section>
                <p>${comments[i]["text"]}</p>
            </section>
            <footer>
                <a href="post.php?p=${comments[i]["postID"]}">Back to the post</a>
            </footer>
        </article>
        `;
        result += articolo;
    }
    return result;
}

function getPostImagePath($filename){
    return "./upload/commentImages/" + $filename;
}

window.addEventListener("load", function(){
    getComments();
});

function getComments(){
    axios.get('api/api-get-postComments.php').then(response => {
        const container = document.querySelector("#commentsList");
        const containerCount = document.querySelector("#commentsCount");
        containerCount.innerHTML = "This post has " + response.data.length + " comments";
        console.log(response.data.length);
        console.log(generateComments(response.data));
        container.innerHTML = generateComments(response.data);
    });
}
