## Symfony4 application with messenger component

The project uses a docker-compose file to start a symfony 4 application with php7.2, mysql, apache and rabbitmq service

## Get started

##### Clone the project

    $ git clone https://github.com/dhvarela/symfony-messenger-with-rabbitmq.git
    $ cd symfony-messenger-with-rabbitmq/

##### Run docker-compose to execute all the configurations

    $ docker-compose build

##### Up docker-compose to launch all the containers

    $ docker-compose up -d

#### Pass the composer in container

    $ docker exec -it c_sf4_php bash
    $ cd sf4/
    $ composer install

#### Create an .env file 

Create an .env file from .env.dist and adapt it according to the needs of the application
You basically will need to change the MESSENGER_TRANSPORT_DSN parameter to your rabbitmq configuration

Eg: 

    MESSENGER_TRANSPORT_DSN=amqp://rabbitmq:rabbitmq@172.17.0.1:5673/%2f/messages
    
 
#### Launch the Symfony application!

You can add the sf4.local domain in your localhost with port 127.0.0.1 and launch the application
http://sf4.local:86

or you can simply launch the application in 
http://localhost:86

#### Create a Happy Message and add it to Rabbit queue

http://sf4.local:86/msg

You can see all the messages you hit in rabbitmq interface, just join next url in your local machine 

http://localhost:15673

using rabbitmq as user and pass credentials


#### Consume the queue messages!

To consume messages you need to entry to the php container:

    $ docker exec -it c_sf4_php bash

and execute the next symfony command:

    $ php bin/console messenger:consume-messages

Messages will be consumed and RabbitMQ queue will be empty.