# Basic Docker Web Dev Box

Basic docker box for little projects & tests.

##  Requirements

- This repo assumes you store your projects in  `~/Projects`.
- [Docker](https://docs.docker.com/engine/installation/) installed
- [Docker Compose](https://docs.docker.com/compose/install/) installed

## Get Started

- Clone this repository into the `~/Projects` folder on your machine (create `~/Projects` folder if necessary best if you make this folder [case sensitive on a mac](https://github.com/DecisionTime/DecisionTime/issues/4885)).
- Ensure you are in the correct directory before running the command line `docker-compose up --remove-orphans`.
- To be in the correct directory, on the command line enter:
  - `cd ~/Projects`
  - `ls -l` to see what is the `~/Projects` folder
  - `cd codeigniter` to go into the correct folder
- Finally, enter `docker-compose up -d --remove-orphans` on the command line and wait for installation.

## Services

- PHP-FPM 7.1
- MySQL 5.7
- NGINX 1.13

## Accessing services

Access app via http://localhost:8080/ from your browser and connect to MySQL from your client (eg: Sequel Ace) using `127.0.0.1:3306`.

### Default MySQL credentials:

- **Username**: `docker`
- **Password**: `docker`
- **Database**: `docker`

## Create the sessions table

```sql
CREATE TABLE IF NOT EXISTS `ci_sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);
```
### The following Link to CodeIgniter YouTube Tutorials are a great help to get familiar with the Framework

https://www.youtube.com/watch?v=BYbTJFtDCMc&list=PLeS3J3RlFi_Y51TJspNd09h8eaYXeMGYS&index=1
