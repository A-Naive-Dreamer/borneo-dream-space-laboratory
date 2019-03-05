var app = angular.module('bdsl', [])

app.constant('BACKGROUNDS_PATH', 'http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/backgrounds/')
app.constant('WEB_COMPONENTS', 'http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/')
app.constant('HEADER', angular.element('header'))
app.constant('BACKGROUNDS', angular.element('#backgrounds'))
app.constant('BACKGROUND_NAV_1', angular.element('.background-navs:nth-child(1)'))
app.constant('BACKGROUND_NAV_2', angular.element('.background-navs:nth-child(2)'))
app.constant('TITLE', angular.element('#title'))
app.constant('YOUR_IMAGE', angular.element('#your-image'))
app.constant('LIKE_ARTICLE', angular.element('#like-article'))
app.constant('DISLIKE_ARTICLE', angular.element('#dislike-article'))
app.constant('BACKGROUNDS_SOURCE', [])
app.constant('BUTTONS_PATH', [])
app.constant('COMMENTATOR_PICTURES_PATH', [])

app.value('slidePointer', 0)
app.value('slide', undefined)
app.value('commentatorPicturePointer', 0)
app.value('x', 0)
app.value('navButton', undefined)

app.controller('controller1', function($scope, $interval, $http, BACKGROUNDS_SOURCE, BACKGROUNDS_PATH, BUTTONS_PATH,
    WEB_COMPONENTS, HEADER, BACKGROUNDS, BACKGROUND_NAV_1, BACKGROUND_NAV_2, YOUR_IMAGE,
    LIKE_ARTICLE, DISLIKE_ARTICLE, BACKGROUNDS_SOURCE, BUTTONS_PATH, COMMENTATOR_PICTURES_PATH, slidePointer, slide,
    commentatorPicturePointer, x, navButton) {
    $scope.btnImage1 = $scope.btnImage2 = ''

    $scope.reset = function() {
        YOUR_IMAGE.attr('src', COMMENTATOR_PICTURES_PATH[0])

        $scope.commentatorPicture = COMMENTATOR_PICTURES_PATH[0]
        $scope.name = ''
        $scope.eMail = ''
        $scope.comment = ''

        commentatorPicturePointer = 0
    }

    $scope.setPages = function() {
        BACKGROUNDS_SOURCE.push(BACKGROUNDS_PATH + '1.jpg')
        BACKGROUNDS_SOURCE.push(BACKGROUNDS_PATH + '2.jpg')
        BACKGROUNDS_SOURCE.push(BACKGROUNDS_PATH + '3.jpg')
        BACKGROUNDS_SOURCE.push(BACKGROUNDS_PATH + '4.jpg')
        BACKGROUNDS_SOURCE.push(BACKGROUNDS_PATH + '5.jpg')

        BACKGROUND_NAV_1.css('top', (window.innerHeight - 43) / 2)
        BACKGROUND_NAV_2.css('top', (window.innerHeight - 43) / 2)

        BUTTONS_PATH.push(WEB_COMPONENTS + 'buttons/like-2.png')
        BUTTONS_PATH.push(WEB_COMPONENTS + 'buttons/like-hover-2.png')
        BUTTONS_PATH.push(WEB_COMPONENTS + 'buttons/dislike-2.png')
        BUTTONS_PATH.push(WEB_COMPONENTS + 'buttons/dislike-hover-2.png')

        COMMENTATOR_PICTURES_PATH.push(WEB_COMPONENTS + 'commentator-pictures/1.png')
        COMMENTATOR_PICTURES_PATH.push(WEB_COMPONENTS + 'commentator-pictures/2.png')
        COMMENTATOR_PICTURES_PATH.push(WEB_COMPONENTS + 'commentator-pictures/3.png')
        COMMENTATOR_PICTURES_PATH.push(WEB_COMPONENTS + 'commentator-pictures/4.png')
        COMMENTATOR_PICTURES_PATH.push(WEB_COMPONENTS + 'commentator-pictures/5.png')

        HEADER.css('height', window.innerHeight - 57 + 'px')

        BACKGROUNDS.css('background-image', 'url(' + BACKGROUNDS_SOURCE[slidePointer] + ')')

        $scope.btnImage1 = BUTTONS_PATH[0]
        $scope.btnImage2 = BUTTONS_PATH[2]
        $scope.commentatorPicture = COMMENTATOR_PICTURES_PATH[commentatorPicturePointer]

        if(!(angular.isDefined(navButton))) {
            for(x = 0; x < BACKGROUNDS_SOURCE.length; ++x) {
                navButton = document.createElement('div')

                navButton.className = 'nav-buttons'
                navButton.setAttribute('data-ng-click', 'toBackground(' + x + ')')

                BACKGROUNDS.append(navButton)
            }

            ++slidePointer
        }
    }

    $scope.moveSlide = function() {
        if(angular.isDefined(slide)) return

        slide = $interval(function() {
            if(slidePointer >= BACKGROUNDS_SOURCE.length) slidePointer = 0

            BACKGROUNDS.css('background-image', 'url(' + BACKGROUNDS_SOURCE[slidePointer] + ')')

            ++slidePointer;
        }, 5000)
    }

    $scope.destroyInterval = function() {
        if(angular.isDefined(slide)) {
            $interval.cancel(slide)

            slide = undefined
        }
    }

    $scope.previousBackground = function() {
        --slidePointer

        if(slidePointer < 0) slidePointer = BACKGROUNDS_SOURCE.length - 1

        BACKGROUNDS.css('background-image', 'url(' + BACKGROUNDS_SOURCE[slidePointer] + ')')
    }

    $scope.nextBackground = function() {
        ++slidePointer;

        if(slidePointer >= BACKGROUNDS_SOURCE.length) slidePointer = 0;

        BACKGROUNDS.css('background-image', 'url(' + BACKGROUNDS_SOURCE[slidePointer] + ')')
    }

    $scope.toBackground = function(x) {
        if(x >= 0 && x < BACKGROUNDS_SOURCE.length) {
            slidePointer = x

            BACKGROUNDS.css('background-image', 'url(' + BACKGROUNDS_SOURCE[slidePointer] + ')')
        }
    }

    $scope.next = function() {
        if(commentatorPicturePointer >= COMMENTATOR_PICTURES_PATH.length) commentatorPicturePointer = 0

        YOUR_IMAGE.attr('src', COMMENTATOR_PICTURES_PATH[commentatorPicturePointer])

        $scope.commentatorPicture = COMMENTATOR_PICTURES_PATH[commentatorPicturePointer]

        ++commentatorPicturePointer
    }

    $scope.previous = function() {
        if(commentatorPicturePointer < 0) commentatorPicturePointer = COMMENTATOR_PICTURES_PATH.length - 1

        YOUR_IMAGE.attr('src', COMMENTATOR_PICTURES_PATH[commentatorPicturePointer])

        $scope.commentatorPicture = COMMENTATOR_PICTURES_PATH[commentatorPicturePointer]

        --commentatorPicturePointer
    }

    $scope.change1 = event => angular.element(event.target).children('img:first').attr('src', BUTTONS_PATH[1])

    $scope.change2 = event => angular.element(event.target).children('img:first').attr('src', BUTTONS_PATH[0])

    $scope.change3 = event => angular.element(event.target).children('img:first').attr('src', BUTTONS_PATH[3])

    $scope.change4 = event => angular.element(event.target).children('img:first').attr('src', BUTTONS_PATH[2])

    $scope.likeArticle = article_id => $http.post('http://localhost/borneo-dream-space-laboratory/CodeIgniter-3.1.9/index.php/articles/like_article/' + article_id)
        .then(function(response) {
            LIKE_ARTICLE.text(response.data)
    })

    $scope.dislikeArticle = article_id => $http.post('http://localhost/borneo-dream-space-laboratory/CodeIgniter-3.1.9/index.php/articles/dislike_article/' + article_id)
        .then(function(response) {
            DISLIKE_ARTICLE.text( response.data)
    })

    $scope.likeComment = (a, b, c) => $http.post('http://localhost/borneo-dream-space-laboratory/CodeIgniter-3.1.9/index.php/articles/like_comment/' + a + '/' + b)
        .then(function(response) {
            angular.element('#like-' + c).text(response.data)
    })

    $scope.dislikeComment = (a, b, c) => $http.post('http://localhost/borneo-dream-space-laboratory/CodeIgniter-3.1.9/index.php/articles/dislike_comment/' + a + '/' + b)
        .then(function(response) {
            angular.element('#dislike-' + c).text(response.data)
    })
})
