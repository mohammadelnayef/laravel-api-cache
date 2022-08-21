# Laravel API Cache

<p>This project simulates the caching of an external and expensive api. By using redis as a caching layer, we can avoid calling too often an expensive/resourse intensive api. Technologies used: Docker, Laravel, Redis.</p>

---
<b>How to set up:</b>
<ul>
  <li>Download the project and initialize the Docker container with docker-compose up</li>
  <li>Open your browser and acces http://localhost:8090</li>
</ul>

<b>How to use:</b>
<p>By accessing localhost:8090 for the first time, you can notice that the message is set to "cache miss". The Laravel back end notices that there is no cache set and sends a request to the external api in order to fetch the required data, after the data is fetched the Laravel back end also sets a cache for 15 seconds, so if you refresh the page within 15 seconds the message will change to "cache hit" meaning that the data was retrieved from redis. After the 15 seconds expire another request will be sent to the external api and the message will be once again "cache miss".</p>

<b>Project structure:</b>

Root Folder
<ul>
  <li>laravel</li>
  <li>mysql (docker mysql volue)</li>
  <li>nginx (docker nginx volume)</li>
  <li>redis-data (docker redis volume)</li>
  <li>docker-compose.yaml (main docker file that initializes all the docker containers)</li>
  <li>Dockerfile (docker-compose.yaml dependency, used for installing php extensions composer and more...)</li>
</ul>

Laravel Folder (Main files)
<ul>
  <li>/routes/web.php (used to registed the root route)</li>
  <li>/app/Http/Controllers/APICacheController.php (Main controller responsible for receiving the request and initialize the service class)</li>
  <li>/app/Services/APICacheService.php (Service class responsible for main business logic)</li>
  <li>.env (enviroment file, used to assign CACHE_DRIVER,REDIS_HOST,REDIS_PASSWORD,REDIS_PORT)</li>
  <li>/config/database.php (configuration file used to assign the predis client)</li>
</ul>
