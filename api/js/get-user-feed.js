function generatePost(posts){
    let result = "";

    for(let i=0; i < posts.length; i++){
        
        if(posts[0]['img'] != null){ /* post CON IMMAGINE */
            let post = `
            <div class="card py-1 p-md-2 p-xl-3 mb-4">
                <?php require 'single-post-header.php'; ?>
                <div class="card-body">
                    <?php printDatePublished($res, $username); ?>
                    <div class="row align-content-center">
                        <img class="img-fluid" src="<?php echo UPLOAD_POSTIMG_DIR. $imgPost['path']; ?>" alt="<?php echo $imgPost['altText']; ?>"
                            data-bs-toggle="modal" data-bs-target="#modalImg" />            
                    </div>            
                </div>
                <?php require 'single-post-footer.php'; ?>
            </div>`;

        } else { /*post SENZA IMMAGINE*/

            let post = `
            <div class="card py-1 p-md-2 p-xl-3 mb-4">
                <?php require 'single-post-header.php'; ?>
                <div class="card-body">
                    <?php printDatePublished($res, $username); ?>
                    <p class="text-center card-text">
                        <?php echo $res[0]['text']; ?>
                    </p>
                </div>
                <?php require 'single-post-footer.php'; ?>
            </div>`;
        }

        let articolo = `
        <article>
            <header>
                <div>
                    <img src="${posts[i][""]}" alt="" />
                </div>
                <h2>tit${posts[i]["title"]}</h2>
                <p>p${posts[i]["nome"]} - ${posts[i]["dateTimePublished"]}</p>
            </header>
            <section>
                <p>p${posts[i]["anteprimaarticolo"]}</p>
            </section>
            <footer>
                <a href="post.php?id=${posts[i]["ID"]}">Leggi tutto</a>
            </footer>
        </article>
        `;
        result += articolo;
    }
    return result;
}

window.addEventListener("load", function(){
    updateFeed();

    setInterval(function() {
        updateFeed();
    }, 10000);
});

function  updateFeed(){
    axios.get('api/api-get-feed.php').then(response => {
        console.log(response);
        let posts = generatePost(response.data);
        const container = document.getElementById("feed");
        container.innerHTML = posts;
    });
}