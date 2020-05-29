function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
    // console.log('statusChangeCallback');
    // console.log(response);                   // The current login status of the person.
    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
          fbConnected();
    }
  }


  function checkLoginState() {               // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function(response) {   // See the onlogin handler
      statusChangeCallback(response);
    });
  }


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '3262917347051862',
      cookie     : true,                     // Enable cookies to allow the server to access the session.
      xfbml      : true,                     // Parse social plugins on this webpage.
      version    : 'v7.0'           // Use this Graph API version for this call.
    });


    FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
      statusChangeCallback(response);        // Returns the login status.
    });
  };

  
  (function(d, s, id) {                      // Load the SDK asynchronously
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

 
  function fbConnected() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    FB.api('/me', function(response) {
        let formData = new FormData()
        formData.append('id', response.id)
        formData.append('fullname', response.name)
        formData.append('isfacebook', 'Y')

        axios.post(apiUrl + 'sv-login/login', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        })
        .then((response) => {
          let setExp = (new Date(Date.now() + 1*48*3600*1000)).getTime() // 6 hour
          let usetArray = {
              data: response.data.data.id,
              exp: setExp
          }
          localStorage.setItem('_u_ss_isset', JSON.stringify(usetArray))
          localStorage.setItem('_u_ss_ison_t', true)
          document.cookie = "_u_ss_isprop=" + response.data.data.fullname;
          setTimeout("window.location.href='/login';", 100)
        })
        .catch(e => {
          console.log(e)
        })
    });
  }