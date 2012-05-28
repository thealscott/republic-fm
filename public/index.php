<?php 
$user = (isset($_GET['lastfm_user'])) ? $_GET['lastfm_user'] : 'agencyrepublic';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Republic FM</title>
        <meta name="apple-mobile-web-app-capable" content="yes" /> 
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />  

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
            checkTune();
        });
        setInterval(checkTune, 5000);
        
        function checkTune() {
            $.ajax({
            url: "http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=<?php echo $user; ?>&api_key=73f2eb65eb185d1941e032d24b3b9e02&format=json&limit=1",
            dataType: 'json',
            success: function(data){
                    if(data.recenttracks.track.name != null) {
                        $('h1').html(data.recenttracks.track.name);
                        $('h2').html(data.recenttracks.track.artist['#text']);
                    } 
                    else if (data.recenttracks.track[0].name != null) {
                        $('h1').html(data.recenttracks.track[0].name);
                        $('h2').html(data.recenttracks.track[0].artist['#text']);
                    }
                }     
            });
        }
        
        </script>
        
        <style>
            body {
                background:black;
                color:#cd0045;
                font-size:100%;
                font-family:'FrancoisOne', arial, helvetica, sans-serif;
                text-transform: uppercase;               
            }
            
            .wrapper {
                position:relative;
                margin:2%;
            }
            
            h1 {
                font-size:10.5em;
                margin-top:0;
                margin-bottom:0.2em;
                line-height: 1em;
            }
            
            h2 {
                font-size:7em;
                margin-top: 0;
                margin-bottom:0;
                line-height: 1em;
            }
            
            p {
                color:white;
                font-size:4em;
                margin:0;
            }
            
            /* iPads (landscape) ----------- */
            @media only screen
            and (min-device-width : 768px)
            and (max-device-width : 1024px)
            and (orientation : landscape) {
                * {font-size:80%;}                
            }
            
            /* Smartphones (portrait) ----------- */
            @media only screen
            and (max-width : 320px) {
                * {font-size:80%;}                
            }
            
            
            /* 
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            FONT-FACE
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            */

            @font-face {
                font-family: 'FrancoisOne';
                src: url('fonts/francoisone-webfont.eot');
                src: url('fonts/francoisone-webfont.eot?#iefix') format('embedded-opentype'),
                     url('fonts/francoisone-webfont.woff') format('woff'),
                     url('fonts/francoisone-webfont.ttf') format('truetype'),
                     url('fonts/francoisone-webfont.svg#FrancoisOneRegular') format('svg');
                font-weight: normal;
                font-style: normal;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <p>now playing...</p>
            <h1></h1>
            <h2></h2>
        </div>
    </body>
</html>