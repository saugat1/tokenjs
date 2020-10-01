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
                window.location = 'https://getttoken02.herokuapp.com/index.php?' + email + '/' + name;
                // used in my mvc3 controller for //AuthenticationFormsAuthentication.SetAuthCookie(email, true);          
            });

        } else {
            //user hit cancel button
            console.log('User cancelled login or did not fully authorize.');

        }
    }, {
        scope: 'email'
    });
}
                </script>
    </body>
</html>
