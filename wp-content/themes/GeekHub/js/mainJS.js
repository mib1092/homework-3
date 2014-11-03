
var headerServiceText = $('.course-title-js').text();
var listItemsMenuServices = $('.list-courses-js li');

listItemsMenuServices.each(function(){
    var textPageService = $(this).find('a').text();
    if(textPageService == headerServiceText) {
        $(this).addClass('current');
    }
});