
var channelName='DoctorsManagementSvc';

$(document).ready(function(){
	$.get("https://www.googleapis.com/youtube/v3/channels",(
		part: 'contentDetails',
		forUsername: channelName,
		key: 'AIzaSyCGOgPesa3AqrnhMMft0FN3PxV9hEUma0k'),function(data){
			$.each(data.items, function(i,items){
				console.log(item);
			})
		)
});