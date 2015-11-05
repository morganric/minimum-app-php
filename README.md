##minimum-app-php


This article shows the minimum code required to make a video call from a browser. The application used is very simple and consists of the most basic web page with embedded JavaScript. Session provisioning is handled via an ajax call to a PHP file.

index.html
basic web page with embedded JavaScript.
session.php
PHP invoked by web page to provision session.
The files, attached to this article, can be deployed on a web server capable of serving PHP, Apache for example.

The application uses the Fusion Client javascript SDK to make a call on page load.

Provision a session suitable for anonymous calling.
Initialise UC by calling UC.start passing in the encoded session token obtained when the session was provisioned.
In the implementation of UC.onInitialised create the call, then call the Call.dial method.
Notes:

You will need to add the following web application id using the web admin UI - the-minimal-code.
Alternatively change the webAppId in session.php to match one already created.
AYou will need to change the IP address in the source files, your.server.ip.address, to match your FCSDK instance.
The curl has an option (CURLOPT_SSL_VERIFYPEER) that allows you to make the post internally (between your app server and the web gateway) over https. It's worth noting that this way is not secure, it simply handles http as https, when you don't have trust certificates established between you app server and the web gateway.
You will also need to change the domain in the provisioning JSON to match your cluster domain. If you don't know the domain value, you can get it from the FCSDK sample app as highlighted below:


The application is hard coded to make the call to destination 1001. This is one of the default numbers created when the FCSDK sample application is installed.

