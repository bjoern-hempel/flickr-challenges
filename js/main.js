function compare()
{
    var viewsIsa = document.getElementById('viewsIsa').textContent;
    var viewsBjoern = document.getElementById('viewsBjoern').textContent;
    var likesIsa = document.getElementById('likesIsa').textContent;
    var likesBjoern = document.getElementById('likesBjoern').textContent;
    var commentsIsa = document.getElementById('commentsIsa').textContent;
    var commentsBjoern = document.getElementById('commentsBjoern').textContent;

    if (viewsIsa > viewsBjoern){
        document.getElementById('viewsIsa').setAttribute("style", "color: #4cb576; font-weight: bold");
    }else if (viewsIsa < viewsBjoern) {
        document.getElementById('viewsBjoern').setAttribute("style", "color: #4cb576; font-weight: bold");
    }

    if (likesIsa > likesBjoern){
        document.getElementById('likesIsa').setAttribute("style", "color: #4cb576; font-weight: bold");
    }else if (likesIsa < likesBjoern) {
        document.getElementById('likesBjoern').setAttribute("style", "color: #4cb576; font-weight: bold");
    }

    if (commentsIsa > commentsBjoern){
        document.getElementById('commentsIsa').setAttribute("style", "color: #4cb576; font-weight: bold");
    }else if (commentsIsa < commentsBjoern) {
        document.getElementById('commentsBjoern').setAttribute("style", "color: #4cb576; font-weight: bold");
    }
}
