# Dolby-Conference PHP Sites NO CODE EMBED
Dolby Conference , Your Site, Your Keys, NO CODE
This allow you to quickly test Dolby CConference and Realtime Streaming to an large audience with No Coding.


Perfect for sites that are already using WordPress!!

This is using Git HUb React Build and can be opened under the demos settings
https://github.com/dolbyio-samples/comms-conference-app

Steps
Create your Dolby.io account.
1. Select Communicastion & Media Tab
2. On the Left>Select API Keys

You will need your AppKey and App Secret

Download the Confernce Folder and place it on your PHP enable site.
https://YOUR_WEB_SITE.com/conference/

Update the Appkey and App Secret located in the api/keys/capikeys.php file.

Start hosting the confernece on your site

Included is the API Calls to publish your confernece to a large audience.
You will want update the api/keys/sapi/sapikeys.php with your Streaming API Key.

1. On the api/publishing.php update the following.

$streamName = "YOUR_STREAM_NAME";
$publishingToken = "YOUR_PUBLISHING_TOKEN";

Once your conference is live you can start publishing the confernece in with Dolby Realtime Streaming 
Open this URL https:/YOUR_WEB_SITE.com/conference/api/publish.php
Open your viewer link from the Dolby Real Time Streaming Portal.

https://viewer.millicast.com/?streamId=accountID/StreamName 
StreamName should math the name created in your conference/api/publish.php file.

You can stop the live stream.
Open this URL https:/YOUR_WEB_SITE.com/conference/api/stop.php

NOTES.
For iOs iPhone use Safari. Join Room then enable camera.
Chrome on iOS will have error.




