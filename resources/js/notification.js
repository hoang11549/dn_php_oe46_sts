var notificationsWrapper   = $('.dropdown-notifications');
    var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('i[data-count]');
    var notificationsCount     = parseInt(notificationsCountElem.data('count'));
    var notifications          = notificationsWrapper.find('ul.dropdown-menu');
        var pusher = new Pusher('494e61881687d45df927', {
            encrypted: true,
            cluster: "ap1"
        });
        var channel = pusher.subscribe('NotificationEvent');
        var id = $('meta[name="video"]').attr("content");
        channel.bind("send-message-", function(data) {
            const idAuth = new Number(id);
            for(let i=0; i<data.listUser.length;i++){
                const idUser = new Number(data.listUser);
                if(idAuth-idUser==0){
                    var existingNotifications = notifications.html();
                    var newNotificationHtml = `
                    <li class="notification active">
                        <div class="media">
                            <div class="media-left">   
                            </div>
                            <div class="media-body">
                            <strong class="notification-title"> bạn đã được ${data.Auth} 
                            đưa vào khóa học:${data.nameCourse}  </strong>
                            <div class="notification-meta">
                                <small class="timestamp">about a minute ago</small>
                            </div>
                            </div>
                        </div>
                    </li>
                    `;
                    notifications.html(newNotificationHtml + existingNotifications);
                    notificationsCount += 1;
                    notificationsCountElem.attr('data-count', notificationsCount);
                    notificationsWrapper.find('.notif-count').text(notificationsCount);
                    notificationsWrapper.show();
                    break;
                }
            }
        });
