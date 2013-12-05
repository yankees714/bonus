# The Bowdoin Orient
## B.O.N.U.S. 2.0

The Orient website has been online since sometime in the late 1990s, with earliest extant content dating back to September 2000. It previously underwent major revisions in 2001, 2004, and 2009. In 2004, it switched from static HTML to a PHP/MySQL web app. In 2009, a cosmetic revision was done; in 2012, for the first time in 8 years, it was rewritten from scratch. The code base was open sourced in late 2013.

## Setup
The only supported development environment is OSX >=10.8. To get started:

* Install [Homebrew](http://mxcl.github.io/homebrew/)
* Install Git from Homebrew: `brew install git`
* Install MySQL from Homebrew: `brew install mysql`
* `cd` to the directory you want the BONUS folder to live in. The setup scripts are qritten assuming you will use `~/code/`, but this is easy to change.)
* [Fork this repository.](https://github.com/BowdoinOrient/bonus/fork)
* Clone your fork: `git clone https://github.com/your_user_name/bonus.git`
* `cd bonus && ./setup.sh`
* Choose whether or not to overwrite your httpd/php confs. If you don't, be aware you may need to manually enable PHP short tags, etc. The only reason to not do this is if you have another PHP project already running locally on your computer.
* Type your password.
* If you chose a project root other than `~/code/`, edit `/etc/apache2/httpd.conf` (you will need `sudo`) and specify the location of the BONUS code
* Acquire an SQL dump and populate your local database. Brian can help you with this. Or, if you're not an Orient developer and aren't interested in our data, import the database schema from `setup-files/` using Sequel Pro, etc.
* Email [@bjacobel](mailto:bjacobel@gmail.com) so he can give you some other [useful pointers](http://xkcd.com/138/)
* Visit [bowdoinorient.dev](http://bowdoinorient.dev)
* Start writing code 

## License
BONUS is licensed under the terms of the [GNU Public License, v3](https://github.com/BowdoinOrient/bonus/blob/master/LICENSE.md). Fork us.