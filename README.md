Symfony Twitter Mentions Replier
================================

To execute
----------

Running the frontend accessible at http://127.0.0.1:8000:

    php bin/console server:run

Running the CLI script:

    php bin/console app:twitter:save-mentions
    
Examples
-------
 
![Example](https://raw.githubusercontent.com/ShrwdFlrst/symfony-tweets-replier/master/example.GIF)

![Example](https://raw.githubusercontent.com/ShrwdFlrst/symfony-tweets-replier/master/example2.GIF)


Improvements
------------

- Use a proper local environment; Docker/Vagrant, Nginx/Apache, MySql/Elasticsearch/etc.
- Proper environment variable setup e.g. DotEnv
- Paginate the Mentions separately for each user
- Write 2 scripts to capture tweets
  * Firehose script to capture realtime tweets, running as a background process
  * CLI script using Twitter search as a backup to capture tweets if Firehose is ever down
- If this was intended to be part of a bigger project, I'd move the code into a self container bundle
