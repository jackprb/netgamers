function generatePost(posts){
    let result = "";

    for(let i=0; i < posts.length; i++){
        let articolo = `
        <article>
            <header>
                <div>
                    <img src="${posts[i]["imgarticolo"]}" alt="" />
                </div>
                <h2>${posts[i]["titoloarticolo"]}</h2>
                <p>${posts[i]["nome"]} - ${posts[i]["dataarticolo"]}</p>
            </header>
            <section>
                <p>${posts[i]["anteprimaarticolo"]}</p>
            </section>
            <footer>
                <a href="articolo.php?id=${posts[i]["idarticolo"]}">Leggi tutto</a>
            </footer>
        </article>
        `;
        result += articolo;
    }
    return result;
}

axios.get('../api-get-user-posts.php').then(response => {
    //console.log(response);
    let posts = generatePost(response.data);
    const container = document.querySelector("main");
    container.innerHTML = posts;
});