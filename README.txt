-----------------------------------------------------------------------------
Installing and Configuring Nginx:
-----------------------------------------------------------------------------

To install the Nginx RTMP module, follow the steps on the followong link:
https://www.leaseweb.com/labs/2013/11/streaming-video-demand-nginx-rtmp-module/

After installing the Nginx RTMP module, we need to make changes to the configuration file. Open /usr/local/nginx-streaming/conf/nginx.conf in an editor, and make the followong changes:

rtmp {
	server {
		...
		listen 9990;
		...
		}
	}

http {
	...
	server {
		listen 9991;
		...
		location /stat.xsl {
		
			root html;		# The html directory within the Nginx RTMP module directory
			}
		}
	}

Now, copy the stat.xsl file to the directory html/ as mentioned above in the configuration file.
Place some mp4 files for streaming in /var/mp4s/.
Change the mp4 filenames in dbz.php, dbz_low.php, simp.php and simp_low.php to corresponding names of the files in the /var/mp4s/ directory.

-----------------------------------------------------------------------------
Maintenance of the database:
-----------------------------------------------------------------------------

Follow the steps on this link to configure the MySQL database:
http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL

Create a MySQL database "youstream". Create a user "cs425" and grant all privileges on youstream database to this user.
Create tables "members" and "login_attepmts" as instructed in the above mentioned link.
Add columns "account"(varchar 50), "simp"(integer), and "dbz"(integer) to the table "members".
Change the password of user "cs425" to one of your choice, and edit the includes/psl-config.php file correspondingly.

-----------------------------------------------------------------------------
Running the Web Application:
-----------------------------------------------------------------------------

Copy ALL files in the Networks_Project/ folder to /var/www/html/. Make sure Apache2 server is running.
In a browser, go to "localhost/index.php". This is the Login page for the application. There will be links for visiting different pages (to which the user has access) after logging in.