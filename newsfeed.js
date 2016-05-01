/*
API Cheat Sheet
Images from API are returned in the following format:
Caption:  imageURLS[0][0].caption
Image:   imageURLs[0][0]['media-metadata'][i].url


 */

var myNewsData = [];
$(document).ready(function(data){
    myFeed(1);
});

var myFeed = function(timeSpan) {
    handleTimeSpanHeader(timeSpan);
    $('#newsFeed').contents().remove();
    $.getJSON('getPrefs.php', function(data) {
        var myPrefs = data;

        myFeed.newsFeed = function (timeSpan) {
            var url1 = "https://api.nytimes.com/svc/mostpopular/v2/mostviewed/national/";
            var url2 = ".json?offset=0&api-key=a648f7481f5489ed7d2b9a28ca880fbd%3A4%3A75040868";
            var finalURL = url1 + timeSpan + url2;
            $.getJSON(finalURL, function (data) {
                printFeed(data);

            });
        };
        myFeed.moneyFeed = function (timeSpan) {
            var url1 = "https://api.nytimes.com/svc/mostpopular/v2/mostviewed/business/";
            var url2 = ".json?offset=0&api-key=a648f7481f5489ed7d2b9a28ca880fbd%3A4%3A75040868";
            var finalURL = url1 + timeSpan + url2;
            $.getJSON(finalURL, function (data) {
                printFeed(data);
            });
        };
        myFeed.politicsFeed = function (timeSpan) {
            var url1 = "https://api.nytimes.com/svc/mostpopular/v2/mostviewed/politics/";
            var url2 = ".json?offset=0&api-key=a648f7481f5489ed7d2b9a28ca880fbd%3A4%3A75040868";
            var finalURL = url1 + timeSpan + url2;
            $.getJSON(finalURL, function (data) {
                printFeed(data);
            });
        };
        myFeed.sportsFeed = function (timeSpan) {
            var url1 = "https://api.nytimes.com/svc/mostpopular/v2/mostviewed/sports/";
            var url2 = ".json?offset=0&api-key=a648f7481f5489ed7d2b9a28ca880fbd%3A4%3A75040868";
            var finalURL = url1 + timeSpan + url2;
            $.getJSON(finalURL, function (data) {
                printFeed(data);
            });
        };
        myFeed.technologyFeed = function (timeSpan) {
            var url1 = "https://api.nytimes.com/svc/mostpopular/v2/mostviewed/technology/";
            var url2 = ".json?offset=0&api-key=a648f7481f5489ed7d2b9a28ca880fbd%3A4%3A75040868";
            var finalURL = url1 + timeSpan + url2;
            $.getJSON(finalURL, function (data) {
                printFeed(data);
            });
        };
        if (myPrefs[0].news == 1) {
            myFeed.newsFeed(timeSpan);
        }
        if (myPrefs[0].money == 1) {
            myFeed.moneyFeed(timeSpan);
        }
        if (myPrefs[0].politics == 1) {
            myFeed.politicsFeed(timeSpan);
        }
        if (myPrefs[0].sports == 1) {
            myFeed.sportsFeed(timeSpan);
        }
        if (myPrefs[0].technology == 1) {
            myFeed.technologyFeed(timeSpan);
        }
    });
}

var handleTimeSpanHeader = function(timeSpan){
    if(timeSpan == 1){
        var timeSpanHeaderDiv = document.getElementById("newsTimeSpanHeader");
        timeSpanHeaderDiv.innerHTML = 'Daily News Feed';
    }
    if(timeSpan == 7){
        var timeSpanHeaderDiv = document.getElementById("newsTimeSpanHeader");
        timeSpanHeaderDiv.innerHTML = 'Weekly News Feed';
    }
    if(timeSpan == 30){
        var timeSpanHeaderDiv = document.getElementById("newsTimeSpanHeader");
        timeSpanHeaderDiv.innerHTML = 'Monthly News Feed'
    }
}

var printFeed = function(data){
    var dataResults = data.results;
    var titles = [];
    var imageURLs = [];
    var abstracts = [];
    var articleURL = [];
    console.log(data);
    for(i = 0; i < 3; ++i){
        articleURL[i] = dataResults[i + 5].url;
        titles[i] = dataResults[i + 5].title;
        imageURLs[i] = dataResults[i + 5].media;
        abstracts[i] = dataResults[i + 5].abstract;
    }
    for(i = 0; i < 3; ++i){
        var url = articleURL[i];
        var imgSrc = imageURLs[0][0]['media-metadata'][1].url;
        var caption = imageURLs[0][0].caption;
        var abstract = abstracts[i];
        var articleHTML = "<div class ='newsFeedArticle' style='outline: 1px black solid'><img src=" + imgSrc + "></img>" +
            "<p class='caption simple-caption'>" + caption + "</p>" +
            "<a href=" + url + "><h2> "+ titles[0] + "</h2></a>" +
            "<p>" + abstract + "</p></div>";
        $('#newsFeed').append(articleHTML);
    }
}