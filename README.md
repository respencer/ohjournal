# OhJournal

An open-source replacement for the wonderful OhLife (www.ohlife.com) online diary/journal service.

- Created by: Peter Sobot <hi@petersobot.com>
- Maintained: ?

This script is definitely not very easy to set up, but here's some instructions.

Note: You'll need a Linux server with PHP5-CLI, and postfix installed, and with the ability to send mail.

It has been tested on an Ubuntu server, but nothing else.


##	Manual Installation

1. Add a line to your crontab (by using crontab -e) to call `/path/to/run.sh`
   whenever you want to receive your email.
2. Add a postfix filter/trigger to push incoming messages for a certain email address to: `/path/to/process.php`
3. Chmod the entire OhJournal folder and your journal.db to give PHP write access.
4. ???
5. Profit!

## "Automatic" Installation

1. Have a Linux system running Postfix with no crazy custom configuration and a domain name.
2. Run `./install.php` from command line and hope everything works properly.
3. Visit the non-existent-yet configuration page from the front-end to setup the necessary settings [alternatively, muck around in the "config" database table yourself].
4. ???
5. Profit!

I've made the installer script relatively verbose and easy to read, so if something goes wrong, its changes should be easy to reverse by hand.
