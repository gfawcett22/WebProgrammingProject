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
                console.log(data);
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

function printFeed (data){
    var articlesPerGenre = 5;
    var maxRowLength = 4;
    var dataResults = data.results;
    var title,imageURL, abstract, url;
    var articleHTML = "";

    for(i = 0; i < articlesPerGenre; i++){
        //articleURL[i] = dataResults[i + 5].url;
        //titles[i] = dataResults[i + 5].title;
        //imageURLs[i] = dataResults[i + 5].media;
        //abstracts[i] = dataResults[i + 5].abstract;
    }
    for (j = 0; j < maxRowLength; ++j) {
        //start a new row
        if (j == 0)
            articleHTML += "<div class='row' />";

        for(i = 0; i < articlesPerGenre; ++i) {

            url = dataResults[i].url;
            title = dataResults[i].title;
            imageURL = dataResults[i].media;
            abstract = dataResults[i].abstract;
            var imgSrc = imageURL[0]['media-metadata'][1].url;
            var caption = imageURL[0].caption;
            abstract = dataResults[i].abstract;
            articleHTML += "<div class ='newsFeedArticle col-md-3'>" +
                "<img src=" + imgSrc + "></img>" +
                "<p class='caption simple-caption'>" + caption + "</p>" +
                "<a href=" + url + "><h2> " + title + "</h2></a>" +
                "<p>" + abstract + "</p></div>";
            $('#newsFeed').append(articleHTML);
        }
        //close the row
        if (j==3)
            articleHTML += "</div>";
    }
}