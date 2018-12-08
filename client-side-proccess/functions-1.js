const BACKGROUNDS_PATH = 'http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/backgrounds/',
    HEADER = document.getElementsByTagName('header')[0],
    BACKGROUNDS = document.getElementById('backgrounds'),
    BACKGROUND_NAVS = document.getElementsByClassName('background-navs'),
    TITLE = document.getElementById('title'),
    YOUR_IMAGE = document.getElementById('your-image'),
    NAME = document.getElementById('name'),
    E_MAIL = document.getElementById('eMail'),
    COMMENT = document.getElementById('comment'),
    COMMENTATOR_PICTURE = document.getElementById('commentator-picture'),
    LIKE_ARTICLE = document.getElementById('like-article'),
    DISLIKE_ARTICLE = document.getElementById('dislike-article'),
    BACKGROUNDS_SOURCE = [],
    WEB_COMPONENTS = 'http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/',
    BUTTONS_PATH = [
        WEB_COMPONENTS + 'buttons/like-2.png',
        WEB_COMPONENTS + 'buttons/like-hover-2.png',
        WEB_COMPONENTS + 'buttons/dislike-2.png',
        WEB_COMPONENTS + 'buttons/dislike-hover-2.png'
    ],
    COMMENTATOR_PICTURES_PATH = [
        WEB_COMPONENTS + 'commentator-pictures/1.png',
        WEB_COMPONENTS + 'commentator-pictures/2.png',
        WEB_COMPONENTS + 'commentator-pictures/3.png',
        WEB_COMPONENTS + 'commentator-pictures/4.png',
        WEB_COMPONENTS + 'commentator-pictures/5.png'
    ];

var slide = undefined,
    slidePointer = 0,
    commentatorPicturePointer = 0;

var path = location.protocol + "//" + location.hostname + location.pathname;
var image =  [];
var x = 0;
var search;
var transition = 0;
var kategori;

function changeBackground() {
    if(slidePointer < BACKGROUNDS_SOURCE.length) {
        BACKGROUNDS.style.backgroundImage = 'url(' + BACKGROUNDS_SOURCE[slidePointer] + ')';
    } else {
        slidePointer = 0;

        BACKGROUNDS.style.backgroundImage = 'url(' + BACKGROUNDS_SOURCE[slidePointer] + ')';
    }

    ++slidePointer;
}

function toBackground(x) {
    if(x >= 0 && x < BACKGROUNDS_SOURCE.length) {
        BACKGROUNDS.style.backgroundImage = 'url(' + BACKGROUNDS_SOURCE[slidePointer] + ')';
    }
}

function nextBackground() {
    ++slidePointer;

    if(slidePointer >= BACKGROUNDS_SOURCE.length) {
        slidePointer = 0;
    }

    BACKGROUNDS.style.backgroundImage = 'url(' + BACKGROUNDS_SOURCE[slidePointer] + ')';
}

function previousBackground() {
    --slidePointer;

    if(slidePointer < 0) {
        slidePointer = BACKGROUNDS_SOURCE.length - 1;
    }

    BACKGROUNDS.style.backgroundImage = 'url(' + BACKGROUNDS_SOURCE[slidePointer] + ')';
}

function setPages() {
    BACKGROUNDS_SOURCE.push(BACKGROUNDS_PATH + '1.jpg');
    BACKGROUNDS_SOURCE.push(BACKGROUNDS_PATH + '2.jpg');
    BACKGROUNDS_SOURCE.push(BACKGROUNDS_PATH + '3.jpg');
    BACKGROUNDS_SOURCE.push(BACKGROUNDS_PATH + '4.jpg');
    BACKGROUNDS_SOURCE.push(BACKGROUNDS_PATH + '5.jpg');

    HEADER.style.height  = window.innerHeight - 57 + 'px';

    BACKGROUND_NAVS[0].style.top = (window.innerHeight - 57 - 43) / 2 + 'px';
    BACKGROUND_NAVS[1].style.top = (window.innerHeight - 57 - 43) / 2 + 'px';

    for(let x = 0; x < BACKGROUNDS_SOURCE.length; ++x) {
        backgrounds.innerHTML += '<div class="nav-buttons" onclick="toBackground(' + x + ')"></div>';
    }

    BACKGROUNDS.style.backgroundImage = 'url(' + BACKGROUNDS_SOURCE[slidePointer] + ')';

    ++slidePointer;

    slide = setInterval(changeBackground, 3000);
}

function reset() {
    YOUR_IMAGE.src = COMMENTATOR_PICTURES_PATH[0];
    COMMENTATOR_PICTURE.value = COMMENTATOR_PICTURES_PATH[0];
    NAME.value = '';
    E_MAIL.value = '';
    COMMENT.value = '';

    commentatorPicturePointer = 0;
}

/*function analyze() {
    let CommentatorPictureValue = COMMENTATOR_PICTURE.value,
        nameValue = NAME.value,
        eMailValue = E_MAIL.value,
        commentValue = COMMENT.value,
        eMailPattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
        error = '';

    if(nameValue === '') {
        error += 'Kolom nama belum diisi!;';
    }

    if(eMailValue === '') {
        error += 'Kolom email belum diisi!;\n';
    } else if (!eMailPattern.test(eMailValue)) {
        error += 'Email tidak valid!;\n';
    }

    if(commentValue === '') {
        error += 'Kolom komentar belum diisi!;\n';
    }

    if(error !== "") {
        window.alert(error);
        return false;
    }

    reset()

    var ajax = new XMLHttpRequest();
    var comment = "../../server_proccess/comment_proccessor.php?foto=" + foto + "&nama=" + nama + "&email=" + email + "&komentar=" + komentar +
    "&path=" + path;

    ajax.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            var element = document.createElement("table");
            element.innerHTML = ajax.responseText;
            document.getElementById("comment_list").appendChild(element);
            document.getElementById('comment_list').style.display = 'block';
        }
    };

    ajax.open("GET", comment, true);
    ajax.send();
}

function analyze2() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    var error = "";

    if(innerWidth > 768) {
        if(username === "") {
            error += "<div class='warning'>Kolom username belum diisi!</div>";
        }

        if(password === "") {
            error += "<div class='warning'>Kolom password belum diisi!</div>";
        }

        if(error !== "") {
            createAlertBox("warning", error);
            return false;
        }
    } else {
        if(username === "") {
            error += "Kolom username belum diisi!;\n";
        }

        if(password === "") {
            error += "Kolom password belum diisi!;\n";
        }

        if(error !== "") {
            window.alert(error);
            return false;
        }
    }

    reset();

    var ajax = new XMLHttpRequest();
    ajax.open("POST", "../../server_proccess/login_2.php");
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    var request = "kategori=" + kategori + "&username=" + username + "&password=" + password;
    ajax.send(request);
}

function increase() {
    transition += 10;
    document.getElementById("search_form").style.width = transition + "px";

    if(transition === 160) {
        clearInterval(search);
    }
}

function decrease() {
    transition -= 20;
    document.getElementById("search_form").style.width = transition + "px";

    if(transition === 0) {
        clearInterval(search);
    }
}

function open_form() {
    if(document.getElementById("search_form").style.width !== "160px") {
        document.getElementById("search_form").style.display = "inline-block";
        search = setInterval(increase, 1);
    } else if (document.getElementById("search_form").style.width === "160px" && document.getElementById("search_form").value === "") {
        search = setInterval(decrease, 1);
    } else {
        var keyword = "../../page/search_article/search_article.php?keyword=" +  document.getElementById("search_form").value;
        search = setInterval(decrease, 1);
        document.getElementById("search_form").value = "";
        open(keyword);
    }
}*/

function previous() {
    --commentatorPicturePointer;

    if(commentatorPicturePointer < 0) {
        commentatorPicturePointer = COMMENTATOR_PICTURES_PATH.length - 1;
    }

    YOUR_IMAGE.src = COMMENTATOR_PICTURES_PATH[commentatorPicturePointer];
    COMMENTATOR_PICTURE.value = YOUR_IMAGE.src;
}

function next() {
    ++commentatorPicturePointer;

    if(commentatorPicturePointer >= COMMENTATOR_PICTURES_PATH.length) {
        commentatorPicturePointer = 0;
    }

    YOUR_IMAGE.src = COMMENTATOR_PICTURES_PATH[commentatorPicturePointer];
    COMMENTATOR_PICTURE.value = YOUR_IMAGE.src;
}

function change1(a) {
    a.children[0].src = BUTTONS_PATH[1];
}

function change2(a) {
    a.children[0].src = BUTTONS_PATH[0];
}

function change3(a) {
    a.children[0].src = BUTTONS_PATH[3];
}

function change4(a) {
    a.children[0].src = BUTTONS_PATH[2];
}

function likeArticle($article_id) {
    let ajax = new XMLHttpRequest(),
        likeArticle = 'http://localhost/borneo-dream-space-laboratory/CodeIgniter-3.1.9/index.php/articles/like_article/' + $article_id;

    ajax.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            LIKE_ARTICLE.innerHTML = ajax.responseText;
        }
    };

    ajax.open('POST', likeArticle, true);
    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.send();
}

function dislikeArticle($article_id) {
    let ajax = new XMLHttpRequest(),
        dislikeArticle = 'http://localhost/borneo-dream-space-laboratory/CodeIgniter-3.1.9/index.php/articles/dislike_article/' + $article_id;

    ajax.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            DISLIKE_ARTICLE.innerHTML = ajax.responseText;
        }
    };

    ajax.open('POST', dislikeArticle);
    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.send();
}

function likeComment(a, b, c) {
    location.assign('http://localhost/borneo-dream-space-laboratory/CodeIgniter-3.1.9/index.php/articles/like_comment/' + a + '/' + b + '/' + c);
}

function dislikeComment(a, b, c) {
    location.assign('http://localhost/borneo-dream-space-laboratory/CodeIgniter-3.1.9/index.php/articles/dislike_comment/' + a + '/' + b + '/' + c);
}
