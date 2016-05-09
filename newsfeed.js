/*
API Cheat Sheet
Images from API are returned in the following format:
Caption:  imageURLS[0][0].caption
Image:   imageURLs[0][0]['media-metadata'][i].url


 */
var genre;

$(document).ready(function(data){
    myFeed(1, 'home');
});

function switchTimeSpan(timespan){
    if(genre == 'home')
        getPreferenceFeed(timespan)
    else
        myFeed(timespan, genre);
}
function getMoneyFeed(timespan){
    genre = "money";
    handleTimeSpanHeader(timespan);
    $('#newsFeed').contents().remove();
    var url1 = "https://api.nytimes.com/svc/mostpopular/v2/mostviewed/business/";
    var url2 = ".json?offset=0&api-key=a648f7481f5489ed7d2b9a28ca880fbd%3A4%3A75040868";
    var finalURL = url1 + timespan + url2;
    $.getJSON(finalURL, function (data) {
        printFeed(data);
        //console.log(data.results);
        //dataResult = data.results;
    });
}
function getPoliticsFeed(timespan){
    genre = "politics";
    handleTimeSpanHeader(timespan);
    $('#newsFeed').contents().remove();
    var url1 = "https://api.nytimes.com/svc/mostpopular/v2/mostviewed/politics/";
    var url2 = ".json?offset=0&api-key=a648f7481f5489ed7d2b9a28ca880fbd%3A4%3A75040868";
    var finalURL = url1 + timespan + url2;
    $.getJSON(finalURL, function (data) {
        printFeed(data);
        //console.log(data.results);
        //dataResult = data.results;
    });
}
function getSportsFeed(timespan){
    genre = "sports";
    handleTimeSpanHeader(timespan);
    $('#newsFeed').contents().remove();
    var url1 = "https://api.nytimes.com/svc/mostpopular/v2/mostviewed/sports/";
    var url2 = ".json?offset=0&api-key=a648f7481f5489ed7d2b9a28ca880fbd%3A4%3A75040868";
    var finalURL = url1 + timespan + url2;
    $.getJSON(finalURL, function (data) {
        printFeed(data);
        //console.log(data.results);
        //dataResult = data.results;
    });
}
function getTechnologyFeed(timespan){
    genre = "technology";
    handleTimeSpanHeader(timespan);
    $('#newsFeed').contents().remove();
    var url1 = "https://api.nytimes.com/svc/mostpopular/v2/mostviewed/technology/";
    var url2 = ".json?offset=0&api-key=a648f7481f5489ed7d2b9a28ca880fbd%3A4%3A75040868";
    var finalURL = url1 + timespan + url2;
    $.getJSON(finalURL, function (data) {
        printFeed(data);
        //console.log(data.results);
        //dataResult = data.results;
    });
}

function getPreferenceFeed(timespan){
    genre = "home";
    handleTimeSpanHeader(timespan);
    $('#newsFeed').contents().remove();
    var url1 = "https://api.nytimes.com/svc/mostpopular/v2/mostviewed/sports/";
    var url2 = ".json?offset=0&api-key=a648f7481f5489ed7d2b9a28ca880fbd%3A4%3A75040868";
    var finalURL = url1 + timespan + url2;
    $.getJSON(finalURL, function (data) {
        printFeed(data);
        //console.log(data.results);
        //dataResult = data.results;
    });
}

function myFeed(timespan, genre) {
    handleTimeSpanHeader(timespan);
    $('#newsFeed').contents().remove();
    var finalFeed = ""
    switch (genre){
        case 'home':
            $.getJSON('getPrefs.php', function (data) {
                var myPrefs = data;
                if (myPrefs[0].money == 1) {
                    getMoneyFeed(timespan);
                }
                if (myPrefs[0].politics == 1) {
                    getPoliticsFeed(timespan);
                }
                if (myPrefs[0].sports == 1) {
                    getSportsFeed(timespan);
                }
                if (myPrefs[0].technology == 1) {
                    getTechnologyFeed(timespan);
                }
            });
            break;
        case 'money':
            getMoneyFeed(timespan);
            break;
        case 'politics':
            getPoliticsFeed(timespan);
            break;
        case 'sports':
            getSportsFeed(timespan);
            break;
        case 'technology':
            getTechnologyFeed(timespan);
            break;
    }
    //console.log(finalFeed);
    //printFeed(finalFeed);
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

function printFeed (data) {
    //console.log(data);
    var maxArticles = 20;
    var maxRowLength = 4;
    var rowCount = 0;
    var dataResults = data.results;
    var title, imageURL, abstract, url;
    var articleHTML = "";
    for (i = 0; i < maxArticles; ++i) {
        //start new row
        if (rowCount == 0)
            articleHTML += "<div class='row'>";

        url = dataResults[i].url;
        title = dataResults[i].title;
        imageURL = dataResults[i].media;
        abstract = dataResults[i].abstract;
        if(imageURL[0] !== undefined) {
            var imgSrc = imageURL[0]['media-metadata'][1]['url'];
            var caption = imageURL[0].caption;
        }
        abstract = dataResults[i].abstract;
        articleHTML += "<div class ='newsFeedArticle col-md-3'>" +
            "<img src=" + imgSrc + " class='newsFeedImage' alt='" + caption + "'></img>" +
                // "<p class='caption simple-caption'>" + caption + "</p>" +
            "<a href=" + url + "><h2> " + title + "</h2></a>" +
            "<p>" + abstract + "</p></div>";
        //articleHTML += "</div>";
        ++rowCount;
        //close row div
        if (rowCount == 4) {
            articleHTML += "</div>";
            rowCount = 0;
        }
    }
    $('#newsFeed').append(articleHTML);
}