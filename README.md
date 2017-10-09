Symfony Twitter Mentions Replier
================================

To execute
----------

Setting up the db:

    # Clear existing data
    php bin/console doctrine:schema:drop --force
    # Execute migrations
    php bin/console doctrine:migrations:migrate --no-interaction

Running the CLI script:

    php bin/console app:twitter:save-mentions
    
Running the frontend accessible at http://127.0.0.1:8000:

    php bin/console server:run
    
Examples
-------
 
![Example](https://raw.githubusercontent.com/ShrwdFlrst/symfony-tweets-replier/master/example.GIF)

![Example](https://raw.githubusercontent.com/ShrwdFlrst/symfony-tweets-replier/master/example2.GIF)


Improvements
------------

- Use a proper local environment; Docker/Vagrant, Nginx/Apache, MySql/Elasticsearch/etc., and don't store db in version control
- Proper environment variable setup e.g. DotEnv
- Paginate the Mentions separately for each user, via ajax, or don't group but list by date and paginate same as on Twitter itself
- Reply via ajax, below each Mention as on Twitter
- Have 2 separate scripts to capture tweets
  * Firehose/Streaming script to capture realtime tweets, running as a background process
  * CLI script using Twitter search as a backup to capture tweets if Firehose script is ever down
- If this was intended to be part of a bigger project, I'd move the code into a self contained bundle
