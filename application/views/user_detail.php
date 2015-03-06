<div class="container">
    <h2>{username}</h2>
    <img id="profile_pic" src="http://fc05.deviantart.net/fs70/i/2011/127/e/a/homer_simpson_by_enzotoshiba-d3ftw9u.png" alt="your image" class="img-circle" width="140" height="140"/> <!-- move size to css? -->
    <!-- <input type="file" onchange="readURL(this);" accept="image/*" /> <!-- Still need to check images serverside -->
    <div>
        <h3>{displayname}</h3>
        <h4>{email}</h4>
    </div>
    <div>
        <h4>Reputation: {reputation}
            <a href="#"><i class="fa fa-thumbs-o-up"></i></a>Yeah!
            <a href="#"><i class="fa fa-thumbs-o-down"></i></a>Eh...
        </h4>
    </div>
    <div>
        <h4>Ads</h4>
        {cards}
    </div>
    <div>
        <h4>Reviews</h4>
        {reviews}
    </div>
    <form action="/user_detail/confirm" method="post">
        {frating}
        {freview}    <div id="stars" class="rating">
        <span id="1" ><i class="glyphicon glyphicon-star"></i></span>
        <span id="2" ><i class="glyphicon glyphicon-star"></i></span>
        <span id="3" ><i class="glyphicon glyphicon-star"></i></span>
        <span id="4" ><i class="glyphicon glyphicon-star"></i></span>
        <span id="5" ><i class="glyphicon glyphicon-star"></i></span>
        <!--<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>-->
    </div>{fsubmit}

    </form>

</div><!-- /.container -->

